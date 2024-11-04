<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// Route::get('/', function () {
//     return view('ui.dashboard-ecommerce-dashboard', ['type_menu' => 'dashboard']);
// });
Route::resource('/', ProductController::class);

Route::resource('/home', ProductController::class);

Route::resource('/users', UserController::class);
