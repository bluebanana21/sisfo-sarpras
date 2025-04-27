<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

 Route::get('/register', [AuthController::class, 'showRegister']);

Route::post('/register', [AuthController::class, 'register']);


    Route::get('/login', [AuthController::class, 'showLogin']);

    Route::post('/login', [AuthController::class, 'login']);

