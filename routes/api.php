<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BorrowingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ItemReturnController;
use App\Http\Controllers\SchoolClassController;
use App\Http\Controllers\SubCategoriesController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [AuthController::class, 'apiLogin']);

Route::post('/register', [AuthController::class, 'register'])->name('register');



// *-- ITEM ROUTES --*
Route::get('/items', [ItemController::class, 'getAll']);

Route::get('/items/{id}', [ItemController::class, 'getById']);

Route::post('/items/create', [ItemController::class, 'createItems'])->name('api.item.create');

Route::delete('/items/delete/{id}', [ItemController::class, 'deleteItem']);

Route::patch('/items/update/{id}', [ItemController::class,'updateItem']);


// *-- CLASSES ROUTES --*
Route::get('/classes', [SchoolClassController::class, 'getAll']);

Route::get('/classes/{id}', [SchoolClassController::class. 'getById']);

Route::post('/classes/create', [SchoolClassController::class, 'createClasses'])->name('api.class.create');

Route::delete('/classes/delete/{class_code}', [SchoolClassController::class, 'deleteClasses']);

Route::patch('/classes/update/{id}', [SchoolClassController::class,'updateClasses']);


// *-- USER ROUTES --*
Route::get('/users', [UserController::class, 'getAll']);

Route::get('/users/{id}', [UserController::class. 'getById']);

Route::post('/users/create', [UserController::class, 'createUser'])->name('api.users.create');

Route::delete('/users/delete/{id}', [UserController::class, 'deleteUser']);

Route::patch('/users/update/{id}', [UserController::class,'updateUser']);


// *-- CATEGORY ROUTES --*
Route::get('/categories', [CategoryController::class, 'getAll']);

Route::get('/categories/{id}', [CategoryController::class. 'getById']);

Route::post('/categories/create', [CategoryController::class, 'createCat'])->name('api.cat.create');

Route::delete('/categories/delete/{id}', [CategoryController::class, 'deleteCat']);

Route::patch('/categories/update/{id}', [CategoryController::class,'updateCat']);


// *-- SUBCATEGORY ROUTES --*
Route::get('/subcat', [SubCategoriesController::class, 'getAll']);

Route::get('/subcat/{id}', [SubCategoriesController::class, 'getById']);

Route::post('/subcat/create', [SubCategoriesController::class, 'createSubcat'])->name('api.subcat.create');

Route::delete('/subcat/delete/{id}', [SubCategoriesController::class, 'deleteSubcat']);

Route::patch('/subcat/update/{id}', [SubCategoriesController::class,'updateSubcat']);


// *-- BORROW ROUTES --*
Route::post('/borrow/request', [BorrowingController::class, 'requestBorrow'])->name('borrow.request');

Route::post('/borrows/approve/{id}/{userId}/{itemId}', [BorrowingController::class, 'approveRequest']);

Route::post('/borrows/deny/{id}/{userId}', [BorrowingController::class, 'denyRequest']);

Route::get('/borrows', [BorrowingController::class, 'getAllApi']);

Route::get('/borrows/item/{itemId}', [BorrowingController::class, 'getByItem']);


// *-- RETURN ROUTES --*
Route::get('/returns', [ItemReturnController::class, 'getApi']);

Route::post('/returns/request', [ItemReturnController::class, 'requestReturn']);

Route::post('/returns/confirm/{id}/{itemId}', [ItemReturnController::class, 'confirmReturn']);

Route::post('/returns/late/{id}/{itemId}', [ItemReturnController::class, 'lateReturn']);

Route::post('/returns/lost/{id}/{itemId}', [ItemReturnController::class, 'lostReturn']);

Route::post('/returns/damaged/{id}/{itemId}', [ItemReturnController::class, 'damagedReturn']);

