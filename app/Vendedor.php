<?php

namespace App;
use User;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
 protected $fillable=[
       'denominacion_fiscal','n_cuenta_bancaria','fecha_facturacion','tipo_iva','recargo_equivalencia','user_id'];
    
    
   public function user(){
        return $this->belongsTo('App\User');
    }
}
