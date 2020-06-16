<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cliente;
use App\Vendedor;
use App\Administrador;
use App\User_direccion;
use App\Direccion;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::get();
        return view('users.index', compact('users'));
    }

    public function create() {

        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Responsef
     */
    public function store(Request $request) {
        $request->validate(['name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'telefono' => ['required', 'string', 'min:6'],
            'DNI' => ['required', 'string', 'min:9','unique:users'],
            'apellidos' => ['required', 'string', 'max:255']]
        );

        $user = User::create([
                    'name' => $request['name'],
                    'email' => $request['email'],
                    'password' => Hash::make($request['password']),
                    'apellidos' => $request['apellidos'],
                    'DNI' => $request['DNI'],
                    'telefono' => $request['telefono'],
                    'rol' => $request['rol']
        ]);


        if ($user->rol == 'administrador') {
            $userss = serialize($user);
            file_put_contents('store', $userss);
            return redirect()->route('administrador.create', 'userss')->with('session', 'Administrador guardado satisfactoriamente');
        } elseif ($user->rol == 'vendedor') {
            $userss = serialize($user);
            file_put_contents('store', $userss);
            return redirect()->route('VendedorController.createAdministrador', 'userss')->with('session', 'Continuamos');
        } elseif ($user->rol == 'cliente') {

            $userss = serialize($user);
            file_put_contents('store', $userss);
            return redirect()->route('crearCliente', 'userss')->with('session', 'Continuamos');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user) {//vamos a devolver un cliente o un vendendor dependiendo del rol que tenga el usuario elegido
        $administradores = Administrador::get();

        $vendedores = Vendedor::get();
        $clientes = Cliente::get();
        $user_direcion = User_direccion::get();
        $lista_direcciones = [];

        foreach ($user_direcion as $direccionrelacion) {
            if ($direccionrelacion->user_id == $user->id) {
                $id = $direccionrelacion->direccion_id;
                $direccion = Direccion::find($id);
                $lista_direcciones[] = $direccion;
            }
        }



        foreach ($vendedores as $vendedor) {
            if ($user->id == $vendedor->user_id) {
                return view('users.view', compact('vendedor', 'user', 'lista_direcciones'));
            }
        }
        foreach ($clientes as $cliente) {
            if ($user->id == $cliente->user_id) {
                return view('users.view', compact('cliente', 'user', 'lista_direcciones'));
            }
        }
        foreach ($administradores as $administrador) {

            if ($user->id == $administrador->users_id) {


                return view('users.view', compact('administrador', 'user', 'lista_direcciones'));
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user) {


        $administradores = Administrador::get();
        $vendedores = Vendedor::get();
        $clientes = Cliente::get();
        $user_direcion = User_direccion::get();
        $lista_direcciones = [];

        foreach ($user_direcion as $direccionrelacion) {
            if ($direccionrelacion->user_id == $user->id) {
                $id = $direccionrelacion->direccion_id;
                $direccion = Direccion::find($id);
                $lista_direcciones[] = $direccion;
            }
        }



        foreach ($vendedores as $vendedor) {
            if ($user->id == $vendedor->user_id) {
                return view('users.editar', compact('vendedor', 'user', 'lista_direcciones'));
            }
        }
        foreach ($clientes as $cliente) {
            if ($user->id == $cliente->user_id) {
                return view('users.editar', compact('cliente', 'user', 'lista_direcciones'));
            }
        }
        foreach ($administradores as $administrador) {

            if ($user->id == $administrador->users_id) {


                return view('users.editar', compact('administrador', 'user', 'lista_direcciones'));
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user) {

        $request->validate(['name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'telefono' => ['required', 'string', 'min:6'],
            'DNI' => ['required', 'string', 'min:9'],
            'apellidos' => ['required', 'string', 'max:255']]
        );
        $administradores = Administrador::get();
        $vendedores = Vendedor::get();
        $clientes = Cliente::get();

        $user->update($request->all());
        foreach ($clientes as $cliente) {
            if ($user->id == $cliente->user_id) {
                $user->save();
                $cliente->update($request->all());
                $cliente->save();
                return redirect()->route('cliente.index')->with('session', 'cliente actualizado correctamente');
            }
        }
        foreach ($vendedores as $vendedor) {
            if ($user->id == $vendedor->user_id) {

                $request->validate(['tipo_iva' => ['required', 'integer', 'max:1'],
                    'n_cuenta_bancaria' => ['required', 'string', 'max:20', 'min:20'],
                    'denominacion_fiscal' => ['required', 'string', 'max:100'],
                    'fecha_facturacion' => ['required', 'string', 'min:6'],
                ]);
                $user->save();
                $vendedor->update($request->all());
                $vendedor->save();
                return redirect()->route('vendedor.index')->with('session', 'Vendedor actualizado correctamente');
            }
        }
        foreach ($administradores as $administrador) {
            if ($user->id == $administrador->users_id) {
                $user->save();
                $administrador->update($request->all());

                $administrador->save();
                return redirect()->route('administrador.index')->with('session', 'Administrador actualizado correctamente');
            }
        }


        //}
        return redirect()->route('users.index')
                        ->with('session', 'usuario updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        $rol = $user->rol;

        switch ($user = 'rol') {

            case 'administrador':
                $users_id = $user->id;
                $administrador = Admininstrador::find($users_id);
                return $administrador;
                $administrador->delete();
                $user->delete();

                return redirect()->route('administrador.index')->with('session', 'Administrador eliminado satisfactoriamente');
                break;

            case 'vendedor':

                $user->delete();

                return redirect()->route('vendedor.index')->with('session', 'Administrador eliminado satisfactoriamente');
                break;

            case 'administrador': {

                    $user->delete();
                    return redirect()->route('administrador.index')->with('session', 'Administrador eliminado satisfactoriamente');
                    break;
                }
        }
    }

    public function ratificarEliminacion($id) {
        $user = User::find($id);
        switch ($user->rol) {
            case 'administrador':
                return view('users.administrador.destroy', compact('user'));
                break;
            case 'vendedor':
                return view('users.vendedor.destroy', compact('user'));
                break;
            case 'cliente':
                return view('users.cliente.destroy', compact('user'));
                defautl:
                break;
        }
        //envio el destroy a una pagina de confirmación donde acabara de eleminiar segun el rol

        return view('users.destroy', compact('user'));
    }

    public function eliminarUsuario(Request $request) {
        $rol = $request->rol;

        $id = $request->users_id;
        $user = User::find($id);
        switch ($rol) {

            case 'administrador':
                $administradores = Administrador::get();
                foreach ($administradores as $administrador) {
                    if ($administrador->users_id == $id) {

                        $administrador->delete();
                        $user->delete();
                        return redirect()->route('administrador.index')->with('session', 'Administrador eliminado satisfactoriamente');
                        break;
                    }
                }

            case 'vendedor':
                $vendedores = Vendedor::get();
                foreach ($vendedores as $vendedor) {
                    if ($vendedor->users_id == $id) {

                        $vendedor->delete();
                        $user->delete();
                        return redirect()->route('vendedor.index')->with('session', 'Vendedor eliminado satisfactoriamente');
                        break;
                    }
                }

            case 'cliente': {

                    $clientes = Cliente::get();
                    foreach ($clientes as $cliente) {
                        if ($cliente->users_id == $id) {

                            $cliente->delete();
                            $user->delete();
                            return redirect()->route('cliente.index')->with('session', 'Cliente eliminado satisfactoriamente');
                            break;
                        }
                    }
                }
        }
    }

    //con este mètod, hago que un usuario recien registrado acceda a la página de registro
    //de vendedor, para instertar una tienda o de cliente para comprar.
    public function seleccionar(Request $request, $id) {

        $user = User::find($id);

        if ($request->eleccion == 'vendedor') {

            $user->rol = "vendedor";
            $user->save();
            return redirect()->route('vendedor.create')->with('session');
        } else if ($request->eleccion == 'cliente') {
            $user->rol = 'cliente';
            $user->save();

            return redirect()->route('cliente.create')->with('session', 'Cliente creado correctamente');
        } else {
            return 'algo ha ido mal';
        }
    }

}
