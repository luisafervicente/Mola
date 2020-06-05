<?php

namespace App;
use  App\User;
use App\Direccion;


use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    
  protected $fillable = [
        'nombre_tienda', 'image', 'clasificacion' ,'comentarios'
    ];
    
    
      public function direccion(){
         return $this->belongsToMany('App\Direccion','tienda_direccions', 'direccion_id', 'tienda_id');
     }
     public function user(){ 
    
         return $this->belongsToMany('App\User','tienda_user','tienda_id','user_id');
    }
}
