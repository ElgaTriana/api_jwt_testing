<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DiagnosaController;
use App\Http\Controllers\Api\ObatController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::post('/register', App\Http\Controllers\Api\RegisterController::class)->name('register');
Route::post('/login', App\Http\Controllers\Api\LoginController::class)->name('login');
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->group(function () {
    Route::apiResource('diagnosas', DiagnosaController::class);
});
Route::post('/logout', App\Http\Controllers\Api\LogoutController::class)->name('logout');

Route::apiResource('/obats', ObatController::class);