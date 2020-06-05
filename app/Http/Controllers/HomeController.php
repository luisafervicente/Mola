<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\User;
 use App\Vendedor;
 use App\Cliente;
 use App\Administrador;
 use App\Tienda;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $tiendas=Tienda::get();
        
        return view('welcome',compact('tiendas'));
    }
}
