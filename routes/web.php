<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ItemController;

Route::get('/units', [UnitController::class, 'index']);
Route::get('/units/create', [UnitController::class, 'create']);
Route::post('/units', [UnitController::class, 'store']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::get('/categories/create', [CategoryController::class, 'create']);
Route::post('/categories', [CategoryController::class, 'store']);
Route::get('/', function () {
    return view('welcome');
});
Route::get('/items', [ItemController::class, 'index']);
Route::get('/items/create', [ItemController::class, 'create']);
Route::post('/items', [ItemController::class, 'store']);
Route::delete('/items/{id}', [App\Http\Controllers\ItemController::class, 'destroy']);
// لعرض صفحة التعديل
Route::get('/items/{id}/edit', [App\Http\Controllers\ItemController::class, 'edit']);

// لحفظ التعديلات الجديدة
Route::put('/items/{id}', [App\Http\Controllers\ItemController::class, 'update']);