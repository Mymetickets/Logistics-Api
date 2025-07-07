<?php

namespace App\Services;

use App\Exceptions\FailedProcessException;
use App\Enums\StatusCodeEnums;
use App\Repositories\LogisticBookingRepository;
use App\Enums\LogisticBookingEnums;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use App\Notifications\BookingStatusChanged;
use Illuminate\Support\Facades\Notification;


class LogisticBookingService
{
    protected $logisticBookingRepository;

    public function __construct(LogisticBookingRepository $logisticBookingRepository)
    {
        $this->logisticBookingRepository = $logisticBookingRepository;
    }

    public function createBooking(array $data)
    {
        $data = $this->logisticBookingRepository->create($data);
        if (!$data) {
            throw new FailedProcessException('Booking creation failed', StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function updateBooking($id, array $data)
    {
        $booking = $this->logisticBookingRepository->findById($id);

        if (!$booking) {
            throw new FailedProcessException('Booking not found', StatusCodeEnums::FAILED);
        }

        if ($booking->status !== LogisticBookingEnums::DRAFT) {

            throw new FailedProcessException('Only bookings in draft status can be updated', StatusCodeEnums::FAILED);
        }

        $updatedBooking = $this->logisticBookingRepository->update($id, $data);

        if (!$updatedBooking) {

            throw new FailedProcessException('Booking update failed', StatusCodeEnums::FAILED);
        }

        // Notify the user about the booking status change
        $user = User::find($booking->user_id);
        if ($user) {
            Notification::send($user, new BookingStatusChanged($id, $data['status']));
        }

        return $updatedBooking;
    }

    public function getBookingById($id)
    {
        $this->authorize('view', LogisticBooking::class); //the user will only fetch his own booking or if he is an admin
        $data = $this->logisticBookingRepository->findById($id);
        if (!$data) {
            throw new FailedProcessException('Booking not found', StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function deleteBooking($id)
    {
        //checking if ID is valid
        $booking = $this->logisticBookingRepository->findById($id);

        if (!$booking) {
            throw new FailedProcessException('Booking not found', StatusCodeEnums::FAILED);
        }

        $data = $this->logisticBookingRepository->delete($id);
        if (!$data) {
            throw new FailedProcessException('Booking Deletion failed', StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function getAllBookings()
    {
        // Check if the user has permission to view all bookings
        $this->authorize('viewAny', LogisticBooking::class);

        $data = $this->logisticBookingRepository->all();
        if (!$data) {
            throw new FailedProcessException('No bookings found', StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function searchBookings($param)
    {
        $data = $this->logisticBookingRepository->search($param);
        if (!$data) {
            throw new FailedProcessException('Booking not found', StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function getBookingsByUserId($userId)
    {
        $this->authorize('view', LogisticBooking::class); //the user will only fetch his own booking or if he is an admin
        $data = $this->logisticBookingRepository->findByUserId($userId);
        if (!$data) {
            throw new FailedProcessException('Booking not found for this user', StatusCodeEnums::FAILED);
        }
        return $data;
    }
     public function changeStatus($id, $status)
    {
        return $this->logisticBookingRepository->updateStatus($id, $status);
    }
}
