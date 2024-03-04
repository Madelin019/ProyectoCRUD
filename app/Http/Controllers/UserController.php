<?php
//Este controlador se encarga de manejar las solicitudes relacionadas con la gestión de usuarios en la aplicación.
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
        // Validación de los datos recibidos en la solicitud
        $request->validate([
            'username' => 'required|string|max:15|unique:users',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        //dd($request->all()); //Envia para la base de datos y valida
        // Creación de un nuevo usuario
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
        $// Encuentra el usuario por su ID
        $u = User::findOrFail($id);
        // Actualiza los datos del usuario
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
        // Encuentra el usuario por su ID y lo elimina
        $u = User::findOrFail($id);
        $u->delete();
        $message = 'Usuario eliminado satisfactoriamente';
        return back()->with('message', $message)->with('icon', 'success');
    }
}
