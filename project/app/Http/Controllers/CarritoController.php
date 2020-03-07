<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Producto;
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request['id_producto']);
        $usuario = Auth::user();
        // dd($usuario->nombre);
        $carrito = new \App\Carrito();
        $carrito->id_producto = $request['id_producto'];
        $carrito->id_usuario= $usuario->id;
        $carrito->save();
        return redirect('/catalogo');
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
    public function destroy(Request $r)
    {
      //dd($r['id_producto']);
      $user = Auth::user();
      // dd($user->id);
        $producto = \App\Carrito::where('id_producto','=',$r['id_producto'])
                                ->where('id_usuario',"=",$user->id)
                                ->limit(1)->get();
        // dd($producto->first()->id);
        $eliminar = \App\Carrito::find($producto->first()->id);
        // dd($eliminar);
        $eliminar->delete();
        return redirect('/carrito');
    }

    //realizar la comprar
    public function comprar(){
      // $usuario = Auth::user();
      return view('realizarCompra');

    }
    public function finCompra(){
        return redirect('/catalogo');
    }
}
