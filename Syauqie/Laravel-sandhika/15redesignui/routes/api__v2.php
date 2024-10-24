<?php
use App\Http\Controllers\API\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rute untuk mengembalikan data user yang sedang login dengan otentikasi Sanctum
Route::get('/user', function (Request $request) {
    return response()->json(['status' => true, 'data' => $request->user(), 'message' => 'User versi 2']);
})->middleware('auth:sanctum');
?>
