<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    private function myprivate(){
        return 1;
    }
    function myfunction(Request $reg , $var1=""){
        $data['myinput'] = $reg->input('myinput');
        $data['myvalue'] = $var1;
        return view('myview' , $data);
    }
}