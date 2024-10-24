<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route untuk mendapatkan semua user (READ)
Route::get('/users', [UserController::class, 'index']);

// Route untuk menambahkan user baru (CREATE)
Route::post('/users', [UserController::class, 'store']);

// Route untuk mendapatkan user berdasarkan ID (READ by ID)
Route::get('/users/{id}', [UserController::class, 'show']);

// Route untuk memperbarui user (UPDATE)
Route::put('/users/{id}', [UserController::class, 'update']);

// Route untuk menghapus user (DELETE)
Route::delete('/users/{id}', [UserController::class, 'destroy']);
