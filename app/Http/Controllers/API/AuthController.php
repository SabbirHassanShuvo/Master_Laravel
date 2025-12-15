<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Mail\SendOtpMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Traits\ApiResponseTrait;
use App\Models\PasswordResetToken;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
     use ApiResponseTrait;
     
      // Register
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $validated['name'] ?? null;
        $user->email = $validated['email'];
        $user->phone = $validated['phone'] ?? null;
        $user->password = Hash::make($validated['password']);
        $user->save();

        $token = JWTAuth::fromUser($user);

         return $this->authResponse(
            'User successfully registered',
            $user,
            $token,
            201
        );
    }

    // Login
    public function login(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = [
            'email' => $validated['email'],
            'password' => $validated['password']
        ];

        if (!$token = JWTAuth::attempt($credentials)) {
            return $this->errorResponse('Invalid credentials', 401);
        }

        return $this->authResponse(
            'Login successful',
            auth()->user(),
            $token
        );
    }

    // Forget Password: Send OTP
    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return $this->errorResponse('User not found', 404);
        }

        // Auto delete expired OTPs (older than 10 minutes)
        PasswordResetToken::where('created_at', '<', now()->subMinutes(10))
            ->delete();

        // Generate 6 digit OTP
        $otp = rand(100000, 999999);

        // Delete any existing OTP for this email
        PasswordResetToken::where('email', $request->email)->delete();

        // Store new OTP
        PasswordResetToken::create([
            'email'      => $request->email,
            'otp'        => $otp,
            'created_at' => now(),
        ]);

        // Send OTP via email
        Mail::to($request->email)->send(
            new SendOtpMail($otp, $request->email)
        );

        return $this->successResponse('OTP sent successfully');
    }

    // Verify OTP and generate reset token
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp'   => 'required',
        ]);

        $record = PasswordResetToken::where('email', $request->email)
            ->where('otp', $request->otp)
            ->first();

        if (!$record) {
            return $this->errorResponse('Invalid OTP', 400);
        }

        // Check OTP expiration
        if (now()->diffInMinutes($record->created_at) > 10) {
            PasswordResetToken::where('email', $request->email)->delete();
            return $this->errorResponse('OTP expired', 400);
        }

        $resetToken = Str::random(60);

        PasswordResetToken::where('email', $request->email)
            ->where('otp', $request->otp)
            ->update([
                'token' => $resetToken,
            ]);

        return $this->successResponse('OTP verified', [
            'reset_token' => $resetToken
        ]);
    }
    // Reset Password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'otp'      => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

        // Get reset token from Authorization Bearer
        $bearerToken = $request->bearerToken();

        if (!$bearerToken) {
            return $this->errorResponse('Reset token missing', 401);
        }

        // Find reset record by email, otp and bearer token
        $record = PasswordResetToken::where('email', $request->email)
            ->where('otp', $request->otp)
            ->where('token', $bearerToken)
            ->first();

        if (!$record) {
            return $this->errorResponse('Invalid OTP or reset token', 400);
        }

        // Check OTP expiration (10 minutes)
        if (now()->diffInMinutes($record->created_at) > 10) {
            PasswordResetToken::where('email', $request->email)->delete();
            return $this->errorResponse('OTP expired', 400);
        }

        // Find user
        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return $this->errorResponse('User not found', 404);
        }

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        // Remove reset record after successful password reset
        PasswordResetToken::where('email', $request->email)->delete();

        return $this->successResponse('Password reset successful');
    }


    // Logout
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return $this->successResponse('Successfully logged out');
    }

    // Get Authenticated User
    public function me()
    {
        $user = auth()->user();
        if ($user) {
            return $this->errorResponse('Unauthorized', 401);
        }
        return $this->successResponse('Authenticated user', $user);
    }

}
