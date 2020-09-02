<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Feeds;

class FeedsServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Feeds::class, function ($app) {
            return new Feeds();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [Feeds::class];
    }

    public function boot()
    {
        //
    }
}
