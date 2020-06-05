<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Vendedor;
use App\Cliente;
use App\Direccion;
use App\Administrador;
use App\Tienda;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     *
     *
     * @var type 
     */
    
    protected $fillable = [
        'name', 'email','apellidos', 'password','telefono','DNI','rol'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
     public function vendedor(){ 
        return $this->hasOne( "App\Vendedor"); 
     }
    public function cliente(){ 
        return $this->hasOne( "App\Cliente"); 
        
     }
     public function administrador(){
         return $this->hasOne("App\Administrador");
     }
     public function direccion(){
         return $this->belongsToMany('App\Direccion', 'user_direccions', 'user_id', 'direccion_id');
     }
     public function tienda(){//la relación es de muchos a muchos, de esta manera el administrador sera propietario también de la tieda y podrá actuar con ella 
         //si el vendedor necesitara ayuda
             return $this->belongsToMany('App\Tienda', 'tienda_user', 'tienda_id', 'user_id');
     }
    
    
}
