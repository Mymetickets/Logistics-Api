<?php

namespace App\Repositories\Transportations;

use App\Repositories\IRepository;
use App\Models\Transportations\TransportMode;
use Illuminate\Database\Eloquent\Model;

class TransportModeRepository implements IRepository
{
    protected TransportMode $model;

    public function __construct(TransportMode $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($id, $data)
    {
        $model = $this->model->find($id);
        if ($model) {
            $model->update($data);
            return $model;
        }
        return null;
    }

    public function delete($id)
    {
        $model = $this->model->find($id);
        if ($model) {
            return $model->delete();
        }
        return false;
    }

    public function search($param)
    {
        return $this->model->where('name', 'like', '%' . $param . '%')->get();
    }

    public function findByName($name)
    {
        return $this->model->where('name', $name)->first();
    }
}