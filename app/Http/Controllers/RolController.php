<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rol;

class RolController extends Controller
{
    public function getRoles(Request $request)
    {
            $roles = Rol::get();
            $data = [
                'roles' => $roles
            ];
            return view('registrados.roles.index', $data);
    }

    public function postRol(Request $request)
    {
        $r = new Rol; // Crea una nueva instancia del modelo Rol
        $r->user_id = Auth::user()->id;
        $r->name = $request->input('name');
        $r->permissions = json_encode($request->except(['_token', 'name']));
        $r->save();

        return back()->with('message', 'Rol creado satisfactoriamente')->with('icon', 'success');
    }

    public function postEditRol(Request $request, $id)
    {
        $r = Rol::findOrFail($id);
        $r->name = $request->input('name');
        $r->permissions = json_encode($request->except(['_token', 'name']));
        $r->save();

        return back()->with('message', 'Rol actualizado satisfactoriamente')->with('icon', 'success');
    }

    public function deleteRol($id)
    {
        $r = Rol::findOrFail($id);
        $r->status = 0;
        $r->update(); // Actualiza el registro en la base de datos

        return back()->with('message', 'Rol fue eliminado satisfactoriamente')->with('icon', 'success');
    }
}
