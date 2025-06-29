<?php

namespace App\Services\Transportation;
use App\Services\BaseService;
use App\Repositories\Transportations\TransportationCategoryRepository;

class TransportationModeCategoryService extends BaseService
{
    public $TransportationCategory;
    public function __construct()
    {
        parent::__construct();
        $this->TransportationCategory = new TransportationCategoryRepository();
    }

    public function All() 
    {
        $resp = $this->TransportationCategory->all();
        return $resp;
    }

    public function create($reqData)
    {
        $resp = $this->TransportationCategory->create($reqData);
        return $resp;
    }

    public function findbyId($id)
    {
        $resp = $this->TransportationCategory->findById($id);
        return $resp;
    }

    public function update($reqData, $id)
    {
        $resp = $this->TransportationCategory->update($reqData, $id);
        return $resp;
    }

    public function delete($id){
        $resp =$this->TransportationCategory->delete($id);
        return $resp;
    }
}
