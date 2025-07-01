<?php

use App\Http\Controllers\Apis\v1\LogisticBookingController;
use Illuminate\Support\Facades\Route;

Route::post("/booking-create", [LogisticBookingController::class, "createBooking"]);
Route::put("/booking-update/{id}", [LogisticBookingController::class, "updateBooking"]);
Route::get("/booking/{id}", [LogisticBookingController::class, "getBookingById"]);
Route::delete("/booking-delete/{id}", [LogisticBookingController::class, "deleteBooking"]);
Route::get("/bookings", [LogisticBookingController::class, "getAllBookings"]);
Route::get("/bookings/user", [LogisticBookingController::class, "getBookingsByUserId"]);
Route::post("/bookings/search", [LogisticBookingController::class, "searchBookings"]);
