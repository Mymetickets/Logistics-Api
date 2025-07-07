<?php

namespace App\Repositories\Locations;

use App\Models\Locations\Location;
use App\Repositories\IRepository;
use App\Exceptions\FailedProcessException;

class LocationRepository implements IRepository {
    public function getAllLocations() { return Location::all(); }
    public function getLocationById(int $id) { return Location::findOrFail($id); }
    public function createLocation(array $data) { return Location::create($data); }
    public function updateLocation(int $id, array $data) {
        $location = $this->getLocationById($id);
        $location->update($data);
        return $location;
    }
    public function deleteLocation(int $id) { return $this->getLocationById($id)->delete(); }
}