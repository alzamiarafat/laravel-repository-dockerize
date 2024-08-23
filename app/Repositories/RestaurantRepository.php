<?php

namespace App\Repositories;

use App\Models\Restaurant;
use App\Interfaces\RestaurantInterface;
class RestaurantRepository implements RestaurantInterface
{
    public function create(array $data)
    {
        return Restaurant::create($data);
    }
    public function find($id)
    {
        return Restaurant::findOrFail($id);
    }
}
