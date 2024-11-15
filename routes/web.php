<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionalController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('master')->group(function () {
    Route::resource('regionals', RegionalController::class);
    Route::resource('customers', CustomerController::class);
});
