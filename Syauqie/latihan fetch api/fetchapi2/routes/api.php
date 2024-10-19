<?php

use App\Http\Controllers\PrayerTimeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('prayer-times/{location}/{date}', [PrayerTimeController::class, 'index']);
