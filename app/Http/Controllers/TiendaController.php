<?php

namespace App\Http\Controllers;
use App\Tienda;
use App\User;
use App\Tienda_User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Tienda_Direccion;
class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          
        $tiendas=Tienda::with('user','direccion')->get();  
        return view('tienda.index', compact('tiendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
   
        return view('tienda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tienda=$request->all();//todos los request de formulario
         
        $id = $request->user_id;//Con esto obtenemos el user_id para relacionar la tienda con su usuario
         
       if($archivo=$request->file('imagen')){//código para subir imagénes
           $nombre=$archivo->getClientOriginalName();
           $archivo->move('images',$nombre);
           $tienda['image']=$nombre;
       }   
       
         $tiendaFinal=Tienda::create($tienda);
        //encuentro el usuario y adjudico la tienda
        $user = User::find($id);
        $tiendaFinal->user()->sync($user);
        //si hay una direccion la relaciono con la tienda
         
        
         
          return redirect()->route('direccion.create')->with('session', 'Debes añadir una dirección'); //me voy a crear una dirección
        
    }
   
     
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tienda $tienda)
    {
         return view('tienda.view',compact('tienda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tienda $tienda)
    {
          return view('tienda.view', compact('tienda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tienda $tienda)
    {
         $tienda->update($request->all());
        $tienda->save();
        return redirect()->route('tienda.index')->with('session','Tienda actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $tienda->delete();
         return redirect()->route('tienda.index')->with('session','Tienda eliminada satisfactoriamente') ; 
    }
    public function cargarTiendas(){
        $tiendas=Tienda::get();
        return view('navegar_tiendas',compact('tiendas'));
        
    }
}
