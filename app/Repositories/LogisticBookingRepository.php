<?php

namespace App\Repositories;

use App\Models\LogisticBooking;

class LogisticBookingRepository implements IRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function all()
    {
        $data = LogisticBooking::with(['user', 'location', 'transportMode'])->paginate(pageCount());
        return $data;
    }

    public function findById($id)
    {
        $data = LogisticBooking::with(['user', 'location', 'transportMode'])->findOrFail($id);
        return $data;
    }

    public function create($data)
    {
        $record = LogisticBooking::create($data);
        return $record;
    }

    public function update($id, $data)
    {
        $rec = LogisticBooking::where("id", $id)->update($data);
        return $rec;
    }

    public function delete($id)
    {
        $rec = LogisticBooking::where("id", $id)->delete();
        return $rec;
    }

    public function search($param)
    {
        $rec = LogisticBooking::with(['user', 'location', 'transportMode'])
            ->where("good_name", "LIKE", "%$param%")
            ->orWhere("status", "=", $param)
            ->orWhere("receiver_name", "LIKE", "%$param%")
            ->get();
        return $rec;
    }

    public function findByUserId($userId)
    {
        $data = LogisticBooking::with(['user', 'location', 'transportMode'])
        ->where("user_id", $userId)
        ->paginate(pageCount());
        return $data;
    }
}
