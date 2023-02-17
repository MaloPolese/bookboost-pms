<?php

namespace App\Providers;

use App\Services\Mews\MewsService;
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
        $this->app->singleton(
            abstract: MewsService::class,
            concrete: fn () => new MewsService(
                baseUrl: strval(config('services.mews.url')),
                apiClientToken: strval(config('services.mews.clientToken')),
                apiAccessToken: strval(config('services.mews.accessToken')),
                apiClient: strval(config('services.mews.client')),
            ),
        );
    }
}
