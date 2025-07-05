<?php

use App\Http\Controllers\Apis\v1\LogisticBookingController;
use Illuminate\Support\Facades\Route;

// Define API routes for logistic bookings
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get("/bookings", [LogisticBookingController::class, "getAllBookings"]);
    Route::get("/bookings/user", [LogisticBookingController::class, "getBookingsByUserId"]);
    Route::get("/booking/{id}", [LogisticBookingController::class, "getBookingById"]);
    Route::post("/booking-create", [LogisticBookingController::class, "createBooking"]);
    Route::post("/bookings/search", [LogisticBookingController::class, "searchBookings"]);
    Route::put("/booking-update/{id}", [LogisticBookingController::class, "updateBooking"]);
    Route::delete("/booking-delete/{id}", [LogisticBookingController::class, "deleteBooking"]);
});

// Define routes for Admin access
Route::middleware(["auth:sanctum", "auth.admin"])->group(function(){
    Route::get("/admin/bookings", [LogisticBookingController::class, "getAllBookings"]);
    Route::get("/admin/bookings/user", [LogisticBookingController::class, "getBookingsByUserId"]);
    Route::get("/admin/booking/{id}", [LogisticBookingController::class, "getBookingById"]);
});
