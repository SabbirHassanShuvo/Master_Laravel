<?php

namespace App\Http\Controllers\Web\Backend\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Mail\SendOtpMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class PasswordResetController extends Controller
{
    public function showForgotPasswordLinkForm()
    {
        return view('backend.layouts.auth.forgetpassword');
    }

    public function sendForgotPasswordLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $otp = rand(100000, 999999);
        $expiresAt = Carbon::now()->addMinutes(5);

        Session::put('reset_otp', $otp);
        Session::put('reset_email', $request->email);
        Session::put('reset_otp_expires', $expiresAt);

        Mail::to($request->email)->send(new SendOtpMail($otp, $request->email));

        return redirect()->route('verify-otp')->with('status', 'OTP has been sent to your email.');
    }

    // Show OTP verification form
    public function showVerifyOtpForm()
    {
        return view('backend.layouts.auth.verifyotp');
    }
    // Handle OTP verification
    public function verifyOtp(Request $request)
    {
        // Combine 6 inputs into one OTP
        $inputOtp = $request->d1 . $request->d2 . $request->d3 . $request->d4 . $request->d5 . $request->d6;

        $sessionOtp = Session::get('reset_otp');
        $expiresAt = Session::get('reset_otp_expires');

        // Check validity
        if ($inputOtp != $sessionOtp) {
            return redirect()->route('verify-otp')->with('error', 'The OTP you entered is incorrect.');
        }

        if (Carbon::now()->greaterThan($expiresAt)) {
            return redirect()->route('verify-otp')->with('error', 'Your OTP has expired.');
        }

        // OTP valid → Redirect to reset page
        return redirect()->route('reset-password')->with('status', 'OTP verified successfully.');
    }

    // Show reset password form
    public function showResetPasswordForm()
    {
        return view('backend.layouts.auth.resetpassword');
    }

    public function resetPassword(Request $request)
    {
        // Validation
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        // Get email stored in session (set after OTP verification)
        $email = Session::get('reset_email');

        if (!$email) {
            return redirect()->route('login')->with('error', 'Session expired. Please try again.');
        }

        // Update password in database
        User::where('email', $email)->update([
            'password' => Hash::make($request->password)
        ]);

        // Clear session
        Session::forget('reset_email');
        Session::forget('reset_otp');
        Session::forget('reset_otp_expires');

        return redirect()->route('login')->with('status', 'Your password has been reset successfully.');
    }
}
