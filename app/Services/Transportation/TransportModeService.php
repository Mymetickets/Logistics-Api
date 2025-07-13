<?php

namespace App\Services\Transportation;

use App\Services\BaseService; 
use App\Exceptions\FailedProcessException; 
use App\Enums\StatusCodeEnums;
use App\Repositories\Transportations\TransportModeRepository;

class TransportModeService extends BaseService
{
    protected $transportModeRepository;

    public function __construct(TransportModeRepository $transportModeRepository)
    {
        $this->transportModeRepository = $transportModeRepository;
    }

    public function getAllTransportModes()
    {
        return $this->transportModeRepository->all();
    }

    public function createTransportMode($reqData)
    {
        $nameExists = $this->transportModeRepository->findByName($reqData['name']);
        if (!blank($nameExists)) {
            throw new FailedProcessException('Transport Mode with this name already exists', StatusCodeEnums::FAILED);
        }

        return $this->transportModeRepository->create($reqData);
    }

    public function getTransportModeById($id)
    {
        $mode = $this->transportModeRepository->findById($id);
        if (blank($mode)) {
            throw new FailedProcessException("Transport Mode not Found", StatusCodeEnums::FAILED);
        }
        return $mode;
    }

    public function updateTransportMode($id, $reqData)
    {
        $mode = $this->transportModeRepository->findById($id);
        if (blank($mode)) {
            throw new FailedProcessException("Transport Mode not Found", StatusCodeEnums::FAILED);
        }

        if (isset($reqData['name'])) {
            $existingMode = $this->transportModeRepository->findByName($reqData['name']);
            if (!blank($existingMode) && $existingMode->id != $id) {
                throw new FailedProcessException('Another Transport Mode with this name already exists', StatusCodeEnums::FAILED);
            }
        }


        $updatedMode = $this->transportModeRepository->update($id, $reqData);

        if (blank($updatedMode)) {
            throw new FailedProcessException("Transport Mode Update Failed", StatusCodeEnums::FAILED);
        }
        return $updatedMode;
    }

    public function deleteTransportMode($id)
    {
        $deleted = $this->transportModeRepository->delete($id);
        if (!$deleted) {
            throw new FailedProcessException("Transport Mode Deletion Failed", StatusCodeEnums::FAILED);
        }
        return $deleted;
    }

}