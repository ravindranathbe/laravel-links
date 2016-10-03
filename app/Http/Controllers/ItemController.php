<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Rating;
use App\User;
use App\Item;

class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = \App\Item::all();
        return view('items/index', ['items' => $items, 'rating_status' => '']);
    }

    public function rate(Request $request, Item $item, $itemId = 0, $rateValue = 0) {
        /*
        if (Gate::allows('item-rate-do')) {
            // 
        }
        */
        $this->authorize('rate', $item);

        $user = \Auth::user();
        $rating = new Rating;

        if($rating->canRate($user->id, $itemId) === false) {
            $request->session()->flash('rating_status_fail', 'Rating already done!');
            return redirect('/items');
        }

        $rating->rating_value = $rateValue;
        $rating->item_id = $itemId;
        $rating->created_by = $user->id;
        $rating->modified_by = $user->id;
        $rating->save();

        $request->session()->flash('rating_status', 'Rating was successful!');
        return redirect('/items');
    }
}
