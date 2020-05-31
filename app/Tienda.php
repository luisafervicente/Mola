<?php

namespace App;
use  App\User;
use App\Direccion;

use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    
  protected $fillable = [
        'nombre_tienda', 'image', 'clasificacion' ,'id_user','comentarios'
    ];
    
    
      public function direccion(){
         return $this->belongsToMany('App\Direccion');
     }
     public function user(){ 
    
         return $this->belongsToMany('App\User');
    }
}
