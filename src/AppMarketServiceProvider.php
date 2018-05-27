<?php

namespace SurajAdsul\AppMarket;

use Illuminate\Support\ServiceProvider;

class AppMarketServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('AppMarket', function () {
            return new AppMarket();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['AppMarket'];
    }
}
