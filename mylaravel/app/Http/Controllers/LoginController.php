<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $req){
        // print_r($req->input());
        $user = User::where('email', $req->email)->first();
        print_r($user);
        if($user != null && Hash::check($req->password, $user->password)){
            $req->session()->put('user', $user);
            return redirect('/users');
        }else {
            $req->session()->flash('error', 'กรุณาตรวจสอบข้อมูลอีกครั้ง!');
            return redirect('/login');
        }
    }

    public function logout(Request $req){
        // $req->session()->forget('user');
        $req->session()->flush();
        return redirect('/login');
    }
}
