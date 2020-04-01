@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/adminProductos.css')}}" />
@endsection

@section("title", "Admin - Productos")

@section("main")
<main class="py-4 px-2 px-md-5 container fix-height">

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

    <!-- Boton para crear un nuevo producto -->
    <a class="btn btn-success mb-3 d-block ml-auto p-3" href="/producto/agregar">Agregar nuevo producto</a>
    
    <!-- Tabla de productos -->
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
                     <form action="">
                        <button class="btn btn-danger borrarFake" data-idproducto={{$producto->id}}>Borrar</button>
                     </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Modal para confirmar eliminacion -->
    <section class="modal_container" id="modal">
        <article class="modal_card">
            <h3>Confirmar eliminacion</h4>
            <p>¿Estas seguro de querer eliminar este producto?</p>
            <small>Esta accion no tiene marcha atras</small>
            <div class="modal_botones">
                <form action="/producto/{{$producto->id}}/borrar" method="post" id="formBorrar">
                    {{csrf_field()}}
                    <button class="btn btn-secondary" id="closeModal">Cancelar</button>
                    <button class="btn btn-danger" id="borrar">Borrar</button>
                </form>
            </div>
    </article>
    </section>
    
    <!-- Paginacion -->
    {{$productos->links()}}
</main>
@endsection

@section("script")
<script src="{{asset('js/adminProductos.js')}}" ></script>
@endsection
