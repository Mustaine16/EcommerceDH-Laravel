@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/carrito.css')}}" />
<link rel="stylesheet" href="{{asset('css/adminProductos.css')}}" />

@endsection

@section("title", "Carrito")

@section("main")

<section class="container_ fix-height">

  <h1 class="titulo">Tu Carrito</h1>

  <!-- Mostar listado de productos -->
  @if(isset($carrito) && count($carrito) >= 1 && !isset($compraOK) )

    <!-- Formulario de compra -->
    <form class="form-compra" action="/usuario/carrito/comprar" method="post">
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
        <button class="btn btn-success boton borrarFake" id="openModal">Realizar compra</button>
      </section>
      <section class="modal_container" id="modal">
          <article class="modal_card">
              <h3>Confirmar compra</h4>
              <p>Haz click en comprar para realizar la compra</p>
              <small></small>
              <div class="modal_botones">
                  <form action="/usuario/carrito/comprar" method="post" id="formBorrar">
                      {{csrf_field()}}
                      <button class="btn btn-secondary" id="closeModal">Cancelar</button>
                      <button type="submit" class="btn btn-success" id="confirmarCompra">Comprar</button>
                  </form>
              </div>
      </article>
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


      <!-- Modal para confirmar compra -->

</section>

@endsection

@section("script")
<script src="{{asset('js/carrito.js')}}" ></script>
<!-- <script src="{{asset('js/crud.js')}}" ></script> -->
@endsection
