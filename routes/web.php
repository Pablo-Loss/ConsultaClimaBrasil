<?php

use App\Http\Controllers\ClimateController;
use App\Http\Controllers\HistoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ClimateController::class, 'index'])->name('climate.index');
Route::post('/visualize', [ClimateController::class, 'visualize'])->name('climate.visualize.result');
Route::post('/create', [ClimateController::class, 'create'])->name('climate.create');

Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
Route::get('/compare', [HistoryController::class, 'compareIndex'])->name('compare.index');
Route::post('/comparison', [HistoryController::class, 'comparison'])->name('compare.comparison');