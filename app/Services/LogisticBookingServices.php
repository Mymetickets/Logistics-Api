<?php
namespace App\Services;

use App\Repositories\LogisticBookingRepository;

class LogisticBookingServices
{
    protected $logisticBookingRepository;

    public function __construct(LogisticBookingRepository $logisticBookingRepository)
    {
        $this->logisticBookingRepository = $logisticBookingRepository;
    }

    public function createBooking(array $data)
    {
        return $this->logisticBookingRepository->create($data);
    }

    public function updateBooking($id, array $data)
    {
        return $this->logisticBookingRepository->update($id, $data);
    }

    public function getBookingById($id)
    {
        return $this->logisticBookingRepository->findById($id);
    }

    public function deleteBooking($id)
    {
        return $this->logisticBookingRepository->delete($id);
    }
    public function getAllBookings()
    {
        return $this->logisticBookingRepository->all();
    }

    public function searchBookings($param)
    {
        return $this->logisticBookingRepository->search($param);
    }

    public function getBookingsByUserId($userId)
    {
        return $this->logisticBookingRepository->findByUserId($userId);
    }

}


?>
