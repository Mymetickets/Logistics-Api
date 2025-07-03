<?php
namespace App\Services\Contracts;
interface StateServiceInterface {
    public function getAllStates();
    public function getStateById(int $id);
    public function createState(array $data);
    public function updateState(int $id, array $data);
    public function deleteState(int $id);
}