<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    public $timestamps = false;

    public $guarded = [];
    public function producto(){
      return $this->belongsToMany('App\User', 'carritos', 'id_usuario', 'id_producto');
  }
}
