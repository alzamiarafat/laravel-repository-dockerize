<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RiderLocationService;


class RiderLocationController extends Controller
{
    public function __construct(protected RiderLocationService $riderLocationService) {}

    public function store(Request $request)
    {
        $data = $request->validate([
            'rider_id' => 'required|integer',
            'service_name' => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'capture_time' => 'required|date_format:Y-m-d H:i:s',
        ]);

        $location = $this->riderLocationService->create($data);

        return response()->json(['message' => 'Location stored successfully', 'data' => $location], 201);
    }
}
