<?php

namespace App\Http\Controllers;

use App\Direccion;
use Illuminate\Http\Request;
use App\Vendedor;
use App\User;
use Illuminate\Support\Facades\Validator;

class VendedorController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $users = User::get();
        $vendedores = Vendedor::orderBy('id', 'Desc')->paginate(10);

        return view('users.vendedor.index', compact('vendedores', 'users'));
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
    public function createAdministrador(User $user) {
        $user = file_get_contents('store');
        $vendedor = unserialize($user);

        return view('users.vendedor.create', compact('vendedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate(['tipo_iva' => ['required', 'integer', 'max:1'],
            'n_cuenta_bancaria' => ['required', 'string', 'max:20', 'min:20'],
            'denominacion_fiscal' => ['required', 'string', 'max:100'],
            'fecha_facturacion' => ['required', 'string', 'min:6'],
        ]);

        $users = User::get();

        $vendedor = Vendedor::create($request->all());
        foreach ($users as $user) {
            if ($user->id == $vendedor->user_id) {//buscamos el id del usuario
                if ($request->get('direccion')) {
                    $user->direccion()->sync($request->get('direccion'));
                }
            }
        }

        return redirect()->route('direccion.create')->with('session', 'Vendedor guardado satisfactoriamente,ahora añada una dirección por favor');
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
        $request->validate(['tipo_iva' => ['required', 'integer', 'max:1'],
            'n_cuenta_bancaria' => ['required', 'string', 'max:20', 'min:20'],
            'denominacion_fiscal' => ['required', 'string', 'max:100'],
            'fecha_facturacion' => ['required', 'string', 'min:6'],
        ]);
        $vendedor > update($request->all());
        $vendedor->save();
        return redirect()->route('vendedor.index')->with('session', 'Vendedor actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user) {
        $user->delete();
        return redirect()->route('vendedor.index')->with('session', 'Rol eliminado satisfactoriamente');
    }

}
