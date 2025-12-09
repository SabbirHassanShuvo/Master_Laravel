<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\Backend\Settings\ProfileController;
use App\Http\Controllers\Web\Backend\Settings\MailController;

Route::prefix('settings')->middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('settings.profile.update');

    // Mail Settings Routes
    Route::get('/mail', [MailController::class, 'edit'])->name('settings.mail.edit');
    Route::post('/mail', [MailController::class, 'update'])->name('settings.mail.update');
});