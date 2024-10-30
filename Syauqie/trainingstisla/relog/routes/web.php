<?php

use Illuminate\Support\Facades\Route;


    Route::get('/', function () {
        return view('ui.blank-page', ['type_menu' => 'dashboard']);
    });
    Route::get('/home', function () {
        return view('ui.blank-page', ['type_menu' => 'dashboard']);
    });


