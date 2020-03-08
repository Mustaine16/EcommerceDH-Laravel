<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Carrito;
use Auth;

class CarritoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  eqequest
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $usuario = Auth::user();

        $carrito = new Carrito();
        $carrito->id_producto = $request['id_producto'];
        $carrito->id_usuario = $usuario->id;
        $carrito->save();
        return redirect('/carrito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // return "todo bien hasta aca";
        //dd($r['id_producto']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $req){
   
        $user = Auth::user();
    
        $producto = Carrito::where('id_producto','=',$req['id_producto'])
                            ->where('id_usuario',"=",$user->id)
                            ->limit(1)->first();
                            //Con el metodo first conseguimos el MODEL en vez de una Collection
                            //De esta manera podemos utlizar el metodo Delete()

        $producto->delete();

        return redirect('/carrito');
    }

    //Realizar la comprar

    public function comprar(){

      return view('realizarCompra');

    }

    public function finCompra(){

        $user = Auth::user();
        
        // Se obtiene la columna ID de cada producto en la tabla carrito que coincida con el ID del usuario logueado

        $productosID = Carrito::where('id_usuario','=',$user->id)->get(['id']);

        // El método destroy() funciona ya sea con un ID específico o con un arreglo de IDs, en este caso los IDS de los productos
        // El metodo toArray convierte la collection en un array simple

        Carrito::destroy($productosID->toArray());
      
        return view('carrito',[
            "compraOK" => 'la compra se ha realizado con exitus'
        ]);

    }
}
