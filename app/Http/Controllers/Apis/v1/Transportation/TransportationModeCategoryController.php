<?php

namespace App\Http\Controllers\Apis\v1\Transportation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transportations\TransportationModeCategoryRequest;
use Illuminate\Http\Request;
use App\Services\Transportation\TransportationModeCategoryService;
use App\Class\ApiResponse;
use App\Http\Resources\Transportations\TransportationCategoryResource;

class TransportationModeCategoryController extends Controller
{

    public function __construct(private TransportationModeCategoryService $TransportationModeCategory) {}
    public function index(Request $request)
    {
        $data = $this->TransportationModeCategory->All();
        return ApiResponse::success("All Transportation Mode Categories fetched successfully.", new TransportationCategoryResource($data));
    }

    public function create(TransportationModeCategoryRequest $request)
    {
        $validData=$request->validated();
        $data = $this->TransportationModeCategory->create($validData);
       return ApiResponse::success("Transportation Mode Created Successfully",new TransportationCategoryResource($data));
    }   // POST /TransportationModeCategory
    public function show($id)
    {
        $data = $this->TransportationModeCategory->findbyId($id);
        return ApiResponse::success("Transportation Mode Found Successfully", new TransportationCategoryResource($data));
    }

    public function update(Request $request, $id)
    {
        $data = $this->TransportationModeCategory->update($request, $id);
        return Apiresponse::success("Transportation Mode Updated sucessfully", new TransportationCategoryResource($data));
    }
    public function destroy($id)
    {
        $data = $this->TransportationModeCategory->delete($id);
        return Apiresponse::success("Transportation Mode Deleted");

    }
}
