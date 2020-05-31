<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
   
    
    
    public function Usuario(){
        return $this->belongsTo('App\User');
    } //
}
