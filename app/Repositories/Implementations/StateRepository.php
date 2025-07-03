<?php

namespace App\Repositories\Implementations;

use App\Models\Locations\State; // Import!ing model!
use App\Repositories\Contracts\StateRepositoryInterface; // Importing interface!

class StateRepository implements StateRepositoryInterface {
    public function getAllStates() { return State::all(); }
    public function getStateById(int $id) { return State::findOrFail($id); }
    public function createState(array $data) { return State::create($data); }
    public function updateState(int $id, array $data) {
        $state = $this->getStateById($id);
        $state->update($data);
        return $state;
    }
    public function deleteState(int $id) { return $this->getStateById($id)->delete(); }
}