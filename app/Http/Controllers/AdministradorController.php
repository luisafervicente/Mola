<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Administrador;

class AdministradorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::get();
        $administradores=Administrador::orderBy('id','Desc')->paginate(10);
         
        
        return view('users.administrador.index', compact('administradores','users'));
    }
 
     

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit( )
    {
         return 'pagina editar';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Administrador $administrador)
    {
          $users=User::get();
       $usuario=new User;
        foreach($users as $user){
            if ($user->id==$administrador->users_id){ $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore($user)],
             
            'apellidos' => ['required', 'string', 'max:255'],
            'DNI' => ['required', 'string', 'max:9',Rule::unique('users')->ignore($user)],
            'telefono' => ['required', 'string', 'max:11'],
            
        ]);
         
                $user->update($request->all());
                $user->save();
                
            }
        }

        

         
      
     
        return redirect()->route('administrador.index')->with('sesion', 'Admninistrador actualizado correctamente');
            
                 
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
}
