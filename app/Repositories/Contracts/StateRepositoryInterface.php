<?php

namespace App\Repositories\Contracts; 

interface StateRepositoryInterface {
    public function getAllStates();
    public function getStateById(int $id);
    public function createState(array $data);
    public function updateState(int $id, array $data);
    public function deleteState(int $id);
}