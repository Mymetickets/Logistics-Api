<?php

namespace App\Http\Controllers\Apis\v1\Transportation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Class\ApiResponse;
use App\Http\Requests\Transportations\TransportationModelRequest;
use App\Services\Transportation\TransportationModelService;
use App\Http\Resources\Transportations\TransportationModeResource;

class TransportationModelController extends Controller
{
    //    public $TransportationModeCategory;
    public function __construct(private TransportationModelService $transportationModelService) {}
    public function index(Request $request)
    {
        $data = $this->transportationModelService->All();

        return Apiresponse::success("All Transportation Model fetched successfully.", new TransportationModeResource($data));
    }

    public function create(TransportationModelRequest $request)
    {
        $data = $this->transportationModelService->create($request->validated());
        return ApiResponse::success("Transportation Model created successfull",new TransportationModeResource($data));
    }
    public function show($id)
    {
        $data = $this->transportationModelService->findbyId($id);

        $message = "Transportation Model Found Successfully";
        return ApiResponse::success($message,new TransportationModeResource($data));
    }
    public function find(Request $request)
    {
        $data = $this->transportationModelService->findbyId($request);

        $message = "Transportation Model Found Successfully";
        return Apiresponse::success($message,new TransportationModeResource($data));

    }
    public function update(Request $request, $id)
    {
        $data = $this->transportationModelService->update($request, $id);

        $message = "Transportation Model Updated sucessfully";
        return ApiResponse::success($message,new TransportationModeResource($data));

    }
    public function destroy($id)
    {
        $data = $this->transportationModelService->delete($id);

        $message = "Transportation Model Deleted";
        return ApiResponse::success($message,new TransportationModeResource($data));

    }
}
