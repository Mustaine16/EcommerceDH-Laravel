<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  public $timestamps = false;
  public $guarded = [];

  public function marca(){
      return $this->belongsTo("App\Marca", "id_marca");
  }

  public function enCarrito(){
    return $this->belongsToMany('App\User', 'carritos', 'id_producto', 'id_usuario');
  }

  public function comprado(){
    return $this->belongsToMany('App\User','compras','id_producto', 'id_usuario')->withPivot(['cantidad','total']);
  }
}
