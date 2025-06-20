<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TracksRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(TracksRepository::class, function ($app) {
            return new TracksRepository();
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
