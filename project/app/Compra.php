<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public $timestamps = false;
    public $guarded = [];

    public function producto(){
        return $this->belongsToMany('App\Producto', 'compras','id_usuario', 'id_producto');
        // return $this->belongsToMany('App\Producto', 'carritos', 'id_usuario', 'id_producto');
    }
}
