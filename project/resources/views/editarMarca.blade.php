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

<main class="py-4">
    <section class="container">
        <form action="/marca/{{$marcaAEditar->id}}/editar" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group imagen__container">
                <label class="imagen__img_container" for="imagen">
                    <img src="https://static.websguru.com.ar/gfx/freeTextImage/placeholder.png?v=7.3.44821" alt="imagen"
                        class="imagen__img">
                    <p>Elegí una imagen</p>
                </label>
                <input type="file" name="imagen" id="imagen" class="imagen__input" value="">
            </div>
            <div class="form-group">
                <div class="form-group">
                    <label class="font-weight-bold" for="nombre">Editar marca</label>
                    <input type="text" class="form-control" id="nombre" aria-describedby="NombreMarca"
                        placeholder="Ingrese un nuevo valor marca" name="nombre" value="{{$marcaAEditar->nombre}}" />
                </div>
            </div>
            <button type="submit" class="btn btn-success mx-auto d-block">
                Editar
            </button>
        </form>

        <br>

        <a href="/marca/admin">Back</a>

    </section>
</main>
@endsection
