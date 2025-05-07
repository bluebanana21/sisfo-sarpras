<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::post('/register', [AuthController::class, 'register'])->name('register');



// *-- ITEM ROUTES --*
Route::get('/items', [ItemController::class, 'getAll']);

Route::get('/items/${id}', [ItemController::class. 'getById']);

Route::post('/items/create', [ItemController::class, 'createItems']);

Route::delete('/items/delete', [ItemController::class, 'deleteItems']);

Route::put('/items/update/${id}', [ItemController::class,'updateItems']);

// *-- USER ROUTES --*
Route::get('/users', [UserController::class, 'getAll']);

Route::get('/users/${id}', [UserController::class. 'getById']);

Route::post('/users/create', [UserController::class, 'createUsers']);

Route::delete('/users/delete', [UserController::class, 'deleteUsers']);

Route::put('/users/update/${id}', [UserController::class,'updateUsers']);

// *-- CATEGORY ROUTES --*
Route::get('/categories', [CategoryController::class, 'getAll']);

Route::get('/categories/${id}', [CategoryController::class. 'getById']);

// *-- SUBCATEGORY ROUTES --*
Route::get('/subcat', [SubCategoriesController::class, 'getAll']);

Route::get('/subcat/${id}', [SubCategoriesController::class. 'getById']);

Route::post('/subcat/create', [SubCategoriesController::class, 'createUsers']);

Route::delete('/subcat/delete', [SubCategoriesController::class, 'deleteUsers']);

Route::put('/subcat/update/${id}', [SubCategoriesController::class,'updateUsers']);

// *--
