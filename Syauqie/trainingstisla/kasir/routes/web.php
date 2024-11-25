<?php

use App\Livewire\User;
use App\Livewire\Produk;
use App\Livewire\Beranda;
use App\Livewire\Laporan;
use App\Livewire\Transaksi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes(['re']);

Route::get('/home', Beranda::class)->middleware(['auth'])->name('home');
Route::get('/user', User::class)->middleware(['auth'])->name('user');
Route::get('/laporan', Laporan::class)->middleware(['auth'])->name('laporan');
Route::get('/produk', Produk::class)->middleware(['auth'])->name('produk');
Route::get('/transaksi', Transaksi::class)->middleware(['auth'])->name('transaksi');
Route::get('/cetak',['App\Http\Controllers\HomeController', 'cetak']);
