<?php
use App\Http\Controllers\Apis\v1\Locations\StateController;
use App\Http\Controllers\Apis\v1\Locations\LocationController;
use App\Http\Controllers\Apis\v1\Locations\CountryController;
use Illuminate\Support\Facades\Route;

//state

Route::get('/states',[StateController::class, 'getAllStates']);
Route::get('/state/{id}',[StateController::class, 'getStateById']);
Route::post('/state/create',[StateController::class, 'createState']);
Route::put('/state/update/{id}',[StateController::class, 'updateState']);
Route::delete('/state/delete/{id}',[StateController::class, 'deleteState']);











?>
