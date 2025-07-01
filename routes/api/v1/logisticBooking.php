<?php

use App\Http\Controllers\Apis\v1\LogisticBookingController;
use Illuminate\Support\Facades\Route;

Route::post("/booking-create", [LogisticBookingController::class, "createBooking"]);
Route::post("/login", [LogisticBookingController::class, "login"]);
