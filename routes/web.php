<?php

use App\Http\Controllers\GastoController;

Route::view('/', 'inicio')->name('inicio');
Route::get('/gastos', [GastoController::class, 'index'])->name('gastos.index');
Route::post('/gastos', [GastoController::class, 'store'])->name('gastos.store');