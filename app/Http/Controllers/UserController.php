<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\UserSendNewPassword;
use App\Mail\UserSendWelcome;
use Hash, Auth, Config, Str, Mail;

class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        $users = User::All();
        return view('users.index', compact('users'));
    } 

    public function postUser(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:15|unique:users',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        //dd($request->all());

        $u = new User;
        $u->name = $request->name;
        $u->username = $request->username;
        $u->email = $request->email;
        $u->password = Hash::make($request->password);
        $u->status = $request->status;
        $u->admin = $request->admin;
        $u->save();
        $u->email_verified_at = now();
        return back()->with('message', 'Usuario creado satisfactoriamente')->with('icon', 'success');
    }

    public function postEditUser(Request $request, $id)
    {
        $u = User::findOrFail($id);
        $u->name = $request->name;
        $u->username = $request->username;
        $u->email = $request->email;
        $u->status = $request->status;
        $u->admin = $request->admin;
        $u->save();

        return back()->with('message', 'Usuario actualizado satisfactoriamente')->with('icon', 'success');
    }

    public function deleteUser($id)
    {
        $u = User::findOrFail($id);
        $u->status = ($u->status == 1) ? 0 : 1;
        $message = ($u->status == 1) ? 'Usuario habilitado satisfactoriamente' : 'Usuario inhabilitado satisfactoriamente';
        $u->save();
        return back()->with('message', $message)->with('icon', 'success');
    }
}
