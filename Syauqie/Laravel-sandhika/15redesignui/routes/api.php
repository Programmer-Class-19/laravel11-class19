<?php

use App\Http\Controllers\API\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rute untuk mengembalikan data user yang sedang login dengan otentikasi Sanctum
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Menggunakan apiResource untuk mendefinisikan rute CRUD user
Route::apiResource('user', UserApiController::class, ['as' => 'api']);
