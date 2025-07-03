<?php
namespace App\Services\Contracts;
interface CountryServiceInterface {
    public function getAllCountries();
    public function getCountryById(int $id);
    public function createCountry(array $data);
    public function updateCountry(int $id, array $data);
    public function deleteCountry(int $id);
}