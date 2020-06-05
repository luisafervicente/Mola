<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Cliente;
use App\Vendedor;
use App\Administrador;
use App\Tienda;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendedorController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $tiendas=Tienda::get();
    return view('welcome',compact('tiendas'));
});
Route::post('/welcome', "HomeController@index") ;
     

Auth::routes();
 
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/users','UserController')->names('users');
Route::resource('/administrador', 'AdministradorController')->names('administrador');
Route::resource('/cliente', 'ClienteController')->names('cliente');
Route::resource('/vendedor', 'VendedorController')->names('vendedor');
Route::resource('/tienda', 'TiendaController')->names('tienda');
Route::resource('/producto', 'ProductoController')->names('producto');
Route::get('welcomeAdmin',function(){
return view('welcome_administrador');})->name('welcomeAdmin');
Route::post('/elegir/{id}','UserController@seleccionar')->name('elegir');//con esta ruta se elige si crear un vendedor o un cliente
Route::resource('/direccion','DireccionController')->names('direccion');
Route::get('/quienes_somos',function(){
return view('quienes_somos');})->name("quienes_somos");
Route::get('/condiciones_uso',function(){
return view('condiciones_uso');})->name('condiciones_uso');
Route::get('/aviso_privacidad',function(){
return view('aviso_privacidad');})->name('aviso_privacidad');
Route::get('/ayuda',function(){
return view('ayuda');})->name('ayuda');
Route::get('/navegar_tiendas', 'TiendaController@cargarTiendas')->name('navegar_tiendas');
 