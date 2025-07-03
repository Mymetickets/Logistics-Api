<?php

namespace App\Repositories\Implementations;

use App\Models\Locations\Location; // Import!ing model!
use App\Repositories\Contracts\LocationRepositoryInterface; // Importing interface!

class LocationRepository implements LocationRepositoryInterface {
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