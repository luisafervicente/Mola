<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Administrador;

class AdministradorController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::get();
        $administradores = Administrador::orderBy('id', 'Desc')->paginate(10);


        return view('users.administrador.index', compact('administradores', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user) {
        $user = file_get_contents('store');
        $usuario = unserialize($user);

        return view('users.administrador.create', compact('usuario'));
    }

//creo un administrador con los datos del usuario, simplemente el añado el id
    public function store(Request $request) {

        $users = User::get();
        $administrador = Administrador::create($request->all());

        foreach ($users as $user) {
            if ($user->id == $administrador->users_id) {//buscamos el id del usuario
                if ($request->get('direccion')) {
                    $user->direccion()->sync($request->get('direccion'));
                }
            }
        }

        return redirect()->route('direccion.create')->with('session', 'Administrador guardado satisfactoriamente,ahora añada una dirección por favor');
    }

}
