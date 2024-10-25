<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('pages.auth-login');
// });

Route::middleware(['auth'])->group(function(){

    Route::get('/home', function () {
        return view('welcome');
    });
    Route::get('/', function () {
        return view('welcome');
    });

});
