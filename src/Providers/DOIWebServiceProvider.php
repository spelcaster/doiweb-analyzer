<?php

namespace DOIWeb\Providers;

use Illuminate\Support\ServiceProvider;

class DOIWebServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->loadMigrationsFrom(
            realpath(__DIR__ . '/../../database/migrations')
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
