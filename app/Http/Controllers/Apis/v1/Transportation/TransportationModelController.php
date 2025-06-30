<?php

namespace App\Http\Controllers\Apis\v1\Transportation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Class\ApiResponse;
use App\Http\Requests\Transportations\TransportationModelRequest;
use App\Services\Transportation\TransportationModelService;

class TransportationModelController extends Controller
{
    //    public $TransportationModeCategory;
    public $apiresp;
    public $TransportationModel;
    public function __construct()
    {
        $this->TransportationModel = new TransportationModelService();
        $this->apiresp = new  ApiResponse();
    }
    public function index(Request $request)
    {
        $data = $this->TransportationModel->All();

        // Check if the result is empty
        if (empty($data) || $data->isEmpty()) {
            $message = "No Transportation Model found.";
            return $this->apiresp->failed($message);  // Don't forget to return!
        }

        $message = "All Transportation Model fetched successfully.";
        return $this->apiresp->success($message, $data);  // Also return this
    }

    public function create(TransportationModelRequest $request)
    {
        $data = $this->TransportationModel->create($request->validated());
        if (!$data) {
            $message = "error occured";
            $this->apiresp->failed($message);
        }
        $message = "Transportation Model created successfull";
        $this->apiresp->success($message);
    }   // POST /TransportationModeCategory
    public function show($id)
    {
        $data = $this->TransportationModel->findbyId($id);
        if (!$data) {
            $message = "error occured";
            $this->apiresp->failed($message);
        }
        $message = "Transportation Model Found Successfully";
        $this->apiresp->success($message, $data);
    }
    public function find(Request $request)
    {
        $data = $this->TransportationModel->findbyId($request);
        if (!$data) {
            $message = "error occured";
            $this->apiresp->failed($message);
        }
        $message = "Transportation Model Found Successfully";
        $this->apiresp->success($message, $data);
    }
    public function update(Request $request, $id)
    {
        $data = $this->TransportationModel->update($request, $id);
        if (!$data) {
            $message = "error occured";
            $this->apiresp->failed($message);
        }
        $message = "Transportation Model Updated sucessfully";
        $this->apiresp->success($message, $data);
    }
    public function destroy($id)
    {
        $data = $this->TransportationModel->delete($id);
        if (!$data) {
            $message = "error occured";
            $this->apiresp->failed($message);
        }
        $message = "Transportation Model Deleted";
        $this->apiresp->success($message);
    }
}
