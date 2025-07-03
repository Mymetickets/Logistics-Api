<?php
namespace App\Services\Implementations;

// Importing the LocationServiceInterface & LocationRepositoryInterface
use App\Services\Contracts\LocationServiceInterface;
use App\Repositories\Contracts\LocationRepositoryInterface;
// Importing the Location model
use App\Models\Locations\Location; 


class LocationService implements LocationServiceInterface {
    protected $locationRepository;
    public function __construct(LocationRepositoryInterface $locationRepository) {
        $this->locationRepository = $locationRepository;
    }
            

    public function getAllLocations() { return Location::with(['country', 'state'])->get();} // Eager load for GET /locations
    // public function getAllLocations() { return $this->locationRepository->getAllLocations(); }
    public function getLocationById(int $id) { return $this->locationRepository->getLocationById($id); }
    public function createLocation(array $data) { return $this->locationRepository->createLocation($data); }
    public function updateLocation(int $id, array $data) { return $this->locationRepository->updateLocation($id, $data); }
    public function deleteLocation(int $id) { return $this->locationRepository->deleteLocation($id); }
}