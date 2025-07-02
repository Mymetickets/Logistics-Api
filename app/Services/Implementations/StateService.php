<?php
namespace App\Services\Implementations;

// Importing the StateServiceInterface & StateRepositoryInterface
use App\Services\Contracts\StateServiceInterface;
use App\Repositories\Contracts\StateRepositoryInterface;
use App\Models\Locations\State; 

class StateService implements StateServiceInterface {
    protected $stateRepository;
    public function __construct(StateRepositoryInterface $stateRepository) {
        $this->stateRepository = $stateRepository;
    }

    public function getAllStates() { return State::with('country')->get();} // this line eager load the 'country' relationship
    public function getStateById(int $id) { return $this->stateRepository->getStateById($id); }
    public function createState(array $data) { return State::create($data); }
    public function updateState(int $id, array $data) { return $this->stateRepository->updateState($id, $data); }
    public function deleteState(int $id) { return $this->stateRepository->deleteState($id); }
}