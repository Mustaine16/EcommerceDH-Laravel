<?php

namespace App\Http\Controllers;
use App\User;
use Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    function showCarrito(){
        //Vamos a tener un array de productos
        $carrito = Auth::user()->carrito;
        //Subtotal temporal, sin contar cantidad de productos
        // dd($carrito);
        $subtotal = 0;
        foreach ($carrito as $producto) {
            $subtotal += $producto->precio;
        }

        $vac = compact('carrito', 'subtotal');

        return view('carrito',$vac);
    }
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
        //
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
    public function edit()
    {
        $usuario=Auth::user();
        return view('/perfil',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $reglas = [
          "nombre" => "required",
          'apellido'=>'required',
          'direccion'=>'required',
          'ciudad'=>'required'
      ];

      $mensajes = [
          "required" => "El campo :attribute es obligatorio."
      ];

      $this->validate($request, $reglas, $mensajes);

       $usuario = User::find($id);
       //validar
       $usuario->nombre = $request['nombre'];
       $usuario->apellido = $request['apellido'];
       $usuario->direccion =$request['direccion'];
       $usuario->ciudad =$request['ciudad'];

       $usuario->save();

       return redirect('/perfil');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCuenta()
    {
        $usuario=Auth::user();
        // dd($usuario);
        return view('cuenta',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateCuenta(Request $request, $id)
    {
      // dd($request['username']);


      $this->validate($request,[
        'username'=>'required'
      ]);

      // $usuario=Auth::user();
       $usuario = User::find($id);
       // dd($usuario);

       //poner el campo y guardar
       $usuario->username = $request['username'];

       $usuario->save();
       return redirect('/cuenta');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editSeguridad()
    {
        $usuario=Auth::user();
        return view('seguridad',compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateSeguridad(Request $request, $id)
    {
      $reglas = [
          "password" => "required|confirmed"
      ];

      $mensajes = [
          "required" => "El campo :attribute es obligatorio."
      ];

      $this->validate($request, $reglas, $mensajes);
       // if($request['password']!==$request['repassword']){
       //
       // }

       $usuario = User::find($id);
       //validar
       $usuario->password = bcrypt($request['password']);;

       $usuario->save();

       return redirect('/seguridad');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
