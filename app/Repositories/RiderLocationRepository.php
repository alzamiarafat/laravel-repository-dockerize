<?php

namespace App\Repositories;

use App\Models\RiderLocation;
use App\Interfaces\RiderLocationInterface;
class RiderLocationRepository implements RiderLocationInterface
{
    public function create(array $data)
    {
        return RiderLocation::create($data);
    }

    public function find($timeLimit,$latitude,$longitude)
    {
        return RiderLocation::where('capture_time', '>=', $timeLimit)
            ->selectRaw("*, ( 6371 * acos( cos( radians(?) ) *
                            cos( radians( latitude ) )
                            * cos( radians( longitude ) - radians(?)
                            ) + sin( radians(?) ) *
                            sin( radians( latitude ) ) )
                          ) AS distance", [$latitude, $longitude, $latitude])
            ->orderBy('distance')
            ->first();
    }
}
