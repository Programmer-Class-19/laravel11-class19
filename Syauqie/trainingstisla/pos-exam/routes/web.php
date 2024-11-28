<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransactionController;

Route::middleware(['auth'])->group(function () {

    Route::get('/home', function () {
        return view('pages.blank-page', ['type_menu' => 'dashboard']);
    });
    Route::get('/', function () {
        return view('pages.blank-page', ['type_menu' => 'dashboard']);
    });

    Route::resource('users', UserController::class);

    Route::resource('customers', CustomerController::class);

    Route::resource('categories', CategoryController::class);

    Route::resource('products', ProductController::class);

    Route::resource('suppliers', SupplierController::class);

    Route::resource('orders', OrderController::class);

    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    Route::post('/transactions/add', [TransactionController::class, 'addToCart'])->name('transactions.addToCart');
    Route::delete('/transactions/remove/{id}', [TransactionController::class, 'removeFromCart'])->name('transactions.removeFromCart');
    Route::post('/transactions/checkout', [TransactionController::class, 'checkout'])->name('transactions.checkout');
});
