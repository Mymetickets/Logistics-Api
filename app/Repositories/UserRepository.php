<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository implements IRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }
    public function all(){
        $data = User::query()->paginate(pageCount());
        return $data;
    }

    public function findById($id){
        $data = User::find($id);
        return $data;
    }

    public function create($data){
        $record = User::create($data);
        return $record;
    }
    public function update($id, $data){
        $rec = User::where("id", $id)->update($data);
        return $rec;
    }

    public function delete($id){
        $rec = User::where("id", $id)->delete();
        return $rec;
    }

    public function search($param){
        $rec = User::query()
            ->where("name", "LIKE", "%$param%")
            ->orWhere("email", "LIKE", "%$param%")
            ->orWhere("status", "=", $param)
            ->get();
        return $rec;
    }
}