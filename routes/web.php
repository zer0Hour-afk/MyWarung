<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\PemasokController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DetailPembelianController;
use App\Http\Controllers\DetailPenjualanController;
use App\Http\Controllers\RiwayatStokController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

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
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');