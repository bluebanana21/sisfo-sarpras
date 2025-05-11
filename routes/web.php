<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// AUTH ROUTES

Route::post('/login', [AuthController::class, 'login']);

Route::get('/login', [AuthController::class, 'showLogin']);

Route::get('/register', [AuthController::class, 'showRegister']);
// END OF AUTH

// DASHBOARD ROUTES
//
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard/overview', [AdminController::class, 'overview']);

    Route::get('/dashboard/items', [AdminController::class, 'items']);

    Route::get('/dashboard/users', [AdminController::class, 'users']);

    Route::get('/dashboard/borrows', [AdminController::class, 'borrows']);

    Route::get('/dashboard/returns', [AdminController::class, 'returns']);

    Route::get('/dashboard/categories', [AdminController::class, 'categories']);

    Route::get('/dashboard/subcategories', [AdminController::class, 'subcategories']);
});

