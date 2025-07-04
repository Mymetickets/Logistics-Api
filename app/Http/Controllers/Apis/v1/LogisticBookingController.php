<?php

namespace App\Http\Controllers\Apis\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Class\ApiResponse;
use App\Exceptions\FailedProcessException;
use App\Http\Resources\LogisticBookingResource;
use App\Http\Requests\Bookings\StoreLogisticBookingRequest;
use App\Http\Requests\Bookings\UpdateLogisticBookingRequest;
use App\Services\LogisticBookingService;


class LogisticBookingController extends Controller
{
    public function __construct(private LogisticBookingService $logisticBookingServices)
    {
        //
    }

    public function createBooking(StoreLogisticBookingRequest $request)
    {
            // Validate the request data
            $validData = $request->validated();
            $booking = $this->logisticBookingServices->createBooking($validData);
            return ApiResponse::success('Booking created successfully', new LogisticBookingResource($booking));

    }

    public function updateBooking(UpdateLogisticBookingRequest $request, $id)
    {

            $validData = $request->validated();
            $booking = $this->logisticBookingServices->updateBooking($id, $validData);
            return ApiResponse::success('Booking updated successfully', new LogisticBookingResource($booking));

    }

    public function getBookingById($id)
    {
        $booking = $this->logisticBookingServices->getBookingById($id);
        return ApiResponse::success('User found', new LogisticBookingResource($booking));
    }

    public function deleteBooking($id)
    {

            $deleted = $this->logisticBookingServices->deleteBooking($id);
            return ApiResponse::success('Booking deleted successfully');

    }

    public function getAllBookings()
    {

            $bookings = $this->logisticBookingServices->getAllBookings();
            return ApiResponse::success('Bookings retrieved successfully', LogisticBookingResource::collection($bookings));

    }

    public function searchBookings(Request $request)
    {

            $param = $request->input('search');
            $bookings = $this->logisticBookingServices->searchBookings($param);
            return ApiResponse::success('Bookings found', LogisticBookingResource::collection($bookings));

    }

    public function getBookingsByUserId()
    {
            $userId = auth()->user()->id;
            $bookings = $this->logisticBookingServices->getBookingsByUserId($userId);
            return ApiResponse::success('Bookings found', LogisticBookingResource::collection($bookings));

    }
}
