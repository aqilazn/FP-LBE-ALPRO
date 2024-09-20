<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('products.transactions', TransactionController::class)->middleware('auth');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('products', ProductController::class);
    Route::resource('transactions', TransactionController::class);
});
