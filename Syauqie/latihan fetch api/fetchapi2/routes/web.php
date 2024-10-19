<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrayerTimeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/prayer-times', function() {
    return view('prayer_times'); // Menampilkan form pencarian
});

Route::post('/prayer-times', [PrayerTimeController::class, 'searchPrayerTimes']); // Memproses input dan menampilkan hasil
