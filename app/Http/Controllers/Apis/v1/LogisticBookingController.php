<?php

namespace App\Http\Controllers\Apis\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Class\ApiResponse;
use App\Exceptions\FailedProcessException;
use App\Http\Resources\LogisticBookingResource;
use App\Http\Requests\Bookings\StoreLogisticBookingRequest;
use App\Http\Requests\Bookings\UpdateLogisticBookingRequest;
use App\Services\LogisticBookingServices;

class LogisticBookingController extends Controller
{
    public function __construct(private LogisticBookingServices $logisticBookingServices)
    {
        //
    }

    public function createBooking(StoreLogisticBookingRequest $request)
    {
        try{
            $validData = $request->validated();
            $booking = $this->logisticBookingServices->createBooking($validData);
            return ApiResonse::success('Booking created successfully', new LogisticBookingResource($booking));
        } catch (FailedProcessException $e) {
            return ApiResponse::success($e->getMessage());
        }
    }

    public function updateBooking(UpdateLogisticBookingRequest $request, $id)
    {
        try{
            $validData = $request->validated();
            $booking = $this->logisticBookingServices->updateBooking($id, $validData);
            return ApiResponse::success('Booking updated successfully', new LogisticBookingResource($booking));
        } catch (FailedProcessException $e) {
            return ApiResponse::success($e->getMessage());
        }
    }

    public function getBookingById($id)
    {
        try{
        $booking = $this->logisticBookingServices->getBookingById($id);

        return ApiResponse::success('User found', new LogisticBookingResource($booking));
        } catch (FailedProcessException $e) {
            return ApiResponse::success($e->getMessage());
        }
    }

    public function deleteBooking($id)
    {
        try{
            $deleted = $this->logisticBookingServices->deleteBooking($id);
            return ApiResponse::success('Booking deleted successfully', new LogistBookingResource($booking));
        } catch (FailedProcessException $e) {
            return ApiResponse::success($e->getMessage());
        }
    }

    public function getAllBookings()
    {
        try{
            $bookings = $this->logisticBookingServices->getAllBookings();
            return ApiResponse::success('Bookings retrieved successfully', LogisticBookingResource::collection($bookings));
        } catch (FailedProcessException $e) {
            return ApiResponse::success($e->getMessage());
        }
    }

    public function searchBookings(Request $request)
    {
        try{
            $param = $request->input('search');
            $bookings = $this->logisticBookingServices->searchBookings($param);
            return ApiResponse::success('Bookings found', LogisticBookingResource::collection($bookings));
        } catch (FailedProcessException $e) {
            return ApiResponse::success($e->getMessage());
        }
    }

    public function getBookingsByUserId($userId)
    {
        try{
            $bookings = $this->logisticBookingServices->getBookingsByUserId($userId);
            return ApiResponse::success('Bookings found', LogisticBookingResource::collection($bookings));
        } catch (FailedProcessException $e) {
            return ApiResponse::success($e->getMessage());
        }
    }
}
