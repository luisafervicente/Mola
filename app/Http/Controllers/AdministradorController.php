<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Administrador;

//*Los administradores son uno de los roles de la aplicación
//   * existe un superusuario, que no se podra eliminar, y que se creará en la instalación d
//  * de la aplicación 
class AdministradorController extends Controller {

    /**
     *
     *Se muestra el en el index la lista de administradores, con los usuarios cargados para tener todo
     * los datos
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::get();
        $administradores = Administrador::orderBy('id', 'Desc')->paginate(10);
        return view('users.administrador.index', compact('administradores', 'users'));
    }

    /**
     * 
     *Nos llega un usuario, ya creado y con vamos a la vista
     * donde está
     * @return \Illuminate\Http\Response
     */
    public function create(User $user) {
        $user = file_get_contents('store');
        $usuario = unserialize($user);
    //tenemos que desereializar el ussario que nos viene serializdo de la clase controllerUser
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
