<?php

namespace App\Repositories\Transportations;
use App\Repositories\IRepository;
use App\Models\Transportations\TransportationModeCategory;

class  TransportationCategoryRepository implements IRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function all(){
        $data = TransportationModeCategory::query()->paginate();
        return $data;
    }

    public function findById($id){
        $data = TransportationModeCategory::find($id);
        return $data;
    }

    public function create($data){
        $record = TransportationModeCategory::create($data);
        return $record;
    }
    public function update($id, $data){
        $rec = TransportationModeCategory::where("id", $id)->update($data);
        return $rec;
    }

    public function delete($id){
        $rec = TransportationModeCategory::where("id", $id)->delete();
        return $rec;
    }

    public function search($param){
        $rec = TransportationModeCategory::query()
            ->where("name", "LIKE", "%$param%")
            ->orWhere("slug", "LIKE", "%$param%")
            ->orWhere("description", "=", $param)
             ->orWhere("status", "LIKE", "%$param%")
            ->get();
        return $rec;
    }
}
