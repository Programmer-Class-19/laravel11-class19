<?php

use App\Http\Controllers\MasjidController;
use Illuminate\Support\Facades\Route;

Route::get('/masjid', [MasjidController::class, "index"]);

Route::get('/jamaah', function () {
    return view('jamaah', ['title' => 'Para Jamaah']);
});

Route::get('/kegiatan', function () {
    return view('kegiatan', ['title'=>'Daftar Kegiatan']);
});

