<?php

use App\Http\Controllers\JsonController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('json', [JsonController::class, 'index']);

Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
