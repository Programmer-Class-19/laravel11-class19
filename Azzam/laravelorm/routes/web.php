<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MasjidController;
use App\Http\Controllers\JamaahController;
use App\Http\Controllers\KegiatanController;

Route::get('/masjid', [MasjidController::class, 'index'])->name('masjid.index');
Route::post('/masjid/store', [MasjidController::class, 'store'])->name('masjid.store');

Route::get('/jamaah', [JamaahController::class, 'index'])->name('jamaah.index');
Route::post('/jamaah/store', [JamaahController::class, 'store'])->name('jamaah.store');

Route::get('/kegiatan', [KegiatanController::class, 'index'])->name('kegiatan.index');
Route::post('/kegiatan/store', [KegiatanController::class, 'store'])->name('kegiatan.store');

