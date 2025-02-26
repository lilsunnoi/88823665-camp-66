<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $req){
        $credentials = $req->only('email', 'password');

        if (Auth::attempt($credentials, $req->filled('remember'))) {
            $req->session()->regenerate();
            return redirect()->intended('/users');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput($req->only('email', 'remember'));
    }

    public function logout(Request $req){
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        return redirect('/login');
    }
}
