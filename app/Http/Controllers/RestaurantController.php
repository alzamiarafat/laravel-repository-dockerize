<?php

namespace App\Http\Controllers;

use App\Services\RestaurantService;
use App\Services\RiderLocationService;
use Illuminate\Http\Request;
use Carbon\Carbon;


class RestaurantController extends Controller
{
    public function __construct(protected RestaurantService $restaurantService, protected RiderLocationService $riderLocationService) {}

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'  => 'required|string',
            'restaurant_code' => 'required|string',
            'address'  => 'required|string',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'status' => 'required|string',
        ]);

        $restaurant = $this->restaurantService->create($data);

        return response()->json(['message' => 'Restaurant stored successfully', 'data' => $restaurant], 201);
    }

    public function findNearestRider(Request $request)
    {
        $request->validate([
            'restaurant_id' => 'required|integer|exists:restaurants,id',
        ]);

        $restaurant =  $this->restaurantService->find($request->restaurant_id);
        $latitude = $restaurant->latitude;
        $longitude = $restaurant->longitude;

        $timeLimit = Carbon::now()->subMinutes(5);

        $nearestRider = $this->riderLocationService->find($timeLimit, $latitude, $longitude);

        if ($nearestRider) {
            return response()->json([
                'message' => 'Nearest rider found successfully',
                'data' => $nearestRider,
                'distance' => $nearestRider->distance,
            ]);
        } else {
            return response()->json([
                'message' => 'No riders found nearby in the last 5 minutes',
            ], 404);
        }
    }
}
