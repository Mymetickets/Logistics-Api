<?php

namespace App\Repositories\Implementations;

use App\Models\Locations\Country; // Import!ing model!
use App\Repositories\Contracts\CountryRepositoryInterface; // Importing interface!

class CountryRepository implements CountryRepositoryInterface {
    public function getAllCountries() { return Country::all(); }
    public function getCountryById(int $id) { return Country::findOrFail($id); }
    public function createCountry(array $data) { return Country::create($data); }
    public function updateCountry(int $id, array $data) {
        $country = $this->getCountryById($id);
        $country->update($data);
        return $country;
    }
    public function deleteCountry(int $id) { return $this->getCountryById($id)->delete(); }
}