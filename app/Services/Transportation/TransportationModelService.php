<?php

namespace App\Services\Transportation;
use App\Services\BaseService;
use App\Repositories\Transportations\TransportationModelRepository;

class TransportationModelService extends BaseService
{
    public $TransportationModel;
    public function __construct()
    {
        parent::__construct();
        $this->TransportationModel = new TransportationModelRepository();
    }

    public function All()
    {
        $resp = $this->TransportationModel->all();
        return $resp;
    }

    public function create($reqData)
    {
        $resp = $this->TransportationModel->create($reqData);
        return $resp;
    }

    public function findbyId($id)
    {
        $resp = $this->TransportationModel->findById($id);
        return $resp;
    }

    public function update($reqData, $id)
    {
        $resp = $this->TransportationModel->update($reqData, $id);
        return $resp;
    }

    public function delete($id){
        $resp =$this->TransportationModel->delete($id);
        return $resp;
    }
}
