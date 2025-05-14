<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;

Auth::routes();

Route::get('/', [OwnerController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('owners', OwnerController::class);
Route::resource('cars', CarController::class);



