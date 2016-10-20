<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FormvalidateController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('frm-submit')) {
            $this->validate($request, [
                'username' => 'required|min:5',
                'password' => 'required',
            ]);
        } else {
            
        }

        return view('form-validate');
    }
}
