<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\SchoolClassController;
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

Route::get('/items/{id}', [ItemController::class. 'getById']);

Route::post('/items/create', [ItemController::class, 'createItems']);

Route::delete('/items/delete/{id}', [ItemController::class, 'deleteItems']);

Route::put('/items/update/{id}', [ItemController::class,'updateItems']);

// *-- CLASSES ROUTES --*
Route::get('/classes', [SchoolClassController::class, 'getAll']);

Route::get('/classes/{id}', [SchoolClassController::class. 'getById']);

Route::post('/classes/create', [SchoolClassController::class, 'createClasses']);

Route::delete('/classes/delete/{id}', [SchoolClassController::class, 'deleteClasses']);

Route::put('/classes/update/{id}', [SchoolClassController::class,'updateClasses']);

// *-- USER ROUTES --*
Route::get('/users', [UserController::class, 'getAll']);

Route::get('/users/{id}', [UserController::class. 'getById']);

Route::post('/users/create', [UserController::class, 'createUsers']);

Route::delete('/users/delete/{id}', [UserController::class, 'deleteUsers']);

Route::put('/users/update/{id}', [UserController::class,'updateUsers']);

// *-- CATEGORY ROUTES --*
Route::get('/categories', [CategoryController::class, 'getAll']);

Route::get('/categories/{id}', [CategoryController::class. 'getById']);

Route::post('/categories/create', [CategoryController::class, 'createCat']);

Route::delete('/categories/delete/{id}', [CategoryController::class, 'deleteCat']);

Route::put('/categories/update/{id}', [CategoryController::class,'updateCat']);


// *-- SUBCATEGORY ROUTES --*
Route::get('/subcat', [SubCategoriesController::class, 'getAll']);

Route::get('/subcat/{id}', [SubCategoriesController::class. 'getById']);

Route::post('/subcat/create', [SubCategoriesController::class, 'createSubcat']);

Route::delete('/subcat/delete/{id}', [SubCategoriesController::class, 'deleteSubcat']);

Route::put('/subcat/update/{id}', [SubCategoriesController::class,'updateSubcat']);

// *--
