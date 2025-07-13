<?php

namespace App\Http\Controllers\Apis\v1\Transportation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Class\ApiResponse;
use App\Exceptions\FailedProcessException;

use App\Http\Resources\Transportations\TransportModeResource;
use App\Http\Requests\Transportations\TransportModeStoreRequest;
use App\Http\Requests\Transportations\UpdateTransportModeRequest;
use App\Models\Transportations\TransportMode;
use App\Services\Transportation\TransportModeService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;

class TransportModeController extends Controller
{
    protected $transportModeService;

    public function __construct(TransportModeService $transportModeService)
    {
        $this->transportModeService = $transportModeService;
    }

    public function getAllTransportModes()
    {
        $data = $this->transportModeService->getAllTransportModes();
        return ApiResponse::success('Transport Modes retrieved successfully', TransportModeResource::collection($data));
    }

    public function getTransportModeById($id)
    {
        $data = $this->transportModeService->getTransportModeById($id);
        return ApiResponse::success('Transport Mode retrieved successfully', new TransportModeResource($data));
    }

    public function createTransportMode(TransportModeStoreRequest $request)
    {
        $data = $request->validated();
        $createdTransportMode = $this->transportModeService->createTransportMode($data);
        return ApiResponse::success('Transport Mode created successfully', new TransportModeResource($createdTransportMode));
    }

    public function updateTransportationMode(UpdateTransportModeRequest $request, $id)
    {
        $transportMode = $this->transportModeService->getTransportModeById($id);
        $admin = Auth::guard('admin')->user();

        if (!$admin || Gate::forUser($admin)->denies('update', $transportMode)) {
            return ApiResponse::error('Unauthorized. Only administrators can update transport modes.', 403);
        }

        $data = $request->validated();
        $updatedTransportMode = $this->transportModeService->updateTransportMode($id, $data);

        if (!$updatedTransportMode) {
            return ApiResponse::error('Transport Mode could not be updated after authorization.', 500);
        }

        return ApiResponse::success('Transport Mode updated successfully.', new TransportModeResource($updatedTransportMode));
    }

    public function deleteTransportMode($id)
    {
        $this->transportModeService->deleteTransportMode($id);
        return ApiResponse::success('Transport Mode deleted successfully');
    }

    public function searchTransportModes(Request $request)
    {
        $param = $request->input('search');
        $data = $this->transportModeService->searchTransportModes($param);
        return ApiResponse::success('Transport Modes retrieved successfully', TransportModeResource::collection($data));
    }
}