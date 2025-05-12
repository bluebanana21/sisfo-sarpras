<?php

use App\Http\Controllers\CategoryController;
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
    Route::get('/dashboard/overview', [AdminController::class, 'overview'])->name('overview');

    Route::get('/dashboard/items', [AdminController::class, 'items'])->name('items');

    Route::get('/dashboard/users', [AdminController::class, 'users'])->name('users');

    Route::get('/dashboard/borrows', [AdminController::class, 'borrows'])->name('borrows');

    Route::get('/dashboard/returns', [AdminController::class, 'returns'])->name('returns');

    Route::get('/dashboard/categories', [AdminController::class, 'categories'])->name('categories');

    Route::get('/dashboard/subcategories', [AdminController::class, 'subcategories'])->name('subcategories');

    // CREATION FORMS

    Route::get('/dashboard/overview/create', [AdminController::class, 'overview']);

    Route::get('/dashboard/items/create', [AdminController::class, 'items']);

    Route::get('/dashboard/users/create', [AdminController::class, 'createUser'])->name('createUser');

    Route::get('/dashboard/borrows/create', [AdminController::class, 'borrows']);

    Route::get('/dashboard/returns/create', [AdminController::class, 'returns']);

    Route::get('/dashboard/categories/create', [AdminController::class, 'createCat'])->name('createCat');

    Route::get('/dashboard/subcategories/create', [AdminController::class, 'createSubcat'])->name('createSubCat');

    // EDIT FORMS
    Route::get('/dashboard/overview/edit/{id}', [AdminController::class, 'overview']);

    Route::get('/dashboard/items/edit/{id}', [AdminController::class, 'items']);

    Route::get('/dashboard/users/edit/{id}', [AdminController::class, 'editUsers']);

    Route::get('/dashboard/borrows/edit/{id}', [AdminController::class, 'borrows']);

    Route::get('/dashboard/returns/edit/{id}', [AdminController::class, 'editReturns']);

    Route::get('/dashboard/categories/edit/{id}', [AdminController::class, 'editCat']);

    Route::get('/dashboard/subcategories/edit/{id}', [AdminController::class, 'editSubcat']);
});

