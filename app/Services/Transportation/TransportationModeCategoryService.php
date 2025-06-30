<?php

namespace App\Services\Transportation;

use App\Services\BaseService;
use App\Repositories\Transportations\TransportationCategoryRepository;

class TransportationModeCategoryService extends BaseService
{
    public $TransportationCategory;
    public function __construct(TransportationCategoryRepository $TransportationCategory)
    {
        $this->TransportationCategory =  $TransportationCategory;
    }

    public function All()
    {
        $resp = $this->TransportationCategory->all();
        return $resp;
    }

    public function create($reqData)
    {
        $slugExist = $this->TransportationCategory->findData("slug", $reqData['slug']);
        if (blank($slugExist)) {
            abort(401, 'Slug already exist');
        }
        $nameExist = $this->TransportationCategory->findData("name", $reqData['name']);
        if (blank($nameExist)) {
            abort(401, 'Name already exist');
        }
        $resp = $this->TransportationCategory->create($reqData);
        return $resp;
    }

    public function findbyId($id)
    {
        $resp = $this->TransportationCategory->findById($id);
         if (blank($resp)) {
            abort(401, "Transportation Mode not Found");
        }
        return $resp;
    }

    public function update($reqData, $id)
    {
        $mode = $this->TransportationCategory->findById($id);
        if (blank($mode)) {
            abort(401, "Transportation Mode not Found");
        }
        $resp = $this->TransportationCategory->update($reqData, $id);
        if (blank($resp)) {
            abort(401, "error occurred");
        }
        return $resp;
    }

    public function delete($id)
    {
        $resp = $this->TransportationCategory->delete($id);
        if (blank($resp)) {
            abort(401, "Error occurred");
        }
        return $resp;
    }
}
