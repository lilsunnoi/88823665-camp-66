<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    function index(){
        $users = User::all();
        $data['users'] = $users;
        return view('user.index', ['users' => $users]);
    }

    function edit($id){
        $user = User::find($id);
        $data['user'] = $user;
        return view('user.edit', $data);
    }

    function edit_action(Request $req){
        $muser = User::find($req->id);

        if (!$muser) {
            return redirect('/users')->with('error', 'User not found!');
        }
        $muser->name = $req->name;
        $muser->email = $req->email;
        // เช็กว่าผู้ใช้กรอกรหัสผ่านใหม่หรือไม่
        if ($req->filled('password')) {
            $muser->password = bcrypt($req->password);
        }
        $muser->save();
        return redirect('/users')->with('success', 'User updated successfully!');
    }


    function delete(Request $req){
        $user = User::find($req->id);
        if ($user) {
            $user->delete();
        }
        return redirect('/users');
    }
}
