<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Auth\GoogleLoginController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\FinancialCalculatorController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\AnggaranController;
use App\Http\Controllers\BayarPinjamanController;
use App\Http\Controllers\CompareController;
use App\Http\Controllers\LupaPasswordController;
use App\Http\Controllers\UbahPasswordController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

// Log in
Route::get('/', function () {
    return redirect()->route('pointech');
})->name('login');
Route::get('/pointech', [LoginController::class, 'index'])->name('pointech')->middleware('guest');
Route::post('/pointech', [LoginController::class, 'authenticate']);

// Log in Google
Route::get('/login/google', [GoogleLoginController::class, 'redirectToGoogle']);
Route::get('/login/google/callback', [GoogleLoginController::class, 'handleGoogleCallback']);

// Daftar
Route::get('/daftar', [DaftarController::class, 'index']);
Route::post('/daftar', [DaftarController::class, 'store']);

// Dashboard
Route::middleware(['auth'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/chart-data', [DashboardController::class, 'getChartData']);
    Route::get('/pie-data', [DashboardController::class, 'getPieData']);
    Route::get('/todayTransactions', [DashboardController::class, 'TodayTransactions']);
    Route::get('/line-data', [DashboardController::class, 'lineData']);
    Route::get('/jenis-pengeluaran', [DashboardController::class, 'getJenisPengeluaran']);
    Route::get('/transaksi', [DashboardController::class, 'getTransaksiByPengeluaran']);
});

Route::get('/logout', [DashboardController::class, 'logout']);

// Pemasukan
Route::resource('/pemasukan', PemasukanController::class)->middleware('auth');
Route::post('/pemasukan', [PemasukanController::class, 'store']);
Route::delete('/pemasukan', [PemasukanController::class, 'destroy']);

// Pengeluaran
Route::resource('/pengeluaran', PengeluaranController::class)->middleware('auth');
Route::post('/pengeluaran', [PengeluaranController::class, 'store']);
Route::delete('/pengeluaran', [PengeluaranController::class, 'destroy']);

// Transaksi
Route::get('/transaksi/cetak_pdf', [TransaksiController::class, 'cetak_pdf']);
Route::get('/transaksi/download-excel', [TransaksiController::class, 'downloadExcel']);
Route::post('/import-transaksi', [TransaksiController::class, 'import'])->name('import-transaksi');
Route::get('/download-template', [TransaksiController::class, 'downloadTemplate'])->name('download-template');
Route::post('/transaksi/importExcel', [TransaksiController::class, 'importExcel'])->name('transaksi.importExcel');
Route::post('/upload', [TransaksiController::class, 'upload'])->name('upload');
Route::resource('/transaksi', TransaksiController::class)->middleware('auth');
Route::post('/transaksi', [TransaksiController::class, 'store'])->name('transaksi.store');
Route::delete('/transaksi', [TransaksiController::class, 'destroy']);

// Compare
Route::get('/compare', [CompareController::class, 'index'])->middleware('auth');
Route::post('/compare', [CompareController::class, 'index'])->middleware('auth');

// Barang
Route::resource('/barang', BarangController::class)->middleware('auth');
Route::post('/barang', [BarangController::class, 'store']);
Route::delete('/barang', [BarangController::class, 'destroy']);

// Kalkulator
Route::get('/kalkulator', [FinancialCalculatorController::class, 'index'])->middleware('auth');
Route::post('/kalkulator/calculate', [FinancialCalculatorController::class, 'calculate'])->middleware('auth');
Route::get('/kalkulator/calculate', [FinancialCalculatorController::class, 'showResult'])->name('showResult')->middleware('auth');
Route::get('/kalkulator/cetak_pdf', [FinancialCalculatorController::class, 'cetak_pdf'])->middleware('auth');

// Pinjaman
Route::middleware(['auth'])->group(function () {
    Route::resource('pinjaman', PinjamanController::class);
    Route::post('/pinjaman/{id}/bayar', [BayarPinjamanController::class, 'bayar'])->name('pinjaman.bayar');
    Route::delete('/bayar_pinjaman/{id}', [BayarPinjamanController::class, 'destroy'])->name('bayar_pinjaman.destroy');
});

// Anggaran
Route::resource('/anggaran', AnggaranController::class)->middleware('auth');
Route::post('/anggaran', [AnggaranController::class, 'store']);
Route::delete('/anggaran', [AnggaranController::class, 'destroy']);

// Ubah Password
Route::get('/ubah-password', [UbahPasswordController::class, 'index'])->middleware('auth');
Route::post('/ubah-password', [UbahPasswordController::class, 'store'])->middleware('auth');

// Lupa Password
Route::resource('/lupa-password', LupaPasswordController::class);
