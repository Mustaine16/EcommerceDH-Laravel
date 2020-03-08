<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
* CRUD Usuarios
*/




/**
 * CRUD Productos
 */

Route::get('/producto/admin', "ProductosController@index")->middleware('verificarAdmin');

Route::get("/producto/agregar", "ProductosController@create")->middleware('verificarAdmin');

Route::post("/producto/agregar", "ProductosController@store")->middleware('verificarAdmin');

Route::get("/producto/{id}/editar", "ProductosController@edit")->middleware('verificarAdmin');

Route::post("/producto/{id}/editar", "ProductosController@update")->middleware('verificarAdmin');

Route::post("/producto/{id}/borrar", "ProductosController@destroy")->middleware('verificarAdmin');

/**
 * CRUD marcas
 */
Route::get('/marca/admin', "MarcasController@index")->middleware('verificarAdmin');

Route::get("/marca/agregar", "MarcasController@create")->middleware('verificarAdmin');

Route::post('/marca/agregar', 'MarcasController@store')->middleware('verificarAdmin');

Route::get("/marca/{id}/editar", "MarcasController@edit")->middleware('verificarAdmin');

Route::post("/marca/{id}/editar", "MarcasController@update")->middleware('verificarAdmin');

Route::post("/marca/{id}/borrar", "MarcasController@destroy")->middleware('verificarAdmin');

/**
 * Vistas Perfil de usuario
 */

Route::get("/perfil", "UsersController@edit")->middleware('auth');

Route::put('/perfil/{id}','UsersController@update');

Route::get("/cuenta", function () {
    return view("cuenta");
})->middleware('auth');

Route::get("/seguridad", function () {
    return view("seguridad");
})->middleware('auth');

/**
 * Vista de Catalogo,Detalles de Productos, Carrito
 */

Route::get('/catalogo', "ProductosController@index");

Route::get("/detalle-producto/{id}", "ProductosController@show");

Route::get('/carrito', 'UsersController@showCarrito');

Route::get('/catalogo/marcas',"MarcasController@directory");
/*
* Vistas Estaticas
*/

Route::get('/', function () {
    return view('home');
});

Route::get("/faq", function () {
    return view("faq");
});

// prueba de usar una api
//API
//  Route::get('/productosExternos','ProductosController@productosExternos');
//

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//  carritou
//compra
Route::get('/usuario/carrito/comprar','CarritoController@comprar');
//paga
Route::get('/usuario/carrito/finCompra','CarritoController@finCompra');

//aniadir a producto a carrito
Route::put('/usuario/carrito/addItem','CarritoController@store');
//eliminar
Route::delete('/usuario/carrito/dropItem','CarritoController@destroy');

//contacto
Route::get('/contacto','ContactoController@contacto');
Route::post('/contacto','ContactoController@procesarContacto');
