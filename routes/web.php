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
// use App\Biodata;
// Auth::routes();
use App\Visit;
use App\Events\PageVisited;

Route::get('/', function() {
  return 'Laravel App';
});

Route::get('group', 'GroupController@index');
Route::match(['get', 'post'], 'group/add', 'GroupController@add');
// Route::resource('group', 'GroupController');

Route::get('vue-page', function() {
  return view('vue/page');
});

Route::get('faq', 'FaqController@index');

Route::get('visit', function(Request $request) {
  $data = ['message' => 'Hello'];
  // event(new PageVisited($data));

  // /////////////
  /*
  $options = array(
      'cluster' => 'eu',
      'encrypted' => false
  );
  $pusher = new Pusher(
      'e0c21b59af80214dbd51',
      'de1567f2935b83f07a44',
      '270845',
      $options
  );

  $data['message'] = 'hello world';
  $pusher->trigger('test_channel', 'my_event', $data);
  return 'Pushed data! - test 2';
  */
  // /////////////

  /*
  // New Pusher instance with our config data
  $pusher = new \Pusher(config('broadcasting.connections.pusher.key'), config('broadcasting.connections.pusher.secret'), config('broadcasting.connections.pusher.app_id'), config('broadcasting.connections.pusher.options'));

  // Your data that you would like to send to Pusher
  $data = ['text' => 'hello world from Laravel 5.3'];

  // Sending the data to channel: "test_channel" with "my_event" event
  $pusher->trigger( 'test_channel', 'my_event', $data);
  return 'Pushed data! - test';
  */

  $ip = $request->ip();
  $visitId = DB::table('visits')->insertGetId(
    ['ip' => $ip, 'created_at' => \Carbon\Carbon::now()->toDateTimeString(), 'updated_at' =>  \Carbon\Carbon::now()->toDateTimeString()]
  );
  $visit = Visit::findOrFail($visitId);
  event(new PageVisited($visit));

  // $data = ['message' => 'Hello'];
  // event(new PageVisited($data));

  echo 'Pushed data!';
  // return view('vue/visit');
});

Route::get('pusher', function() {
  return view('vue/pusher');
});

Route::match(['get', 'post'], 'timeline', 'TimelineController@index');

// == App: L-Jira related routes

/*
// Home
Route::get('/', function () {
    return view('home');
});

Route::group(['middleware' => 'web'], function () {
    Route::get('/vuecrud', 'BlogController@vueCrud');
    Route::resource('vueitems', 'BlogController');
});
*/

/*
Route::get('/vuecrud', 'BlogController@vueCrud');
Route::resource('vueitems', 'BlogController');
Route::post('/vueitems', 'BlogController@store');
*/

// == Dummy routes
/*
Route::get('/', function () {
    $links = \App\Link::all();
    return view('welcome', compact('links'));
});
// Route::get('/home', 'HomeController@index');
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
    // Routes related to notebooks
    Route::get('/notebooks', 'NotebooksController@index');
});

Route::get('/insert', function() {
    Biodata::create(['title' => 'Biodata test #1', 'description' => 'Biodata test #1 - Description']);
});
Route::get('{locale}/langpage', 'LangController@index');
Route::get('/session/get', 'SessController@getSess');
Route::get('/session/put', 'SessController@putSess');
Route::get('/session/forget', 'SessController@forgetSess');
Route::get('/form', function() {
    return view('form');
});
Route::match(['get', 'post'], '/fileup', 'FileupController@index');
Route::match(['get', 'post'], '/form-validate', 'FormvalidateController@index');
Route::match(['get', 'post'], '/mailsend', 'MailsendController@index');
*/
