<?php

namespace App\Http\Controllers;
use App\Marca;
use Illuminate\Http\Request;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
        $marcas = Marca::all();

        $vac = compact("marcas");

        return view("adminMarcas", $vac);

     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
      return view("agregarMarca");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $reglas = [
        "nombre" => "required"
      ];

      $mensajes = [
          "required" => "El campo :attribute es obligatorio perri."
      ];

      $this->validate($request, $reglas, $mensajes);


      $marca = new Marca();

      $marca->nombre = $request["nombre"];


      $marca->save();

      return redirect('/marca/admin')->with('mensajeExito', 'Marca: ' . $marca->nombre . ' agregada correctamente fiera');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $marca = Marca::find($id);

        if($marca){
          
          $productos = $marca->productos()->paginate(4);

          $vac = compact('productos');

          return view("catalogo", $vac);

        }else{
          abort(404, 'Page not found');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $marcas = Marca::all();
      $marcaAEditar = Marca::find($id);
      $vac = compact('marcaAEditar');
      return view('editarMarca', $vac);
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
        "nombre" => "required"
      ];

      $mensajes = [
          "required" => "El campo :attribute es obligatorio maestro."
      ];

      $this->validate($request, $reglas, $mensajes);

      $marca = Marca::find($id);

      $marca->nombre = $request["nombre"];

      $marca->save();

      return redirect("/marca/admin")->with('mensajeExito', 'Marca: ' . $marca->nombre . ' editada correctamente');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $marca = Marca::find($id);
      //hay al menos un producto con esa marca, entonces no se puede eliminar
      if($marca->productos()->count() !== 0){

        $mensajeErroEliminarMarca = "No se puede eliminar la marca $marca->nombre porque hay productos relacionados.";

        session()->flash('errorBaja', $mensajeErroEliminarMarca);
        return redirect()->back();

      }
     //la marca se puede eliminar
      $marca->delete();
      return redirect('/marca/admin')->with('mensajeEliminacion', 'Marca: ' . $marca->nombre . ' eliminada correctamente');;
    }

    /*
      mostar todas las marcas
    */
    public function directory()
    {
        $marcas = Marca::all();

        $vac = compact("marcas");

        return view("catalogoMarcas", $vac);

    }
}
