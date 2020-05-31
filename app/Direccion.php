<?php

namespace App;
use User;
use Tienda;
use Illuminate\Database\Eloquent\Model;

class Direccion extends Model
{
      protected $fillable=[
       'calle','poblacion','provincia','pais','codigo_postal'];
    
    
    
    
    public function users(){
        return $this->belongsToMany('App\User', 'user_direccions', 'direccion_id', 'user_id');
    }
    
    public function tiendas(){
        return $this->belongsToMany('App\Tienda');
    }
    
}
    
    
    
    
    
    
    
    
 
