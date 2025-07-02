<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Location\StoreLocationRequest;
use App\Http\Resources\LocationResource;
use App\Services\Contracts\LocationServiceInterface;
use App\Http\Traits\ApiResponse; // Referencing the ApiResponseTrait

class LocationsController extends Controller
{
use ApiResponse; // Using the APIResponseTrait

    protected $locationService;

    public function __construct(LocationServiceInterface $locationService)
    {
        $this->locationService = $locationService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = $this->locationService->getAllLocations();
        return $this->successResponse('Locations retrieved successfully', LocationResource::collection($locations));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLocationRequest $request)
    {
        $location = $this->locationService->createLocation($request->validated());
        return $this->successResponse('Location created successfully', new LocationResource($location), 201);
    
    }

    // Other CRUD methods (show, update, destroy) will go here later
}