<?php

namespace App\Http\Controllers\Apis\v1\Locations;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Locations\StateService;
use App\Class\ApiResponse;
use App\Exceptions\FailedProcessException;
use App\Http\Resources\Locations\StateResource;

class StateController extends Controller
{
    protected $stateService;

    public function __construct(StateService $stateService)
    {
        $this->stateService = $stateService;
    }

    public function getAllStates()
    {
        $data= $this->stateService->getAllStates();
        return ApiResponse::success('States retrieved successfully', StateResource::collection($data));

    }

    public function getStateById($id)
    {
        $data=$this->stateService->getStateById($id);
        return ApiResponse::success('State retrieved successfully', new StateResource($data));
    }

    public function deleteState($id){

        $this->stateService->deleteState($id);
        return ApiResponse::success('State deleted successfully');
    }

}
