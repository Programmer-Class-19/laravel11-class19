<?php

namespace App\Providers;

use App\Services\JsonService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(JsonService::class, function ($app) {
            return new JsonService(new \GuzzleHttp\Client);
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
