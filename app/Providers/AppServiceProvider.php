<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Portfolio;
use App\Observers\BlogObserver;
use App\Observers\PortfolioObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blog::observe(BlogObserver::class);
        Portfolio::observe(PortfolioObserver::class);
    }
}
