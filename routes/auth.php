<?php

use App\Http\Controllers\Web\Backend\Auth\AuthController;
use App\Http\Controllers\Web\Backend\Auth\PasswordResetController;
use Illuminate\Support\Facades\Route;
// Public routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/forgot-password-link', [PasswordResetController::class, 'showForgotPasswordLinkForm'])->name('forgot-password-link');
Route::post('/forgot-password-link', [PasswordResetController::class, 'sendForgotPasswordLink']);

Route::get('/verify-otp', [PasswordResetController::class, 'showVerifyOtpForm'])->name('verify-otp');
Route::post('/verify-otp', [PasswordResetController::class, 'verifyOtp'])->name('verify-otp.post');

Route::get('/reset-password', [PasswordResetController::class, 'showResetPasswordForm'])->name('reset-password');
Route::post('/reset-password', [PasswordResetController::class, 'resetPassword'])->name('reset-password.post');


// Protected routes with JWT middleware
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.index'); // Dashboard blade
    })->name('dashboard');

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});
