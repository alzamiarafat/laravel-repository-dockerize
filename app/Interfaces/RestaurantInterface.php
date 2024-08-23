<?php

namespace App\Interfaces;

interface RestaurantInterface
{
    public function create(array $data);
    public function find($id);
}
