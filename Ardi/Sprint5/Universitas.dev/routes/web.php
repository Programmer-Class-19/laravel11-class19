<?php

use App\Http\Controllers\UniversitasController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/universitas', [UniversitasController::class, "index"]);