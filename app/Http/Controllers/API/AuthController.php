<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Mail\SendOtpMail;
use Illuminate\Http\Request;
use App\Models\PasswordResetToken;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
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

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
            'token' => $token
        ], 201);
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
            return response()->json(['error' => 'Invalid credentials'], 401);
        }

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'user' => auth()->user()
        ]);
    }

    // Forget Password: Send OTP
    public function forgetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $user = User::where('email', $request->email)->first();
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $otp = rand(100000, 999999);

        // First delete old otp if exists
        PasswordResetToken::where('email', $request->email)->delete();

        // Insert new OTP (your style)
        $token = new PasswordResetToken();
        $token->email = $request->email;
        $token->token = $otp;
        $token->created_at = now();
        $token->save();

        // Send Email
        Mail::to($request->email)->send(new SendOtpMail($otp, $request->email));

        return response()->json([
            'message' => 'OTP has been sent to your email.'
        ]);
    }

    // verify OTP 
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'otp'   => 'required'
        ]);

        $record = PasswordResetToken::where('email', $request->email)->first();

        if (!$record) {
            return response()->json(['message' => 'OTP not found'], 404);
        }

        if ($record->token != $request->otp) {
            return response()->json(['message' => 'Invalid OTP'], 400);
        }

        // Optional: expire check 10 min
        if (now()->diffInMinutes($record->created_at) > 10) {
            return response()->json(['message' => 'OTP expired'], 400);
        }

        return response()->json(['message' => 'OTP verified']);
    }

    // Reset Password
    public function resetPassword(Request $request)
    {
        $request->validate([
            'email'            => 'required|email',
            'otp'              => 'required',
            'password'         => 'required|min:6|confirmed'
        ]);

        $record = PasswordResetToken::where('email', $request->email)->first();

        if (!$record || $record->token != $request->otp) {
            return response()->json(['message' => 'Invalid OTP'], 400);
        }

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();

        // delete otp
        PasswordResetToken::where('email', $request->email)->delete();

        return response()->json(['message' => 'Password reset successful']);
    }


    // Logout
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Successfully logged out']);
    }

    // Get Authenticated User
    public function me()
    {
        $user = auth()->user();
        if ($user) {
            return response()->json($user);
        }
        return response()->json(['message' => 'Unauthorized'], 401);
    }

}
