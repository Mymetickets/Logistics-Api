<?php

namespace App\Repositories\Transportations;
use App\Repositories\IRepository;
use App\Models\Transportations\TransportationModel;

class  TransportationModelRepository implements IRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function all(){
        $data = TransportationModel::query()->paginate();
        return $data;
    }

    public function findById($id){
        $data = TransportationModel::find($id);
        return $data;
    }

    public function create($data){
        $record = TransportationModel::create($data);
        return $record;
    }
    public function update($id, $data){
        $rec = TransportationModel::where("id", $id)->update($data);
        return $rec;
    }

    public function delete($id){
        $rec = TransportationModel::where("id", $id)->delete();
        return $rec;
    }

    public function search($param){
        $rec = TransportationModel::query()
            ->where("name", "LIKE", "%$param%")
            ->orWhere("slug", "LIKE", "%$param%")
            ->orWhere("description", "=", $param)
             ->orWhere("status", "LIKE", "%$param%")
            ->get();
        return $rec;
    }
}
