<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

// Route::get('/', function () {
//     return view('pages.auth-login');
// });

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('pages.blank-page', ['type_menu' => 'dashboard']);
    });
    Route::get('/', function () {
        return view('pages.blank-page');
    });
});

Route::get('/features-post', [UserController::class, 'index']);
Route::get('/components-chat-box', function () {
    return view('ui.components-chat-box', ['type_menu' => 'dashboard']);
});
Route::get('/features-profile', function () {
    return view('ui.features-profile', ['type_menu' => 'dashboard']);
});
