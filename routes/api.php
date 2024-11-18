<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



use App\Http\Controllers\RegionalController;
use App\Http\Controllers\CustomerController;

Route::prefix('api')->group(function () {
    Route::get('regional', [RegionalController::class, 'index']);
    Route::get('regional/{id}', [RegionalController::class, 'show']);
    Route::post('regional', [RegionalController::class, 'store']);
    Route::put('regional/{id}', [RegionalController::class, 'update']);
    Route::delete('regional/{id}', [RegionalController::class, 'destroy']);
    Route::post('regional/import', [RegionalController::class, 'import']);

    Route::get('customer', [CustomerController::class, 'index']);
    Route::post('customer', [CustomerController::class, 'store']);
});


Route::get('test', function () {
    return response()->json(['message' => 'API works']);
});
