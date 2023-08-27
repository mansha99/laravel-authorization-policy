<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FunboardController;
use Illuminate\Support\Facades\Route;

Route::post('login', [AuthController::class, 'login']);
Route::controller(FunboardController::class)->group(function () {
    Route::post('funboard/store', 'store');
    Route::get('funboard/index', 'index');
    Route::patch('funboard/updateStatus/{id}', 'updateStatus');
    Route::patch('funboard/updateMessage/{id}', 'updateMessage');
});
