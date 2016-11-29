<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class TodoController extends Controller
{
  public function index(Request $request)
  {
    if ($request->isMethod('post')) {
      $this->validate($request, [
          'todo' => 'required',
      ]);

      $todo = Todo::create($request->all());
    }

    $completedTodos = Todo::where('status', 1)->count();
    $inCompletedTodos = Todo::where('status', 0)->count();

    $todos = [
      'data' => Todo::latest()->get()->toArray(),
      'completed' => $completedTodos,
      'inCompleted' => $inCompletedTodos,
    ];
    return response()->json($todos);
  }
}
