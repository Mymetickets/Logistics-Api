<?php

namespace App\Repositories\Locations;

use App\Repositories\IRepository;
use App\Models\Locations\State;
use App\Exceptions\FailedProcessException;

class StateRepository implements IRepository
{
   
    public function all()
    {
        return State::query()->paginate(pageCount());
    }

    public function findById($id)
    {
        return State::find($id);
    }

    public function create($data)
    {
        return State::create($data);
    }

    public function update($id, $data)
    {
        $rec = State::where("id", $id)->update($data);
        return $rec;
    }

    public function delete($id)
    {
        $rec = State::where("id", $id)->delete();
        return $rec;
    }

    public function search($param)
    {
        return State::query()
            ->where("name", "LIKE", "%$param%")
            ->orWhere("status", "=", $param)
            ->paginate(pageCount());
    }

    public function getStatesByCountryId($countryId) {
        return State::where('country_id', $countryId)->paginate(pageCount());
    }
}