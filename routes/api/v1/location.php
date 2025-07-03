<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Location\StatesController;
use App\Http\Controllers\Location\CountriesController; // Will be used later
use App\Http\Controllers\Location\LocationsController; // Will be used later

// State, Country & Location CRUD Routes
// These routes will automatically get the /api/v1 prefix 
// from the parent api-dot-php loader
Route::apiResource('states', StatesController::class)->only(['index', 'store']);
Route::apiResource('countries', CountriesController::class)->only(['index', 'store']);
Route::apiResource('locations', LocationsController::class)->only(['index', 'store']);
