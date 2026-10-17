<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmartCardController;

// Route untuk Sistem Smart Card (RFID & SIMART)
Route::get('/smart-card', [SmartCardController::class, 'index'])->name('smart-card.index');
Route::post('/smart-card/rfid', [SmartCardController::class, 'processRfid'])->name('smart-card.rfid');
Route::post('/smart-card/barcode', [SmartCardController::class, 'processBarcode'])->name('smart-card.barcode');

Route::get('/', function () {
    return view('welcome');
});
