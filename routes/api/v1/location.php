<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\v1\Location\StatesController;
 
Route::prefix('/states')->group(function () {
    Route::get('/search', [StatesController::class, 'search']);
    Route::get('/', [StatesController::class, 'index']);
    Route::post('/', [StatesController::class, 'store']);

    Route::get('/{state}', [StatesController::class, 'show']);
    Route::put('/{state}', [StatesController::class, 'update']);
    Route::delete('/{state}', [StatesController::class, 'destroy']);

});
