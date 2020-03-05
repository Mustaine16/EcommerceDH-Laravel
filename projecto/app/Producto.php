<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  public $timestamps = false;
  public $guarded = [];

  public function marca()
  {
      return $this->belongsTo("App\Marca", "id_marca");
  }
}
