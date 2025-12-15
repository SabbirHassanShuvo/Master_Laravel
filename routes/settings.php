<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\Backend\Settings\MailController;
use App\Http\Controllers\Web\Backend\Settings\StripeController;
use App\Http\Controllers\Web\Backend\Settings\ProfileController;
use App\Http\Controllers\Web\Backend\Settings\WebSettingController;
use App\Http\Controllers\Web\Backend\Settings\AppSettingsProController;

Route::prefix('settings')->middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('settings.profile.update');
    Route::post('/profile/password', [ProfileController::class, 'updatePassword'])->name('settings.password.update');


    // Mail Settings Routes
    Route::get('/mail', [MailController::class, 'edit'])->name('settings.mail.edit');
    Route::post('/mail', [MailController::class, 'update'])->name('settings.mail.update');

    // web settings routes
    Route::get('web-setting', [WebSettingController::class, 'edit'])->name('web-setting.edit');
    Route::post('web-setting', [WebSettingController::class, 'update'])->name('web-setting.update');

    // app setting routes
    Route::get('app-setting', [AppSettingsProController::class, 'edit'])->name('app-setting.edit');
    Route::post('app-setting', [AppSettingsProController::class, 'update'])->name('app-setting.update');

    // payment gateway routes
    Route::get('payment-gateway', [StripeController::class, 'edit'])->name('payment-gateway.edit');
    Route::post('payment-gateway', [StripeController::class, 'update'])->name('payment-gateway.update');
});