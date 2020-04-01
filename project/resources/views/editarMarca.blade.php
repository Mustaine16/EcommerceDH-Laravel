@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/agregarProducto.css')}}" />
@endsection

@section("title", "Editar - Marca")

@section("main")
<ul style="color:red" class="errores text-center">
    @foreach ($errors->all() as $error)
    <li>
        {{$error}}
    </li>
    @endforeach
</ul>
<main class="py-4 px-2 px-md-5 fix-height">
    <section class="container">
        <form action="/marca/{{$marcaAEditar->id}}/editar" method="post" enctype="multipart/form-data" autocomplete='off' id="editarMarca">
            {{ csrf_field() }}

            {{-- Imagen de la marca, autocargada --}}
            <div class="form-group imagen__container">
                <label class="imagen__img_container" for="imagen">
                    <img src="/img/productos/logos/{{$marcaAEditar->imagen}}" alt="imagen" class="rounded" id="imagenEdit">
                    <p>Elegí una imagen</p>
                </label>
                <input type="file" name="imagen" id="imagen" value="" onchange="vistazoImagen(event)" class="inputImage">
                <span id="error-imagen"></span>
            </div>
            {{-- Nombre de la marca --}}
            <div class="form-group">
                <div class="form-group">
                    <label class="font-weight-bold" for="nombre">Editar marca</label>
                    <input type="text" class="form-control" id="nombre" aria-describedby="NombreMarca"
                     placeholder="Ingrese un nuevo valor marca" name="nombre" value="{{$marcaAEditar->nombre}}"/>
                </div>
                <span id="error-nombre"></span>
            </div>
            <button type="submit" class="btn btn-success mx-auto d-block"> Editar </button>
            <br>
            <a href="/marca/admin" class="btn btn-outline-info mx-auto d-block" id="volverAtrasito">Volver</a>
        </form>
        

    </section>
</main>
@endsection

@section ('script')
<script src="/js/validar_editar_marca.js"></script>
@endsection