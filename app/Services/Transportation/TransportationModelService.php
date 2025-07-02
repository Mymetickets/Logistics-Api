<?php

namespace App\Services\Transportation;

use App\Enums\StatusCodeEnums;
use App\Exceptions\FailedProcessException;
use App\Services\BaseService;
use App\Repositories\Transportations\TransportationModelRepository;

use App\Repositories\Transportations\TransportationCategoryRepository;

class TransportationModelService extends BaseService
{
    public $TransportationModel;
    public $TransportationMode;
    public function __construct(TransportationModelRepository $transportationModelRepository, TransportationCategoryRepository $transportationMode)
    {

        $this->TransportationModel = $transportationModelRepository;
        $this->TransportationMode = $transportationMode;
    }

    public function All()
    {
        $resp = $this->TransportationModel->all();
        return $resp;
    }

    public function create($reqData)
    {
        $categoryExist = $this->TransportationMode->findbyId($reqData['category_id']);
        if (blank($categoryExist)) {
            throw new FailedProcessException("category Id  not Found", StatusCodeEnums::FAILED);
        }
        $nameExist = $this->TransportationModel->findData("name", $reqData['name']);
        if (blank($nameExist)) {
            throw new FailedProcessException("Transportation Model Name Exist", StatusCodeEnums::FAILED);
        }
        $resp = $this->TransportationModel->create($reqData);
        if (blank($resp)) {
            throw new FailedProcessException("Transportation Model Creation Failed", StatusCodeEnums::FAILED);
        }
        return $resp;
    }

    public function findbyId($id)
    {
        $resp = $this->TransportationModel->findById($id);

        if (blank($resp)) {
            throw new FailedProcessException("Transportation model not found", StatusCodeEnums::FAILED);
        }
        return $resp;
    }

    public function update($reqData, $id)
    {
        $checkId = $this->findbyId($id);
        if (blank($checkId)) {
            throw new FailedProcessException("Transportation model not found", StatusCodeEnums::FAILED);
        }
        $resp = $this->TransportationModel->update($id, $reqData);
        if (blank($resp)) {
            throw new FailedProcessException("Transportation model Update Failed", StatusCodeEnums::FAILED);
        }
        return $resp;
    }

    public function delete($id)
    {
        $checkId = $this->findbyId($id);
        if (blank($checkId)) {
            throw new FailedProcessException("Transportation Model Not Found", StatusCodeEnums::FAILED);
        }
        $resp = $this->TransportationModel->delete($id);
        if (blank($resp)) {
            throw new FailedProcessException("Transportation Model Deletion Failed", StatusCodeEnums::FAILED);
        }
        return $resp;
    }
}
