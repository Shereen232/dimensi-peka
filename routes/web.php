<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KuesionerController; 
use App\Http\Controllers\AkunController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\GrafikController;
use App\Http\Controllers\KelurahanController;

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
        Route::get('/detail-user', [UserController::class, 'detailUser'])->name('detail-user');
    });

    // Kuesioner (admin & responden)
    Route::prefix('kuesioner')->name('kuesioner.')->group(function () {
        Route::get('/', [KuesionerController::class, 'index'])->name('index');
        Route::get('/result/{id}', [KuesionerController::class, 'show'])->name('result');
        Route::get('/create', [KuesionerController::class, 'create'])->name('create');
        Route::post('/', [KuesionerController::class, 'store'])->name('store');
        Route::post('/reset', [KuesionerController::class, 'reset'])->name('reset');
        Route::get('/{id}/edit', [KuesionerController::class, 'edit'])->name('edit');
        Route::put('/{id}', [KuesionerController::class, 'update'])->name('update');
        Route::delete('/{id}', [KuesionerController::class, 'destroy'])->name('destroy');
        Route::get('/{id}/export/pdf', [KuesionerController::class, 'exportPDF'])->name('export.pdf');
    });

    // Akun Saya
    Route::get('/akun', [AkunController::class, 'index'])->name('akun.index');
    Route::put('/akun/update', [AkunController::class, 'update'])->name('akun.update');
    

    // Riwayat
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');

    // Kelola Kelurahan
    Route::get('/kelurahan', [KelurahanController::class, 'index'])->name('kelurahan.index');
    Route::get('/kelurahan/create', [KelurahanController::class, 'createKelurahan'])->name('kelurahan.create');
    Route::post('/kelurahan', [KelurahanController::class, 'storeKelurahan'])->name('kelurahan.store');
    Route::get('/kelurahan/{id}/edit', [KelurahanController::class, 'editKelurahan'])->name('kelurahan.edit');
    Route::put('/kelurahan/{id}', [KelurahanController::class, 'updateKelurahan'])->name('kelurahan.update');
    Route::delete('/kelurahan/{id}', [KelurahanController::class, 'destroyKelurahan'])->name('kelurahan.destroy');

    // Analisis

    Route::prefix('analisis')->name('analisis.')->group(function () {
        Route::get('/responden', [AnalisisController::class, 'responden'])->name('responden');
        Route::get('/laporan', [AnalisisController::class, 'laporan'])->name('laporan');
        Route::get('/export/laporan_pdf', [AnalisisController::class, 'exportLaporan'])->name('export.laporan_pdf');
        Route::get('/export/preview', [AnalisisController::class, 'preview'])->name('export.preview');
        Route::get('/export/pdf', [AnalisisController::class, 'exportPdf'])->name('export.pdf');
        Route::get('/export/excel', [AnalisisController::class, 'exportExcel'])->name('export.excel');

    });


    Route::get('/grafik', [GrafikController::class, 'index'])->name('grafik.index');
    Route::get('/grafik/wilayah', [GrafikController::class, 'wilayah'])->name('grafik.wilayah');
    Route::get('/grafik/jenis-kelamin', [GrafikController::class, 'jenisKelamin'])->name('grafik.jenis_kelamin');

    Route::get('/history', [HistoryController::class, 'index'])->name('history.index');



    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

// ✅ Route yang bisa diakses tanpa login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);


Route::get('/', function () {
    return view('landing');
})->name('landing');
