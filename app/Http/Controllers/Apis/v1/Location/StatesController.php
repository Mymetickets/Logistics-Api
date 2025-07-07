<?php

namespace App\Http\Controllers\Apis\v1\Location;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Locations\State\StoreStateRequest; 
use App\Http\Requests\Locations\State\UpdateStateRequest;
use App\Http\Resources\Locations\StateResource;
use App\Services\Location\StateService;
use App\Class\ApiResponse;
use App\Models\Locations\State;

class StatesController extends Controller
{
    public function __construct(private StateService $stateService) {}

    public function index()
    {
        $states = $this->stateService->getAllStates();
        return ApiResponse::success('States retrieved successfully', StateResource::collection($states));
    }

    public function store(StoreStateRequest $request)
    {
        $data = $request->validated();
        $state = $this->stateService->createState($data);
        return ApiResponse::success('State created successfully', new StateResource($state), [], 201);
    }

    public function show(State $state)
    {
        $state->load('country');
        return ApiResponse::success('State retrieved successfully', new StateResource($state));
    }

    public function update(UpdateStateRequest $request, State $state)
    {
        $data = $request->validated();
        $updatedState = $this->stateService->updateState($state->id, $data);
        return ApiResponse::success('State updated successfully', new StateResource($updatedState));
    }

    public function destroy(State $state)
    {
        $this->stateService->deleteState($state->id);
        return ApiResponse::success('State deleted successfully', null, [], 204);
    }

    public function search(Request $request)
    {
        $param = $request->query('query');
        if (empty($param)) {
            return ApiResponse::failed('Search parameter is required', [], [], 400);
        }
        $states = $this->stateService->searchStates($param);
        return ApiResponse::success('States found successfully', StateResource::collection($states));
    }
}