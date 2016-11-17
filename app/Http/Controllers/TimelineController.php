<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Timeline;
use App\Events\CommentAdded;

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

      $timeline = Timeline::create($request->all());

      event(new CommentAdded($timeline));
    }

    $timelines = Timeline::latest()->get()->toArray();
    return view('timeline/index', ['timelines' => $timelines]);
  }
}
