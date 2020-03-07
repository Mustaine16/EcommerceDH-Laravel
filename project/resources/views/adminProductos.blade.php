@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/adminProductos.css')}}" />
@endsection

@section("title", "Admin - Productos")

@section("main")
<main class="py-4 px-2 px-md-5">

    <!-- Mensaje de confirmacion en caso de Alta/Editar-->
    @if( session()->has('mensajeExito') )
        <div class="alert alert-success">
            {{ session()->get('mensajeExito') }}
        </div>
    @endif

    <!-- Mensaje de confirmacion en caso de Baja -->
    @if( session()->has('mensajeEliminacion') )
        <div class="alert alert-danger">
            {{ session()->get('mensajeEliminacion') }}
        </div>
    @endif

    <a class="btn btn-success mb-3 d-block ml-auto p-3" href="/producto/agregar">Agregar nuevo producto</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre del Producto</th>
                <th colspan="2" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($productos as $producto)
            <tr>
                <td>
                    {{$producto->id}}
                </td>
                <td>
                    <img src="{{asset('img/productos') . '/' . $producto->imagen}}" alt="{{$producto->nombre}}" width="40px">
                </td>
                <td>
                    {{$producto->nombre}}
                </td>
                <td class="acciones">                
                    <a href="/producto/{{$producto->id}}/editar" class="btn btn-success d-inline-block">Editar</a>
                     <form action="/producto/{{$producto->id}}/borrar" method="post">
                        {{csrf_field()}}
                        <button class="btn btn-danger" width="100">Borrar</button>
                     </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</main>
@endsection
