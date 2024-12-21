<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionalController;
use App\Http\Controllers\CustomerController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::prefix('master')->group(function () {
    Route::resource('regionals', RegionalController::class);
    Route::resource('customers', CustomerController::class);

    Route::get('customer/generate-excel', [CustomerController::class, 'generateExcel'])->name('customers.excel');
    Route::get('customer/{id}/pdf', [CustomerController::class, 'generatePDF'])->name('customers.pdf');
});
