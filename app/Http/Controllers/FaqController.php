<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;

class FaqController extends Controller
{
  public function index()
  {
      $questions = [];
      $answers = [];
      $items = Faq::latest()->paginate(10);
      foreach ($items as $item) {
        array_push($questions, $item['question']);
        array_push($answers, $item['answer']);
      }

      $response = [
          'pagination' => [
              'total' => $items->total(),
              'per_page' => $items->perPage(),
              'current_page' => $items->currentPage(),
              'last_page' => $items->lastPage(),
              'from' => $items->firstItem(),
              'to' => $items->lastItem(),
          ],
          'data' => ['questions' => $questions, 'answers' => $answers],
      ];

      return response()->json($response);
  }
}
