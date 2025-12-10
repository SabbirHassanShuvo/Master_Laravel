<?php

use Illuminate\Support\Facades\Route;


Route::get('/media', function () {
    return view('backend.layouts.media.index');
});
Route::get('/profilesetting', function () {
    return view('backend.layouts.setting.profilesetting');
});



require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/admin.php';
require_once __DIR__ . '/settings.php';

