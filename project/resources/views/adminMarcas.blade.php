@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/adminMarcas.css')}}" />
@endsection

@section("title", "Admin - Marcas")

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

    <a class="btn btn-success mb-3 d-block ml-auto p-3" href="/marca/agregar">Agregar nueva marca</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                {{-- <th>Imagen</th> --}}
                <th>Nombre</th>
                <th colspan="2" class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($marcas as $marca)
            <tr>
                <td>
                    {{$marca->id}}
                </td>
                <td>
                    {{$marca->nombre}}
                </td>
                <td class="acciones">                
                    <a href="/marca/{{$marca->id}}/editar" class="btn btn-success d-inline-block">Editar</a>
                     <form action="/marca/{{$marca->id}}/borrar" method="post">
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
