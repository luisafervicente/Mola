<?php

namespace App\Http\Controllers;

use App\Tienda;
use App\Cliente;
use App\Direccion;
use App\Vendedor;
use App\User;
use App\User_direcccion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DireccionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $direcciones = Direccion::with('users')->get(); //de esta manera me devuelve las
        //direcciones co el usuario

        return view('direccion.index', compact('direcciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {


        $direcciones = Direccion::with('users', 'tiendas')->get();
        return view('direccion.create', compact('direcciones'));
    }

    /**
     * Almaceno la direccion creada y le asigno el usuario que la ha ceado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
           $request->validate(['calle' => ['required', 'string', 'max:250'],
            'poblacion' => ['required', 'string','max:250' ],
            'provincia' => ['required', 'string', 'max:100'],
            'pais'=>['required', 'string', 'max:50' ],
               'codigo_postal'=>['required', 'string', 'max:5' ],
            ]);
   
        
        $direccion = Direccion::create($request->all()); //creo una direccion co todos los datos
        
        if (isset($request->tienda_id)) {
            $idTienda = $request->tienda_id;
            $tienda = Tienda::find($idTienda);
            $direccion->tienda()->sync($tienda);
            return redirect()->route('tienda.index')->with('session', 'Dirección dada de alta correctamente,ya puedes empezar a gestionar tu tienda');
        }
         if (isset($request->user_id)) {
            $id = $request->user_id;
            $user = User::find($id);
            $direccion->users()->sync($user);
            if ($user->rol == 'vendedor') {
                return redirect()->route('vendedor.index')->with('session', 'Se ha dado de alta correctamente');
            } elseif ($user->rol == 'cliente') {
                return redirect()->route('cliente.index')->with('session','Se ha dado de alta correctamente');
         }elseif($user->rol=='administrador'){
             return redirect()->route('administrador.index')->with('session','Se ha dado de alta correctamente');
             
         }else{
             return redirect()->route('login')->with('session','Dirección dada de alta correctamente');
         }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function show(Direccion $direccion) {
        return view('direccion.view', compact('direccion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Direccion $direccion) {
        return view('direccion.view', compact('direccion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Direccion $direccion) {
         $request->validate(['calle' => ['required', 'string', 'max:250'],
            'poblacion' => ['required', 'string','max:250' ],
            'provincia' => ['required', 'string', 'max:100'],
            'pais'=>['required', 'string', 'max:50' ],
               'codigo_postal'=>['required', 'string', 'max:5' ],
            ]);
        $direccion->update($request->all());
        $direccion->save();
        return redirect()->route('direccon.index')->with('session', 'Dirección actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direccion $direccion) {
        $direccion->delete();
        return redirect()->route('direccion.index')->with('session', 'Dirección eliminada satisfactoriamente');
    }

    /**
     * Se determina de quien es la dirección, si de un vendedor o de un
     * cliente, y asi se le dirige para que siga añadiendo datos
     *
     * @param   
     * @param  int id
     * @return \Illuminate\Http\Response
     * la ruta que debe seguir el métdod
     */
    public function adjudicarDireccion($id) {
        return $id;
        $vendedores = Vendedor::get();
        $clientes = Cliente::get();

        foreach ($vendedores as $vendedor) {
            if ($id == $vendedor->user_id) {
                return redirect()->route('vendedor.create')->with('session');
            }
        }

        foreach ($clientes as $cliente) {
            if ($id == $cliente->user_id) {
                return redirect()->route('cliente.create')->with('session');
            }
        }
    }

}
