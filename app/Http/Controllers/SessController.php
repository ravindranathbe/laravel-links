<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class SessController extends Controller
{
    public function getSess(Request $request)
    {
        if($request->session()->has('sess1')) {
            echo $request->session()->get('sess1');
        } else {
            echo 'No data in session';
        }
    }

    public function putSess(Request $request)
    {
        $request->session()->put('sess1', 'DEBUG');
        echo 'Session data added';
    }

    public function forgetSess(Request $request)
    {
        $request->session()->forget('sess1');
        echo 'Session data removed';
    }
}
