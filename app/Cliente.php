<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use User;
class Cliente extends Model
{
   protected $fillable = [
        'n_tarjeta','user_id'
    ];
    
    
    public function Usuario(){
        return $this->belongsTo('App\User');
    } //
}
