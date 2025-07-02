<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Country\StoreCountryRequest;
use App\Http\Resources\CountryResource;
use App\Services\Contracts\CountryServiceInterface;
use App\Http\Traits\ApiResponse; // Referencing the ApiResponseTrait

class CountriesController extends Controller
{
use ApiResponse; // Using the APIResponseTrait

    protected $countryService;

    public function __construct(CountryServiceInterface $countryService)
    {
        $this->countryService = $countryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countries = $this->countryService->getAllCountries();
        return $this->successResponse('Countries retrieved successfully', CountryResource::collection($countries));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCountryRequest $request)
    {
        try {
            $country = $this->countryService->createCountry($request->validated());
            return $this->successResponse('Country created successfully', new CountryResource($country), 201);
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to create country', 500, $e->getMessage());
        }
    }

    // Other CRUD methods (show, update, destroy) will go here later
}