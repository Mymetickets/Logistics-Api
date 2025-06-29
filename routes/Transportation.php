<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Apis\v1\Transportation\TransportationModeCategoryController;

Route::prefix('/TransportationModeCategory')->group(function () {
    Route::get('/', [TransportationModeCategoryController::class, "index"]);
    Route::post('/create', [TransportationModeCategoryController::class, "create"]);
    Route::get('/{id}', [TransportationModeCategoryController::class, "show"]);
    Route::put('/update/{id}', [TransportationModeCategoryController::class, "update"]);
    Route::delete('/delete', [TransportationModeCategoryController::class, 'destory']);
});
