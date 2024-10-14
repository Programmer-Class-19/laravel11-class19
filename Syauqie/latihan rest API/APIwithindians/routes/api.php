<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostApiController;
use App\Http\Controllers\API\UserApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// routes/api.php

Route::apiResource('users', UserApiController::class);
Route::apiResource('posts', PostApiController::class);
