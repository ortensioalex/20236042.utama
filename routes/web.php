<?php

use App\Http\Controllers\GuitarController;
use Illuminate\Support\Facades\Route;

Route::get('/', [GuitarController::class, 'index'])->name('home');
Route::post('/contact', [GuitarController::class, 'contact'])->name('contact.send');
Route::post('/buy', [GuitarController::class, 'buy'])->name('buy.process');