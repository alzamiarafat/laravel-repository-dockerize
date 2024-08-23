<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RiderLocationController;
use App\Http\Controllers\RestaurantController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('/restaurants', [RestaurantController::class, 'store']);
Route::post('/rider-locations', [RiderLocationController::class, 'store']);
Route::get('/nearest-rider', [RestaurantController::class, 'findNearestRider']);


Route::get('/test', function () {
    return "dfd344654";
});
