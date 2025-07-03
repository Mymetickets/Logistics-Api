<?php

namespace App\Repositories\Contracts; 

interface LocationRepositoryInterface {
    public function getAllLocations();
    public function getLocationById(int $id);
    public function createLocation(array $data);
    public function updateLocation(int $id, array $data);
    public function deleteLocation(int $id);
}