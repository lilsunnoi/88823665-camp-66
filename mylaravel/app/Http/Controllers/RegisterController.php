<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class RegisterController extends Controller
{
    //
    function index(){
        return view('register');
    }

    function create(Request $req){
        // print_r($req->input());
        $obj_user = new User;
        $obj_user->name = $req->input('name');
        $obj_user->email = $req->email;
        $obj_user->password = $req->password;
        // $obj_user->save();

        User::create([
            'name' => $req->name,
            'email' => $req->email,
            'password' => $req->password
        ]);

        return redirect('/users');
    }
}
