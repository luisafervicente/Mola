<?php

namespace App\Http\Controllers;
use App\Direccion;
use Illuminate\Http\Request;
use App\Vendedor;
use App\User;

class VendedorController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users=User::get();
        $vendedores=Vendedor::orderBy('id','Desc')->paginate(10);
       
        
        return view('users.vendedor.index', compact('vendedores','users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $vendedor = Vendedor::get();

        return view('users.vendedor.create', compact('vendedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
        $users=User::get();  
        $vendedor=Vendedor::create($request->all());
        foreach($users as $user){
            if($user->id==$vendedor->user_id){//buscamos el id del usuario
               
           if($request->get('direccion')){
            $user->direccion()->sync($request->get('direccion'));
            }}
        }
       
         return redirect()->route('direccion.create')->with('session','Vendedor guardado satisfactoriamente,ahora añada una dirección por favor') ;  
        }
        
        
        
        
        
        
     

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
       return "edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        return "update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
       $user->delete();
         return redirect()->route('vendedor.index')->with('session','Rol eliminado satisfactoriamente') ;  
    }

}
