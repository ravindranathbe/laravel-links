<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FileupController extends Controller
{
    public function index(Request $request)
    {
        // phpinfo(); exit();

        if($request->has('frm-submit')) {
            /*
            foreach(get_class_methods($request->file('file')) as $item) {
                if(strpos($item, 'get') !== false) {
                    echo $item.' = ';
                    // echo $request->file('file')->getClientOriginalName();
                    echo $request->file('file')->$item();
                    echo '<br />';
                }
            }
            */
            $request->file('file')->move('files', $request->file('file')->getClientOriginalName());
        } else {
            
        }
        return view('fileup');
    }
}
