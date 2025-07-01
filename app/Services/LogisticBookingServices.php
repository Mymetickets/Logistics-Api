<?php
namespace App\Services;
use App\Exceptions\FailedProcessException;
use App\Enums\StatusCodeEnums;
use App\Repositories\LogisticBookingRepository;
use App\Enums\LogisticBookingEnums;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

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
            throw new FailedProcessException('Booking creation failed',StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function updateBooking($id, array $data)
    {
        $booking = $this->logisticBookingRepository->findById($id);

    if (!$booking) {
        throw new FailedProcessException('Booking not found',StatusCodeEnums::FAILED);

    }

    if ($booking->status !== LogisticBookingEnums::DRAFT) {

        throw new FailedProcessException('Only bookings in draft status can be updated',StatusCodeEnums::FAILED);


    }

        $data= $this->logisticBookingRepository->update($id, $data);

    if (!$data) {

        throw new FailedProcessException('Booking update failed',StatusCodeEnums::FAILED);
    }
        return $data;
    }

    public function getBookingById(Request $request, $id)
    {
        $data= $this->logisticBookingRepository->findById($id);
        if (!$data) {
            throw new FailedProcessException('Booking not found',StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function deleteBooking($id)
    {
        //checking if ID is valid
        $booking = $this->logisticBookingRepository->findById($id);

        if (!$booking) {
          throw new FailedProcessException('Booking not found',StatusCodeEnums::FAILED);
        }

        $data= $this->logisticBookingRepository->delete($id);
        if (!$data) {
            throw new FailedProcessException('Booking Deletion failed',StatusCodeEnums::FAILED);
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
            throw new FailedProcessException('Booking not found',StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function getBookingsByUserId($userId)
    {
        $data= $this->logisticBookingRepository->findByUserId($userId);
        if (!$data) {
            throw new FailedProcessException('Booking not found for this user',StatusCodeEnums::FAILED);
        }
        return $data;
    }

}


?>
