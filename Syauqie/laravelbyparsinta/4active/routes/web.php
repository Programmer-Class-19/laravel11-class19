<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Route::view('/', 'home');

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', HomeController::class);
Route::get('/about', [AboutController::class, 'index']);
Route::get('/contact', [ContactController::class, 'index']);
Route::get('/gallery', [GalleryController::class, 'index']);

Route::get('users', function () {
    $users = [
        ['id' => '1', 'name' => 'syauqie', 'email' => 'syauqie13@gmail.com' ],
        ['id' => '2', 'name' => 'dzikri', 'email' => 'dzikr@gmail.com']
    ];
    return view('users.index', compact('users'));
});
