<?php
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () { // ['web', 'auth']
    Route::group(['prefix' => 'demo'], function () {
        Route::get('test', function () {
            return 'Test';
        });
        Route::get('hello', function () {
            return Demo::hello();
        });
        Route::get('view', function () {
            return view('laravel-demo::index');
        });
        Route::get('c', 'Laravel\Demo\Http\DemoController@index');
    });
});
