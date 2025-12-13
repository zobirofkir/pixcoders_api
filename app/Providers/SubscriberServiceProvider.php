<?php

namespace App\Providers;

use App\Services\Services\SubscriberService;
use Illuminate\Support\ServiceProvider;

class SubscriberServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind('SubscriberService', function () {
            return new SubscriberService;
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
