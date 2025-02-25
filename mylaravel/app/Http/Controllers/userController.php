<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

class UserController extends Controller
{
    public function index(){
        // $users = User::all();
        $users = User::orderBy('name', 'asc')->paginate(5); // dese(ม-น), asc(น-ม)
        $data['user'] = $users;
        return view('User.index', ['users' => $users]);
    }

    public function edit_action(Request $req){
        // print_r($req->input());
        $muser = User::find($req->id);
        $muser->name = $req->name;
        $muser->email = $req->email;
        // $muser->password = $req->password;
        $muser->save();
        return redirect('/users');
    }

    public function edit($id){
        $user = User::find($id);
        $data['user'] = $user;
        return view('User.edit', $data);
    }

    public function destroy(Request $req){
        $muser = User::find($req->id);
        $muser->delete();
        return redirect('/users');
    }
}
