<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KuesionerController; 
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\GrafikController;

// ✅ Group yang harus login dulu
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    // User (admin)
    Route::prefix('user')->name('user.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/create', [UserController::class, 'create'])->name('create');
        Route::post('/', [UserController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
        Route::delete('/{id}', [UserController::class, 'destroy'])->name('destroy');
    });

    // Kuesioner (admin & responden)
    Route::prefix('kuesioner')->name('kuesioner.')->group(function () {
        Route::get('/', [KuesionerController::class, 'index'])->name('index');
        Route::get('/result', [KuesionerController::class, 'show'])->name('result');
        Route::get('/create', [KuesionerController::class, 'create'])->name('create');
        Route::post('/', [KuesionerController::class, 'store'])->name('store');
        Route::post('/reset', [KuesionerController::class, 'reset'])->name('reset');
        Route::get('/{id}/edit', [KuesionerController::class, 'edit'])->name('edit');
        Route::put('/{id}', [KuesionerController::class, 'update'])->name('update');
        Route::delete('/{id}', [KuesionerController::class, 'destroy'])->name('destroy');
    });

    // Akun Saya
    Route::get('/akun', [AkunController::class, 'index'])->name('akun.index');
    Route::put('/akun/update', [AkunController::class, 'update'])->name('akun.update');
    


    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');



    Route::get('/analisis/responden', [AnalisisController::class, 'responden'])->name('analisis.responden');
    Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik.index');



    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ✅ Route yang bisa diakses tanpa login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/', function () {
    return view('landing');
})->name('landing');
