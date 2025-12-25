<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\RoleController;


Route::get('/media', function () {
    return view('backend.layouts.media.index');
});
Route::get('/profilesetting', function () {
    return view('backend.layouts.setting.profilesetting');
});

//Roles Management Routes
Route::prefix('roles')->name('roles.')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('index');
    Route::get('/create', [RoleController::class, 'create'])->name('create');
    Route::post('/', [RoleController::class, 'store'])->name('store');
    Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('edit');
    Route::put('/{role}', [RoleController::class, 'update'])->name('update');
    Route::delete('/{role}', [RoleController::class, 'destroy'])->name('destroy');
});



require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/admin.php';
require_once __DIR__ . '/settings.php';

