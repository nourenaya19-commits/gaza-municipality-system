<?php

use App\Http\Controllers\StoreController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// المسارات العامة
Route::get('/', function () { return view('home'); });
Route::get('/home', function () { return view('home'); });

// المسارات المحمية (كل ما يخص الإدارة)
Route::middleware(['auth', 'verified'])->group(function () {
    
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');

    // 1. مسارات المخازن (Stores) - مرتبطة بـ StoreController فقط
    Route::get('/stores', [StoreController::class, 'index'])->name('stores.index');
    Route::get('/stores/create', [StoreController::class, 'create'])->name('stores.create');
    Route::post('/stores', [StoreController::class, 'store'])->name('stores.store');
    Route::get('/stores/{id}/edit', [StoreController::class, 'edit'])->name('stores.edit');
    Route::put('/stores/{id}', [StoreController::class, 'update'])->name('stores.update');
    Route::delete('/stores/{id}', [StoreController::class, 'destroy'])->name('stores.destroy');

    // 2. مسارات المواد (Items) - مرتبطة بـ ItemController فقط
    Route::get('/items', [ItemController::class, 'index'])->name('items.index');
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/{id}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{id}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{id}', [ItemController::class, 'destroy'])->name('items.destroy');

    // 3. مسارات الملف الشخصي
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';