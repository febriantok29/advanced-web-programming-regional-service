use App\Http\Controllers\RegionalController;

Route::prefix('api')->group(function () {
    Route::get('regional', [RegionalController::class, 'index']);
    Route::get('regional/{id}', [RegionalController::class, 'show']);
    Route::post('regional', [RegionalController::class, 'store']);
    Route::put('regional/{id}', [RegionalController::class, 'update']);
    Route::delete('regional/{id}', [RegionalController::class, 'destroy']);
    Route::post('regional/import', [RegionalController::class, 'import']);
});

Route::middleware('api')
    ->namespace($this->namespace)
    ->group(base_path('routes/api.php'));


Route::get('test', function () {
    return response()->json(['message' => 'API works']);
});

