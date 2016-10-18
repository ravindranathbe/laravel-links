<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Http\Request;
use App\Biodata;

Route::get('/', function () {
    $links = \App\Link::all();
    return view('welcome', compact('links'));
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/submit', function() {
        return view('submit');
    });

    Route::post('/submit', function(Request $request) {
        $user = Auth::user();
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'url' => 'required|max:255',
            'description' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()
                ->withInput()
                ->withErrors($validator);
        }

        $link = new \App\Link;
        $link->title = $request->title;
        $link->url = $request->url;
        $link->description = $request->description;
        $link->created_by = $user->id;
        $link->modified_by = $user->id;
        $link->save();

        return redirect('/');
    });

    Route::get('/items', 'ItemController@index');
    Route::get('/items/rate/{itemId}/{rateValue}', 'ItemController@rate');
});

Route::get('/insert', function() {
    Biodata::create(['title' => 'Biodata test #1', 'description' => 'Biodata test #1 - Description']);
});

Route::get('{locale}/langpage', 'LangController@index');

Route::get('/session/get', 'SessController@getSess');
Route::get('/session/put', 'SessController@putSess');
Route::get('/session/forget', 'SessController@forgetSess');
