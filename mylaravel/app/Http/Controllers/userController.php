<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user', compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('User.edit', compact('user'));
    }

    public function edit_action(Request $request)
    {
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        return redirect()->route('users.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return response()->json(['success' => 'User deleted successfully.']);
        }
        return response()->json(['error' => 'User not found.'], 404);
    }
}
