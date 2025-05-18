<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\ShortCodeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\CarPhotoController;
use App\Http\Middleware\Bug;
use App\Http\Middleware\IsAdmin;

Auth::routes();

Route::resource('cars', CarController::class)->only('index')->middleware('auth');
Route::resource('owners', OwnerController::class)->only('index')->middleware('auth');

Route::get('/', function () {
    return Auth::check()
        ? redirect()->route('owners.index')
        : redirect()->route('login');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('cars', CarController::class)->except(['index', 'destroy'])->middleware(Bug::class);
Route::resource('cars', CarController::class)->only(['destroy', 'create', 'store', 'edit', 'update'])->middleware(IsAdmin::class);

Route::resource('owners', OwnerController::class)->except(['index', 'destroy'])->middleware(Bug::class);
Route::resource('owners', OwnerController::class)->only(['destroy', 'create', 'store', 'edit', 'update'])->middleware(IsAdmin::class);

Route::resource('shortcodes', ShortCodeController::class)->only('index')->middleware('auth');
Route::resource('shortcodes', ShortCodeController::class)->except(['index', 'destroy'])->middleware(Bug::class);
Route::resource('shortcodes', ShortCodeController::class)->only(['destroy', 'create', 'store', 'edit', 'update'])->middleware(IsAdmin::class);

Route::get('setLanguage/{lang}', [LangController::class, 'switchLang'])->name('setLanguage');

Route::delete('/car-photo/{carPhoto}', [CarPhotoController::class, 'destroy'])->name('car-photos.destroy');

