<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timeline;

class TimelineController extends Controller
{
  public function index(Request $request)
  {
    if ($request->isMethod('post')) {
      $this->validate($request, [
          'author' => 'required',
          'comment' => 'required',
      ], [
        'author.required' => 'The author field is required',
      ]);

      Timeline::create($request->all());
    }

    $timelines = Timeline::latest()->get()->toArray();
    return view('timeline/index', ['timelines' => $timelines]);
  }
}
