<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Carrito;
use App\Compra;
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
        $usuarioID = $usuario->id;

        $productoID = $request['id_producto'];

        $productoEnCarritoDelUsuario = Carrito::where('id_usuario', $usuarioID)->where('id_producto', $productoID)->get();

        if(count($productoEnCarritoDelUsuario)){

            session()->flash('mensaje', 'Este producto ya se encuentra en tu ');
            return redirect()->back();

        }else{

            $carrito = new Carrito();
            $carrito->id_producto = $productoID;
            $carrito->id_usuario = $usuarioID;
            $carrito->save();
            return redirect('/carrito');

        }
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
    public function destroy($id){

        $user = Auth::user();

        $producto = Carrito::where('id_producto','=',$id)
                            ->where('id_usuario',"=",$user->id)
                            ->limit(1)->first();
                            //Con el metodo first conseguimos el MODEL en vez de una Collection
                            //De esta manera podemos utlizar el metodo Delete()

        $producto->delete();

        return redirect('/carrito');
    }

    //Realizar la comprar

    public function comprar(Request $req){

        /***************************
        *
        * GUARDAR DATOS EN LA TABLA DE COMPRAS
        *
        *****************************/

        $user = Auth::user();

        $productos = $user->carrito;
        //Traemos el array con cantidades, y se elimina el token de la primera posicion
        $req->flashExcept('_token');
        
        $cantidadPorProducto = array_values($req->session()->all()["_old_input"]);  

        // dd($cantidadPorProducto);

        foreach ($cantidadPorProducto as $i => $cantidad) {
            $compra = new Compra;

            $compra->id_usuario = $user->id;
            $compra->id_producto = $productos[$i]->id;
            $compra->cantidad = $cantidad;
            $compra->total = $productos[$i]->precio * $cantidad;
            $compra->fecha = date('d-m-y');
            $compra->save();
        }


        /***************************
        *
        * BORRAR PRODUCTOS DEL CARRITO
        *
        *****************************/

        // Se obtiene la columna ID de cada fila en la tabla carrito que coincida con el ID del usuario logueado

        $productosID = Carrito::where('id_usuario','=',$user->id)->get(['id']);

        // El método destroy() funciona ya sea con un ID específico o con un arreglo de IDs, en este caso los IDS de los productos
        // El metodo toArray convierte la collection en un array simple

        Carrito::destroy($productosID->toArray());

        $compraOK = 'La compra se ha realizado con éxito';
        $vac = compact('compraOK','productos');
        // dd($vac);
        return redirect('/compras')->with('compraOK', 'Su compra se ha realizado con exito');
    }

    public function finCompra(){

        $user = Auth::user();



        $compra = new Compra();

        // $compra->id_usuario = $user->id;
        // $compra->id_producto =



    }
}
