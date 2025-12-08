<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\Backend\UserController;
use App\Http\Controllers\Web\Backend\ProductController;

Route::prefix('admin')->group(function () {

    // product routes
    Route::get('/addProduct', [ProductController::class, 'addProductshow'])->name('addProductshow');
    Route::post('/storeProduct', [ProductController::class, 'store'])->name('storeProduct');
    Route::get('/productList', [ProductController::class, 'productList'])->name('productList');
    Route::get('/getProducts', [ProductController::class, 'getProducts'])->name('getProducts.data');

    // user routes
    Route::get('/userList', [UserController::class, 'userList'])->name('userList');
    Route::get('/getUsers', [UserController::class, 'getUsers'])->name('getUsers.data');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('/user/update/{id}', [UserController::class, 'update'])->name('user.update');

    Route::delete('/user/delete/{id}', [UserController::class, 'delete'])->name('user.delete');

    Route::get('/createUser',[UserController::class,'createUser'])->name('createUser');
    Route::post('/storeUser',[UserController::class,'storeUser'])->name('storeUser');
});
