<?php
namespace App\Services\Contracts;
interface LocationServiceInterface {
    public function getAllLocations();
    public function getLocationById(int $id);
    public function createLocation(array $data);
    public function updateLocation(int $id, array $data);
    public function deleteLocation(int $id);
}