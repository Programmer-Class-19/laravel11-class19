<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('ui.dashboard-ecommerce-dashboard', ['type_menu' => 'dashboard']);
});

Route::get('/home', function () {
    return view('ui.dashboard-ecommerce-dashboard', ['type_menu' => 'dashboard']);
});

Route::resource('/products', ProductController::class);

Route::resource('/users', UserController::class);

Route::resource('/categories', CategoryController::class);
