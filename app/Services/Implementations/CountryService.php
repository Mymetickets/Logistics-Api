<?php

namespace App\Services\Implementations;

// Importing the CountryServiceInterface & CountryRepositoryInterface
use App\Services\Contracts\CountryServiceInterface;
use App\Repositories\Contracts\CountryRepositoryInterface;
use App\Models\Locations\Country; // Ensure Country model is imported


class CountryService implements CountryServiceInterface {
    protected $countryRepository;
    public function __construct(CountryRepositoryInterface $countryRepository) {
        $this->countryRepository = $countryRepository;
    }
    public function getAllCountries() { return $this->countryRepository->getAllCountries(); }
    public function getCountryById(int $id) { return $this->countryRepository->getCountryById($id); }
    public function createCountry(array $data) { return $this->countryRepository->createCountry($data); }
    public function updateCountry(int $id, array $data) { return $this->countryRepository->updateCountry($id, $data); }
    public function deleteCountry(int $id) { return $this->countryRepository->deleteCountry($id); }
}