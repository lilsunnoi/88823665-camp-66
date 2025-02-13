<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $req)
    {
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            $req->session()->flash('status', 'Login successful!');
            return redirect()->intended('/users');
        }

        $req->session()->flash('error', 'อีเมลหรือรหัสผ่านไม่ถูกต้อง');
        return back()->onlyInput('email');
    }

    public function logout(Request $req)
    {
        Auth::logout();
        $req->session()->invalidate();
        $req->session()->regenerateToken();
        $req->session()->flash('status', 'Logout successful!');
        return redirect('/login');
    }
}
