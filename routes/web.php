<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OCRController;

Route::get('/', [HomeController::class, 'index'])->name('homepage');
Route::post('/process-ocr', [OCRController::class, 'process'])->name('ocr.process');