<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('pages.blank-page', ['type_menu' => 'dashboard']);
    });
    Route::get('/', function () {
        return view('pages.blank-page', ['type_menu' => 'dashboard']);
    });

    Route::resource('users', UserController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);

    Route::resource('suppliers', SupplierController::class);

    Route::resource('orders', OrderController::class);
});
