<?php

namespace App\Http\Controllers\Apis\v1\Transportation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Transportations\TransportationModeCategoryRequest;
use Illuminate\Http\Request;
use App\Services\Transportation\TransportationModeCategoryService;
use App\Class\ApiResponse;

class TransportationModeCategoryController extends Controller
{
    public $TransportationModeCategory;
    public $apiresp;
    public function __construct()
    {
        $this->TransportationModeCategory = new TransportationModeCategoryService();
        $this->apiresp = new  ApiResponse();
    }
    public function index(Request $request)
    {
        $data = $this->TransportationModeCategory->All();

        // Check if the result is empty
        if (empty($data) || $data->isEmpty()) {
            $message = "No Transportation Mode Categories found.";
            return $this->apiresp->failed($message);  // Don't forget to return!
        }

        $message = "All Transportation Mode Categories fetched successfully.";
        return $this->apiresp->success($message, $data);  // Also return this
    }

    public function create(TransportationModeCategoryRequest $request)
    {
        $data = $this->TransportationModeCategory->create($request->validated());
        if (!$data) {
            $message = "error occured";
            $this->apiresp->failed($message);
        }
        $message = "Transportation Mode created successfull";
        $this->apiresp->success($message);
    }   // POST /TransportationModeCategory
    public function show($id)
    {
        $data = $this->TransportationModeCategory->findbyId($id);
        if (!$data) {
            $message = "error occured";
            $this->apiresp->failed($message);
        }
        $message = "Transportation Mode Found Successfully";
        $this->apiresp->success($message, $data);
    }
    public function find(Request $request)
    {
        $data = $this->TransportationModeCategory->findbyId($request);
        if (!$data) {
            $message = "error occured";
            $this->apiresp->failed($message);
        }
        $message = "Transportation Mode Found Successfully";
        $this->apiresp->success($message, $data);
    }
    public function update(Request $request, $id)
    {
        $data = $this->TransportationModeCategory->update($request, $id);
        if (!$data) {
            $message = "error occured";
            $this->apiresp->failed($message);
        }
        $message = "Transportation Mode Updated sucessfully";
        $this->apiresp->success($message, $data);
    }
    public function destroy($id)
    {
        $data = $this->TransportationModeCategory->delete($id);
        if (!$data) {
            $message = "error occured";
            $this->apiresp->failed($message);
        }
        $message = "Transportation Mode Deleted";
        $this->apiresp->success($message);
    }
}
