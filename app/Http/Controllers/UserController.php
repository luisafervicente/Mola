<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Cliente;
use App\Vendedor;
use App\Administrador;
use App\User_direccion;
use App\Direccion;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return 'destroy';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)//vamos a devolver un cliente o un vendendor dependiendo del rol que tenga el usuario elegido
    {
        $administradores=Administrador::get();
         
        $vendedores=Vendedor::get();
        $clientes=Cliente::get();
        $user_direcion=User_direccion::get();
        $lista_direcciones=[];
         
        foreach($user_direcion as $direccionrelacion){
            if($direccionrelacion->user_id==$user->id){
                $id=$direccionrelacion->direccion_id;
              $direccion=Direccion::find($id);
               $lista_direcciones[]=$direccion;
            }
            
        }
        
        
        
        foreach($vendedores as $vendedor){
          if($user->id==$vendedor->user_id){
               return view('users.view', compact('vendedor', 'user', 'lista_direcciones'));
          }
        }
         foreach($clientes as $cliente){
          if($user->id==$cliente->user_id){
               return view('users.view', compact('cliente', 'user', 'lista_direcciones'));
          }
        }
        foreach($administradores as $administrador){
         
          if($user->id==$administrador->users_id){
               
             
               return view('users.view', compact('administrador','user', 'lista_direcciones'));
          }  
        }
        
        
        
        
    
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
         
         
     $administradores=Administrador::get();
        $vendedores=Vendedor::get();
        $clientes=Cliente::get();
        
        
        foreach($vendedores as $vendedor){
          if($user->id==$vendedor->user_id){
               return view('users.edit', compact('vendedor', 'user'));
          }
        }
         foreach($clientes as $cliente){
          if($user->id==$cliente->user_id){
               return view('users.edit', compact('cliente', 'user'));
          }
        }
        foreach($administradores as $administrador){
          if($user->id==$administrador->user_id){
               return view('users.edit', compact('administrador', 'user'));
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
    public function update(Request $request, User $user)
    {
         $administradores=Administrador::get();
         $vendedores=Vendedor::get();
         $clientes=Cliente::get();
          return $administradores;
        $user->update($request->all());
        foreach ($clientes as $cliente){
            if($user->id==$cliente->user_id){
                $cliente->update($request->all());
                $cliente->save();
            }
        }
            foreach ($vendedores as $vendedor){
            if($user->id==$vendedor->user_id){
                $vendedor->update($request->all());
                $vendedor->save();
            }
            }
              foreach ($administradores as $administrador){
            if($user->id==$administrador->users_id){
               
                $administrador->update($request->all());
                $administrador->save();
            }
            }
            
            
            
            
          $user->save();
        
             
        //}
        return redirect()->route('users.index')
            ->with('session','usuario updated successfully'); 
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
     $user->delete();
         return redirect()->route('users.index')->with('session','Usuario eliminado satisfactoriamente') ;  
    }
    //con este mètod, hago que un usuario recien registrado acceda a la página de registro
    //de vendedor, para instertar una tienda o de cliente para comprar.
      public function seleccionar(Request $request, User $user){
           
        if($request->eleccion=='vendedor'){
             $user->rol="vendedor";
             $user->save();
        return redirect()->route('vendedor.create')->with('session','Vendedor creado correctamente'); 
        }
            else if($request->eleccion=='cliente'){
                $user->rol='cliente';
                $user->save();
             
               return redirect()->route('cliente.create')->with('session','Cliente creado correctamente'); 
            
        }else{
            return 'algo ha ido mal';
        }
    }
}
 
