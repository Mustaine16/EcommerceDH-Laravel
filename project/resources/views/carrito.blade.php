@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/carrito.css')}}" />
@endsection

@section("title", "Carrito")

@section("main")
<section class="container fix-height">

        <h1 class="pl-3">Tu Carrito</h1>

        <ul>
        @foreach ($carrito as $producto)
            <li>
                <div class="producto_datos">
                    <img src="{{asset('img/productos/'. $producto->imagen)}}" alt="producto" width="40px">
                    <p class="producto_nombre">{{$producto->nombre}}</p>
                    <p class="producto_precio">$ {{$producto->precio}}</p>
                </div>
                <div class="actions_container">
                    <div class="contador">
                        <button>-</button>
                        <span class="cantidad">3</span>
                        <button>+</button>
                    </div>
                    <button class="btn btn-danger">eliminar</button>
                </div>
            </li>
            @endforeach
        </ul>

    </section>

@endsection