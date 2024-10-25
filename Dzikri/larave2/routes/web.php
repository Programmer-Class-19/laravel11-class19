<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [TaskController::class, 'index']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::patch('/tasks/{task}', [TaskController::class, 'update']);
Route::delete('/tasks/{task}', [TaskController::class, 'destroy']);

// API routes
Route::get('/api/tasks', [TaskController::class, 'apiTasks']);
Route::post('/api/tasks', [TaskController::class, 'apiStore']);
Route::patch('/api/tasks/{task}', [TaskController::class, 'apiUpdate']);
Route::delete('/api/tasks/{task}', [TaskController::class, 'apiDestroy']);