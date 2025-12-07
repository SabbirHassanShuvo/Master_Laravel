<?php

use App\Http\Controllers\Web\Backend\ProductController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/addProduct', [ProductController::class, 'addProductshow'])->name('addProductshow');
    Route::post('/storeProduct', [ProductController::class, 'store'])->name('storeProduct');
});
