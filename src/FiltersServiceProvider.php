<?php

namespace Smartisan\Filters;

use Illuminate\Support\ServiceProvider;
use Smartisan\Filters\Console\MakeFilterCommand;

class FiltersServiceProvider extends ServiceProvider
{
    /**
     * Register package services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            MakeFilterCommand::class,
        ]);
    }

    /**
     * Boot registered package services.
     *
     * @return void
     */
    public function boot()
    {
        $path = realpath(__DIR__ . '/../config/filters.php');

        $this->mergeConfigFrom($path, 'filters');

        $this->publishes([$path => config_path('filters.php')], 'config');
    }
}
