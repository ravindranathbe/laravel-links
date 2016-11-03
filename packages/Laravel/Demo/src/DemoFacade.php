<?php
namespace Laravel\Demo;

use Illuminate\Support\Facades\Facade;

class DemoFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'laravel-demo';
    }
}
