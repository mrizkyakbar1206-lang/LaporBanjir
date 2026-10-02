<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaporanController;

Route::redirect('/', '/laporan');
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
Route::get('/laporan/buat', [LaporanController::class, 'create'])->name('laporan.form');
Route::post('/laporan', [LaporanController::class, 'store'])->name('laporan.submit');
