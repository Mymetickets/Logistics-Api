<?php
namespace App\Services\Locations;
use App\Repositories\Locations\CountryRepository;

class CountryService
{
    protected $countryRepository;

    /**
     * Create a new class instance.
     */
    public function __construct(CountryRepository $countryRepository)
    {
        $this->countryRepository = $countryRepository;
    }

    public function getAllCountries()
    {
        $data = $this->countryRepository->all();
        if(!$data) {
          throw new FailedProcessException('No Country Found',StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function getCountryById($id)
    {
        $data = $this->countryRepository->findById($id);
        if(!$data) {
          throw new FailedProcessException('No Country Found',StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function createCountry($data)
    {
        $data = $this->countryRepository->create($data);
        if(!$data) {
          throw new FailedProcessException('Country Creation Failed',StatusCodeEnums::FAILED);
        }
        return $data;
    }

    public function updateCountry($id, $data)
    {
        $country = $this->countryRepository->findById($id);

        if(!$country) {
          throw new FailedProcessException('Country Not Found',StatusCodeEnums::FAILED);
        }

        $data = $this->countryRepository->update($id, $data);

         if(!$data) {
          throw new FailedProcessException('Country Update Failed',StatusCodeEnums::FAILED);
        }

        return $data;
    }

    public function deleteCountry($id)
    {
        $country = $this->countryRepository->findById($id);

        if(!$country) {
          throw new FailedProcessException('Country Not Found',StatusCodeEnums::FAILED);
        }

        $data = $this->countryRepository->delete($id);
        if(!$data) {
          throw new FailedProcessException('Country Delete Failed',StatusCodeEnums::FAILED);
        }

        return $data;
    }
}
?>
