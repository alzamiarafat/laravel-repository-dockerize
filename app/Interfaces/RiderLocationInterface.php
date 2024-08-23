<?php

namespace App\Interfaces;

interface RiderLocationInterface
{
    public function create(array $data);
    public function find($timeLimit,$latitude,$longitude);
}
