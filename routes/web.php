<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('backend.index');
});
Route::get('/productshow', function () {
    return view('backend.layouts.product.index');
});
Route::get('/productcreate', function () {
    return view('backend.layouts.product.form');
});
Route::get('/categoryshow', function () {
    return view('backend.layouts.category.index');
});
Route::get('/categorycreate', function () {
    return view('backend.layouts.category.form');
});
Route::get('/usershow', function () {
    return view('backend.layouts.user.index');
});
Route::get('/usercreate', function () {
    return view('backend.layouts.user.form');
});
Route::get('/usershow', function () {
    return view('backend.layouts.user.index');
});
Route::get('/usercreate', function () {
    return view('backend.layouts.user.form');
});
Route::get('/media', function () {
    return view('backend.layouts.media.index');
});
Route::get('/profilesetting', function () {
    return view('backend.layouts.setting.profilesetting');
});
// Route::get('/login', function () {
//     return view('backend.layouts.auth.login');
// });
Route::get('/forgetpassword', function () {
    return view('backend.layouts.auth.forgetpassword');
});
Route::get('/resetpassword', function () {
    return view('backend.layouts.auth.resetpassword');
});



require_once __DIR__ . '/auth.php';
