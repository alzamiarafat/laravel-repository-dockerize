<?php

namespace App\Services;

use App\Repositories\RestaurantRepository;

class RestaurantService
{
    public function __construct(protected RestaurantRepository $restaurantRepository) {}

    public function create(array $data)
    {
        return $this->restaurantRepository->create($data);
    }
    public function find($id)
    {
        return $this->restaurantRepository->find($id);
    }
}
