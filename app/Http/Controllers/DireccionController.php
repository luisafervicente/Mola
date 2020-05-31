<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\Direccion;
use App\Vendedor;
use App\User;
use App\User_direcccion;
use Illuminate\Http\Request;

class DireccionController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
         $direcciones=Direccion::with('users')->get();//de esta manera me devuelve las
         //direcciones co el usuario
          
        return view('direccion.index', compact('direcciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        $user=User::get();
        $direcciones= Direccion::get();
        return view('direccion.create', compact('direccion'));
    }

    /**
     * Almaceno la direccion creada y le asigno el usuario que la ha ceado.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $direccion = Direccion::create($request->all());
        $id = $request->user_id;

        $user = User::find($id);
        $direccion->users()->sync($user);
        if($user->rol=='vendedor'){
            return 'hola';
            return view('users.vendedor.create');
            
        }elseif($user->rol=='cliente'){
            return view('users.cliente.create');
        }else{
         
        return view('home');
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function show(Direccion $direccion) {
         return view('direccion.view',compact('direccion'));
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
        $direccion->update(request->all());
        $direccion->save();
        return redirect()->route('direccon.index')->with('session','Dirección actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Direccion  $direccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Direccion $direccion) {
          $direccion->delete();
         return redirect()->route('direccion.index')->with('session','Dirección eliminada satisfactoriamente') ;  
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
