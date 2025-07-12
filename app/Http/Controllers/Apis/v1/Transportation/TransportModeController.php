<?php

namespace App\Http\Controllers\Apis\v1\Transportation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Transportation\TransportationModeService;
use App\Class\ApiResponse;
use App\Http\Requests\Transportations\UpdateTransportModeRequest;
use App\Models\Admin;

class TransportModeController extends Controller
{
    protected $transportationModeService;

    public function __construct(TransportationModeService $transportationModeService)
    {
        $this->transportationModeService = $transportationModeService;
    }

    public function updateTransportationMode(UpdateTransportModeRequest $request, $id)
    {
        $admin = auth('admin')->user();

        if (!$admin || !$admin->is_admin) {
            return ApiResponse::error('Unauthorized. Only administrators with admin privileges can update transportation modes.', 403);
        }

        $data = $request->validated();
        $transportMode = $this->transportationModeService->updateTransportationMode($id, $data);

        if (!$transportMode) {
            return ApiResponse::error('Transportation mode not found or could not be updated.', 404);
        }

        return ApiResponse::success('Transportation mode updated successfully.', $transportMode);
    }
}