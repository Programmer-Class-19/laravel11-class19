<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/weather', [WeatherController::class, 'index']);
Route::post('/weather', [WeatherController::class, 'fetchWeather']);
