<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('/categories',CategoryController::class);
Route::apiResource('/products',ProductController::class);
Route::apiResource('/orders',OrderController::class);