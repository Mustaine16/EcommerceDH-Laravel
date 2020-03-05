@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/agregarProducto.css')}}" />
@endsection

@section("title", "Agregar Producto")

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
        <form action="/producto/agregar" method="post" enctype="multipart/form-data">
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
                <label for="nombre">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" aria-describedby="NombreProducto"
                    placeholder="Ingrese un nombre de producto" name="nombre" value="{{old('nombre')}}" />
            </div>
            <div class="form-group">
                <label for="id_marca">Marca</label>
                <select class="form-control" id="marca" name="id_marca">
                    @foreach($marcas as $marca)
                    <option value="{{$marca->id}}">{{$marca->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="sist_operativo">Sistema Operativo</label>
                <input type="text" class="form-control" id="sist_operativo" placeholder="Sistema Operativo"
                    name="sist_operativo" value="{{old('sist_operativo')}}" />
            </div>
            <div class="form-group">
                <label for="memoria_int">Memoria Interna</label>
                <input type="text" class="form-control" id="memoria_int"
                    placeholder="Exprese la cantidad en numero entero" name="memoria_int"
                    value="{{old('memoria_int')}}" />
            </div>
            <div class="form-group">
                <label for="memoria_ram">Memoria RAM</label>
                <input type="text" class="form-control" id="memoria_ram"
                    placeholder="Exprese la cantidad en numero entero" name="memoria_ram"
                    value="{{old('memoria_ram')}}" />
            </div>
            <div class="form-group">
                <label for="procesador">Procesador</label>
                <input type="text" class="form-control" id="procesador" placeholder="Procesador" name="procesador"
                    value="{{old('procesador')}}" />
            </div>
            <div class="form-group">
                <label for="pantalla">Pantalla</label>
                <input type="text" class="form-control" id="pantalla" placeholder="Exprese la cantidad en numero"
                    name="pantalla" value="{{old('pantalla')}}" />
            </div>
            <div class="form-group">
                <label for="camara">Camara</label>
                <input type="text" class="form-control" id="camara" placeholder="Exprese la cantidad en numero"
                    name="camara" value="{{old('camara')}}" />
            </div>
            <div class="form-group">
                <label for="precio">Precio</label>
                <input type="text" class="form-control" id="precio" placeholder="Exprese la cantidad en numero"
                    name="precio" value="{{old('precio')}}" />
            </div>
            <div>
                <button type="submit" class="btn btn-success mx-auto d-block">
                    Añadir
                </button>
            </div>
        </form>

        <br>

        <a href="/producto/admin">Back</a>

    </section>
</main>
@endsection
