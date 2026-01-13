<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // Pastikan ini ada
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\RiwayatStokController;
use App\Http\Controllers\DetailPembelianController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

Route::get('/lupa-password', [AuthController::class, 'showForgot'])->name('password.forgot');
Route::post('/lupa-password', [AuthController::class, 'verifyForgot'])->name('password.verify');
Route::get('/reset-password/{id}', [AuthController::class, 'showReset'])->name('password.reset');
Route::put('/reset-password/{id}', [AuthController::class, 'updatePassword'])->name('password.update');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('kategori', KategoriController::class);
    Route::resource('barang', BarangController::class);
    Route::resource('pengguna', PenggunaController::class);
    Route::resource('satuan', SatuanController::class);
    Route::resource('pemasok', PemasokController::class);
    Route::resource('pembelian', PembelianController::class);
    Route::resource('detail-pembelian', DetailPembelianController::class);
    Route::resource('penjualan', PenjualanController::class);
    Route::resource('detail-penjualan', DetailPenjualanController::class);
    Route::resource('riwayat-stok', RiwayatStokController::class);
});