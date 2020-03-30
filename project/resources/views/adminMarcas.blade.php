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

    <!-- Mensaje de error en baja -->
    @if(session()->has('errorBaja'))
      <div class="alert alert-danger">
        <p>{{session()->get('errorBaja')}}</p>
      </div>
    @endif

    <!-- Modal para confirmar eliminacion -->
      <section class="modal_container" id="modal">
        <article class="modal_card">
          <h3>Confirmar eliminacion</h4>
            <p>¿Estas seguro de querer eliminar este producto?</p>
            <small>Esta accion no tiene marcha atras</small>
            <div class="modal_botones">
              <form action="" method="post" id="formBorrar">
                {{csrf_field()}}
                  <button class="btn btn-secondary" id="closeModal">Cancelar</button>
                  <button class="btn btn-danger" id="borrar">Borrar</button>
                </form>
            </div>
        </article>
    </section>

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
                    <button class="btn btn-danger borrarFake" width="100" data-idmarca={{$marca->id}}>Borrar</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$marcas->links()}}
</main>
@endsection

@section("script")
<script src="{{asset('js/adminMarcas.js')}}" ></script>
@endsection
