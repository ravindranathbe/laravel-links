<?php
use Illuminate\Http\Request;

Route::get('demo/test', function () {
    return 'Test';
});

Route::get('demo/hello', function () {
    return Demo::hello();
});

Route::get('demo/c', 'Laravel\Demo\Http\DemoController@index');

Route::get('demo/view', function () {
    return view('laravel-demo::index');
});
