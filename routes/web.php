<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KuesionerController; 

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Routes untuk menu User
Route::prefix('user')->name('user.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/', [UserController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
});

// Routes untuk menu Kuesioner
Route::prefix('kuesioner')->name('kuesioner.')->group(function () {
    Route::get('/', [KuesionerController::class, 'index'])->name('index');
    Route::get('/create', [KuesionerController::class, 'create'])->name('create');
    Route::post('/', [KuesionerController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [KuesionerController::class, 'edit'])->name('edit');
    Route::put('/{id}', [KuesionerController::class, 'update'])->name('update');
    Route::delete('/{id}', [KuesionerController::class, 'destroy'])->name('destroy');
});
