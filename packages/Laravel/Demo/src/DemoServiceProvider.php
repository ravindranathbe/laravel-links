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
        require __DIR__ . '/Http/routes.php';
        $this->loadViewsFrom(__DIR__ . '/views', 'laravel-demo');
    }
}
