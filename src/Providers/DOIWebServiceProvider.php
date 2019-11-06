<?php

namespace DOIWeb\Providers;

use Illuminate\Support\ServiceProvider;
use DOIWeb\Console\Commands\DOI6Parser;

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
        if ($this->app->runningInConsole()) {
            $this->commands([
                DOI6Parser::class,
            ]);
        }
    }
}
