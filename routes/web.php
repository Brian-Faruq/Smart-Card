<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmartCardController;

// 1. Halaman utama (Pilih Jenis Transaksi)
Route::get('/', [SmartCardController::class, 'landing'])->name('landing');

// 2. Halaman & Proses Login berdasarkan Mode (device / simart)
Route::get('/login/{type}', [SmartCardController::class, 'showLoginForm'])->name('login.form');
Route::post('/login/{type}', [SmartCardController::class, 'processLogin'])->name('login.process');
Route::post('/logout', [SmartCardController::class, 'logout'])->name('logout');

// 3. Halaman Transaksi (Perlu Login/Session)
Route::get('/transaksi/device', [SmartCardController::class, 'devicePage'])->name('transaksi.device');
Route::get('/transaksi/simart', [SmartCardController::class, 'simartPage'])->name('transaksi.simart');

// 4. Proses Transaksi
Route::post('/smart-card/rfid', [SmartCardController::class, 'processRfid'])->name('smart-card.rfid');
Route::post('/smart-card/barcode', [SmartCardController::class, 'processBarcode'])->name('smart-card.barcode');

// Route Pendaftaran Device & SIMART
Route::get('/transaksi/device/register', [SmartCardController::class, 'registerDevicePage'])->name('transaksi.device.register');
Route::post('/transaksi/device/register', [SmartCardController::class, 'storeDevice'])->name('transaksi.device.store');

Route::get('/transaksi/simart/register', [SmartCardController::class, 'registerSimartPage'])->name('transaksi.simart.register');
Route::post('/transaksi/simart/register', [SmartCardController::class, 'storeSimart'])->name('transaksi.simart.store');

// Route Riwayat Log Transaksi
Route::get('/transaksi/device/history', [SmartCardController::class, 'historyDevicePage'])->name('transaksi.device.history');
Route::get('/transaksi/simart/history', [SmartCardController::class, 'historySimartPage'])->name('transaksi.simart.history');

// Route Data Admin
Route::get('/admin/santri', [SmartCardController::class, 'adminDashboard'])->name('admin.santri');