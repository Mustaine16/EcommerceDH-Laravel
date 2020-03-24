@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/carrito.css')}}" />
@endsection

@section("title", "Carrito")

@section("main")

<section class="container_ fix-height">

  <h1 class="titulo">Tu Carrito</h1>

  <!-- Mostar listado de productos -->
  @if(isset($carrito) && count($carrito) >= 1 && !isset($compraOK) )

    <!-- Formulario de compra -->
    <form class="form-compra" action="/usuario/carrito/comprar" method="get">
      @csrf

      <ul>
        @foreach($carrito as $producto)
          <li class="producto_datos">
            <img src="{{asset('img/productos/'. $producto->imagen)}}" alt="producto" width="50px"/>
            <div class="producto_nombre-marca-container">
              <a href="/detalle-producto/{{$producto->id}}" class="producto_nombre" aria-label="nombreProducto">{{$producto->nombre}}</a>
              <small class="producto_marca" aria-label="marca">{{$producto->marca->nombre}}</small>
            </div>
              <select name="cantidad_{{$producto->id}}" data-id={{$producto->id}}>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
              </select>
            <p class="producto_precio" aria-label="precio" data-precio={{$producto->precio}} data-subtotal={{$producto->precio}}>$ {{number_format($producto->precio,0,"",".")}}</p>
            <a href="/usuario/carrito/dropItem/{{$producto->id}}" class="btn btn-danger">X</a>
          </li>
        @endforeach
      </ul>

      <section class="resumen">
        <h5>Resumen de compra</h5>
        <p id="precioFinal" data-subtotal={{$subtotal}}>Precio Final: $ {{number_format($subtotal,0,"",".")}}</p>
        <a href="/catalogo" class="boton boton-back"><i class="fas fa-arrow-left"></i> Seguir comprando</a>      
        <button type="submit" class="btn btn-success boton">Realizar compra</button>
      </section>


    </form>

  <!-- Mostrar cartel de Carrito vacio -->
  @else
    <div class="carrito-vacio-card">
      <img class="m-auto" src="{{asset('img/carrito-vacio.png')}}" alt="carrito vacio" width="240px">
      <h2 class="text-center">Tu carrito se encuentra vacío</h2>
      <a href="/catalogo" class="boton boton-back"><i class="fas fa-arrow-left"></i> Seguir comprando</a>
    </div>
  @endif  

</section>

@endsection

@section("script")
<script src="{{asset('js/carrito.js')}}" ></script>
@endsection