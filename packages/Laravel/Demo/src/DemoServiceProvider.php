<?php
namespace Laravel\Demo;

use Illuminate\Support\ServiceProvider;

class DemoServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('laravel-demo', function() {
            return new Demo;
        });
    }

    public function boot()
    {
        // Routes
        if (! $this->app->routesAreCached()) {
            require __DIR__ . '/Http/routes.php';
        }

        // Config
        $this->publishes([
            __DIR__.'/config/democonfig.php' => config_path('democonfig.php'),
        ]);
        $this->mergeConfigFrom(
            __DIR__.'/config/democonfig2.php', 'democonfig'
        );

        // Migrations
        $this->loadMigrationsFrom(__DIR__.'/migrations');

        // Views
        $this->loadViewsFrom(__DIR__ . '/views', 'laravel-demo');
    }
}
