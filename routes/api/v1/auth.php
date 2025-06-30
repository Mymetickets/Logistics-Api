<?php

use App\Http\Controllers\Apis\v1\AuthController;
use Illuminate\Support\Facades\Route;

Route::post("/register", [AuthController::class, "signup"]);
Route::post("/login", [AuthController::class, "login"]);