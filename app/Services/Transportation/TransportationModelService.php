<?php

namespace App\Services\Transportation;


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
            abort(401, "category Id  not Found");
        }
        $nameExist = $this->TransportationModel->findData("name", $reqData['name']);
        if ($nameExist) {
            abort(401, "Transportation Model Name Exist");
        }
        $resp = $this->TransportationModel->create($reqData);
        return $resp;
    }

    public function findbyId($id)
    {
        $resp = $this->TransportationModel->findById($id);

        if (blank($resp)) {
            abort(401, "Transportation model not found");
        }
        return $resp;
    }

    public function update($reqData, $id)
    {
        $checkId = $this->findbyId($id);
        if (blank($checkId)) {
            abort(401, "Transportation model not found");
        }
        $resp = $this->TransportationModel->update($reqData, $id);
        return $resp;
    }

    public function delete($id)
    {
        $checkId = $this->findbyId($id);
        if (blank($checkId)) {
            abort(401, "Transportation model not found");
        }
        $resp = $this->TransportationModel->delete($id);
        return $resp;
    }
}
