<?php

namespace App\Http\Controllers;
use App\Tienda;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class TiendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tiendas=Tienda::get();//de esta manera me devuelve las
         //direcciones co el usuario
          

        return view('tienda.index', compact('tiendas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
         
        $tienda= Tienda::get();
    

        return view('tienda.create', compact('tienda'));
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
         
        $id = $request->user_id;//Con esto obtenemos el user_id para relacionar la tienda con su 
        $tienda['id_user']=$id;
       if($archivo=$request->file('imagen')){
           $nombre=$archivo->getClientOriginalName();
           $archivo->move('images',$nombre);
           $tienda['image']=$nombre;
       }   
       
         $tiendaFinal=Tienda::create($tienda);
        
        $user = User::find($id);
        $tiendaFinal->user()->sync($user);
        
         
          return redirect()->route('tienda.create')->with('session', 'Tienda dada de alta correctamente'); 
        
    }
   
     
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function cargarTiendas(){
        $tiendas=Tienda::get();
        return view('navegar_tiendas',compact('tiendas'));
        
    }
}
