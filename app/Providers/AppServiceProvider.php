<?php

namespace App\Providers;

use App\Interfaces\RestaurantInterface;
use App\Repositories\RestaurantRepository;
use App\Services\RestaurantService;
use Illuminate\Support\ServiceProvider;
use App\Repositories\RiderLocationRepository;
use App\Interfaces\RiderLocationInterface;
use App\Services\RiderLocationService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(RiderLocationInterface::class, RiderLocationRepository::class);
        $this->app->bind(RiderLocationService::class, function ($app) {
            return new RiderLocationService($app->make(RiderLocationInterface::class));
        });

        $this->app->bind(RestaurantInterface::class, RestaurantRepository::class);
        $this->app->bind(RestaurantService::class, function ($app) {
            return new RestaurantService($app->make(RestaurantInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
