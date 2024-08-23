<?php

namespace App\Services;

use App\Repositories\RiderLocationRepository;

class RiderLocationService
{
    public function __construct(protected RiderLocationRepository $riderLocationRepository) {}

    public function create(array $data)
    {
        return $this->riderLocationRepository->create($data);
    }
    public function find($timeLimit,$latitude,$longitude)
    {
        return $this->riderLocationRepository->find($timeLimit,$latitude,$longitude);
    }
}
