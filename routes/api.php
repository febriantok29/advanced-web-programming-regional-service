<?php

use Illuminate\Support\Facades\Route;
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

Route::middleware('api')
    ->namespace($this->namespace)
    ->group(base_path('routes/api.php'));


Route::get('test', function () {
    return response()->json(['message' => 'API works']);
});

