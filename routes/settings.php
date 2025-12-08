<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\Backend\Settings\ProfileController;

Route::prefix('settings')->middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('settings.profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('settings.profile.update');
});
