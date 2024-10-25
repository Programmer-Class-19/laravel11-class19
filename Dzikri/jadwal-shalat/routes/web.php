<?php

use App\Services\JadwalShalatService;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JadwalShalatController;

Route::get('/', function () {
    return view('welcome');
});

// Route untuk melihat semua jadwal shalat berdasarkan kota
Route::get('/jadwal-shalat', [JadwalShalatController::class, 'index'])->name('prayer-times');

