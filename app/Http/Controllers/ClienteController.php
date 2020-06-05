<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Cliente;
use App\User;

class ClienteController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user) {
        $users = User::get();
        $clientes = Cliente::orderBy('id', 'Desc')->paginate(10);
        if($user->rol=='administrador'){
        return view('users.cliente.index', compact('clientes', 'users'));}
        else{return redirect()->route('home')->with('session'); 
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $cliente = Cliente::get();

        return view('users.cliente.create', compact('cliente'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user) {

        $users = User::get();
        $cliente = Cliente::create($request->all());
        foreach ($users as $user) {
            if ($user->id == $cliente->user_id) {//buscamos el id del usuario
                if ($request->get('direccion')) {
                    $user->direccion()->sync($request->get('direccion'));
                }
            }
        }

        return redirect()->route('direccion.create')->with('session', 'Cliente guardado satisfactoriamente,ahora añada una dirección por favor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente) { {


            $users = User::get();

            return view('users.cliente.view', compact('cliente', 'users'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente) {
        $user = User::get();
        return view('users.cliente.edit', compact('cliente', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Cliente @cliente
     * @param  User @user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente) {
        $users = User::get();
        $usuario = new User;
        foreach ($users as $user) {
            if ($user->id == $cliente->user_id) {




                $request->validate([
                    'name' => ['required', 'string', 'max:255'],
                    'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user)],
                    'apellidos' => ['required', 'string', 'max:255'],
                    'DNI' => ['required', 'string', 'max:9', Rule::unique('users')->ignore($user)],
                    'telefono' => ['required', 'string', 'max:11'],
                ]);

                $user->update($request->all());
                $user->save();
            }
        }






        return redirect()->route('cliente.index')->with('sesion', 'Cliente actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return 'delete';
    }

}
