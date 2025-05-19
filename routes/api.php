<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarAPI;
use App\Http\Controllers\Api\OwnerAPI;

Route::apiResource('cars', CarAPI::class);
Route::apiResource('owners', OwnerAPI::class);
