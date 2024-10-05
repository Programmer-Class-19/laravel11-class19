<?php
use App\Models\Santri;
use App\Models\Divisi;
use Illuminate\Support\Facades\Route;

// Rute untuk menampilkan daftar santri
Route::get('/', function () {
    $santris = Santri::all(); // Mengambil semua data santri
    return view('santri.index', compact('santris'));
});

// Rute untuk menampilkan daftar divisi
Route::get('/divisi', function () {
    $divisis = Divisi::all(); // Mengambil semua data divisi
    return view('divisi.index', compact('divisis'));
});
