<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ValidasiTahapSatuController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ValidasiTahapDuaController;
use App\Http\Controllers\FinalisasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ManageKriteriaController;
use App\Http\Controllers\ManageUserController;
use Illuminate\Support\Facades\Route;

// Rute untuk tamu (pengguna yang belum login)
Route::middleware(['guest'])->group(function () {
    Route::get('/home', [WelcomeController::class, 'index'])->name('home');
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'postlogin']);
    // Acccessor Kriteria
    Route::get('/public/kriteria/{id}', [WelcomeController::class, 'index'])->name('home.kriteria');
});

// Rute untuk pengguna yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/profile', [UserController::class, 'profile']);
    Route::post('/updatephoto', [UserController::class, 'updatePhoto']);
    
    // Rute untuk Validasi Tahap Satu
    Route::get('/validasitahapsatu', [ValidasiTahapSatuController::class, 'index'])->name('validasi.tahap.satu');
    Route::post('/validasitahapsatu/list', [ValidasiTahapSatuController::class, 'list'])->name('validasi.tahap.satu.list');
    Route::get('/validasitahapsatu/{id}/show', [ValidasiTahapSatuController::class, 'show'])->name('validasi.tahap.satu.show'); 
    Route::post('/validasitahapsatu/{id}/approve', [ValidasiTahapSatuController::class, 'approve'])->name('validasi.tahap.satu.approve');
    Route::post('/validasitahapsatu/{id}/reject', [ValidasiTahapSatuController::class, 'reject'])->name('validasi.tahap.satu.reject');

    // Rute untuk Validasi Tahap Dua
    Route::get('/validasitahapdua', [ValidasiTahapDuaController::class, 'index'])->name('validasi.tahap.dua');
    Route::post('/validasitahapdua/list', [ValidasiTahapDuaController::class, 'list'])->name('validasi.tahap.dua.list');
    Route::get('/validasitahapdua/{id}/show', [ValidasiTahapDuaController::class, 'show'])->name('validasi.tahap.dua.show');
    Route::post('/validasitahapdua/{id}/approve', [ValidasiTahapDuaController::class, 'approve'])->name('validasi.tahap.dua.approve');
    Route::post('/validasitahapdua/{id}/reject', [ValidasiTahapDuaController::class, 'reject'])->name('validasi.tahap.dua.reject');
});

// Rute untuk Admin Kriteria (pengerjaan kriteria)
Route::prefix('kriteria')->group(function () {
    Route::get('{id}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
    Route::post('{id}/save', [KriteriaController::class, 'save'])->name('kriteria.save');
    Route::post('{id}/submit', [KriteriaController::class, 'submit'])->name('kriteria.submit');
    Route::delete('{id}/data/{dataId}', [KriteriaController::class, 'deleteData'])->name('kriteria.deleteData');
    Route::delete('{id}/delete-gambar/{gambarId}', [KriteriaController::class, 'deleteGambar'])->name('kriteria.deleteGambar');
});

Route::prefix('finalisasi-dokumen')->middleware(['auth'])->group(function () {
    Route::get('/', [FinalisasiController::class, 'index'])->name('finalisasi.index');
    Route::post('/list', [FinalisasiController::class, 'list'])->name('finalisasi.list');
    Route::get('/export', [FinalisasiController::class, 'export'])->name('finalisasi.export');
    Route::get('/show/{id}', [FinalisasiController::class, 'showFinal'])->name('finalisasi.showFinal');
});

// Rute untuk SuperAdmin
Route::middleware(['auth'])->group(function () {
    Route::prefix('manage-users')->group(function () {
        Route::get('/', [ManageUserController::class, 'index'])->name('users.manage');
        Route::post('/create', [ManageUserController::class, 'create'])->name('users.create');
    });

    Route::prefix('manage-kriteria')->group(function () {
        Route::get('/', [ManageKriteriaController::class, 'index'])->name('kriteria.manage');
        Route::post('/create', [ManageKriteriaController::class, 'create'])->name('kriteria.create');
    });
});