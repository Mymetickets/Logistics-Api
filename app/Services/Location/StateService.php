<?php

namespace App\Services\Location;

use App\Exceptions\FailedProcessException;
use App\Enums\StatusCodeEnums;
use App\Repositories\Locations\StateRepository;
use App\Models\Locations\State;

class StateService
{
    protected $stateRepository;

    public function __construct(StateRepository $stateRepository)
    {
        $this->stateRepository = $stateRepository;
    }

    public function getAllStates()
    {
        $data = $this->stateRepository->all();
        if (!$data) {
            throw new FailedProcessException('No states found', StatusCodeEnums::FAILED->value); // Use ->value for enum cases
        }
        return $data;
    }

    public function createState(array $data)
    {
        $data['status'] = (strtolower($data['status']) === 'active');

        $record = $this->stateRepository->create($data);
        if (!$record) {
            throw new FailedProcessException('State creation failed', StatusCodeEnums::FAILED->value);
        }
        return $record;
    }

    public function getStateById($id)
    {
        $data = $this->stateRepository->findById($id);
        if (!$data) {
            throw new FailedProcessException('State not found', StatusCodeEnums::FAILED->value);
        }
        return $data;
    }

    public function updateState($id, array $data)
    {
        if (isset($data['status'])) {
            $data['status'] = (strtolower($data['status']) === 'active');
        }

        $state = $this->stateRepository->findById($id);
        if (!$state) {
            throw new FailedProcessException('State not found', StatusCodeEnums::FAILED->value);
        }

        $updated = $this->stateRepository->update($id, $data);
        if (!$updated) {
            throw new FailedProcessException('State update failed', StatusCodeEnums::FAILED->value);
        }
        return $this->stateRepository->findById($id);
    }

    public function deleteState($id)
    {
        $state = $this->stateRepository->findById($id);
        if (!$state) {
            throw new FailedProcessException('State not found', StatusCodeEnums::FAILED->value);
        }

        $deleted = $this->stateRepository->delete($id);
        if (!$deleted) {
            throw new FailedProcessException('State deletion failed', StatusCodeEnums::FAILED->value);
        }
        return $deleted;
    }

    public function searchStates($param)
    {
        $data = $this->stateRepository->search($param);
        if (!$data) {
            throw new FailedProcessException('No states found matching search criteria', StatusCodeEnums::FAILED->value);
        }
        return $data;
    }
}