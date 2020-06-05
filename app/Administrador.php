<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Administrador extends Model
{
   protected $fillable=[ 'user_id' ];
 
 public function Usuario(){
        return $this->belongsTo('App\User');
    }
}