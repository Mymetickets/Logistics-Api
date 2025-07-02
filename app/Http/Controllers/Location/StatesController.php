<?php

namespace App\Http\Controllers\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\State\StoreStateRequest;
use App\Http\Resources\StateResource;
use App\Services\Contracts\StateServiceInterface;
use App\Http\Traits\ApiResponse; // Referencing the ApiResponseTrait

class StatesController extends Controller
{
use ApiResponse; // Using the APIResponseTrait

    protected $stateService;

    public function __construct(StateServiceInterface $stateService)
    {
        $this->stateService = $stateService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $states = $this->stateService->getAllStates();
        return $this->successResponse('States retrieved successfully', StateResource::collection($states));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStateRequest $request)
    {
        try {
            $state = $this->stateService->createState($request->validated());
            return $this->successResponse('State created successfully', new StateResource($state), 201);
        } catch (\Exception $e) {
            return $this->errorResponse('Failed to create state', 500, $e->getMessage());
        }
    }

    // Other CRUD methods (show, update, destroy) will go here later
}