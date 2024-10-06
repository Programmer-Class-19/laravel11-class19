<?php

use Illuminate\Support\Facades\Route;
// routes/web.php
use App\Http\Controllers\PondokITController;

Route::get('/', [PondokITController::class, 'showSantri'])->name('santri.index');
Route::get('/divisi', [PondokITController::class, 'showDivisi'])->name('divisi.index');
Route::get('/mentor', [PondokITController::class, 'showMentor'])->name('mentor.index');
Route::get('/ujian', [PondokITController::class, 'showUjian'])->name('ujian.index');

