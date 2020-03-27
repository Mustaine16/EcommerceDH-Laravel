<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Producto;
use Faker\Generator as Faker;
use App\Marca;

// $marcas = Marca::all();
// $so = array("android","ios","otro");
// $nombres=array('alpha','beta','nokia');

$factory->define(\App\Producto::class, function (Faker $faker) {

    return [
        'nombre'=>$faker->word,
        'procesador'=>$faker->word,
        'precio'=>$faker->randomFloat(),
        'sist_operativo'=>$faker->word,
        'imagen'=>'celular-generico.png',
         'pantalla'=>$faker->randomNumber(),
        'camara'=>$faker->numberBetween(4,32),
        'memoria_ram'=>$faker->numberBetween(4,64),
        'id_marca'=>1,
        'memoria_int'=>$faker->numberBetween(100,2000)
    ];
});
