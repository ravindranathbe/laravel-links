<?php

namespace Laravel\Demo\Http;

use Illuminate\Routing\Controller as BaseController;

class DemoController extends BaseController
{
    public function index()
    {
        echo config('democonfig.democonfig1');
        return \Demo::hello() . ' from controller.';
    }
}
