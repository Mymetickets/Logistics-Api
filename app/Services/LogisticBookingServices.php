<?php
namespace App\Services;

use App\Repositories\LogisticBookingRepository;
use App\Enums\LogisticBookingEnums;

class LogisticBookingServices
{
    protected $logisticBookingRepository;

    public function __construct(LogisticBookingRepository $logisticBookingRepository)
    {
        $this->logisticBookingRepository = $logisticBookingRepository;
    }

    public function createBooking(array $data)
    {
        $data= $this->logisticBookingRepository->create($data);
        if (!$data) {
            abort(401, "Booking creation failed");
        }
        return $data;
    }

    public function updateBooking($id, array $data)
    {
        $booking = $this->logisticBookingRepository->findById($id);

    if (!$booking) {
        abort(401, "Booking not found");;
    }

    if ($booking->status !== LogisticBookingEnums::DRAFT) {
        abort(401, 'Only bookings in draft status can be updated.');
    }

        $data= $this->logisticBookingRepository->update($id, $data);

    if (!$data) {
        abort(401, "Booking update failed");
    }
        return $data;
    }

    public function getBookingById($id)
    {
        $data= $this->logisticBookingRepository->findById($id);
        if (!$data) {
            abort(401, "Booking not found");
        }
        return $data;
    }

    public function deleteBooking($id)
    {
        //checking if ID is valid
    $booking = $this->logisticBookingRepository->findById($id);

        if (!$booking) {
            abort(401, "booking not found");
        }

        $data= $this->logisticBookingRepository->delete($id);
        if (!$data) {
            abort(401, "Booking deletion failed");
        }
        return $data;
    }

    public function getAllBookings()
    {
        return $this->logisticBookingRepository->all();
    }

    public function searchBookings($param)
    {
        $data= $this->logisticBookingRepository->search($param);
        if (!$data) {
            abort(401, "Bookings not found");
        }
        return $data;
    }

    public function getBookingsByUserId($userId)
    {
        $data= $this->logisticBookingRepository->findByUserId($userId);
        if (!$data) {
            abort(401, "Bookings not found for this user");
        }
        return $data;
    }

}


?>
