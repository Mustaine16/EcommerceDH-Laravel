@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/detallesProducto.css')}}" />
@endsection

@section("title", "Detalles Producto")

@section("main")
  <section class="container pt-2 mb-2">
      <article class="producto__container p-2">
        <!-- Imagen del producto -->
        <figure class="producto__imagen text-center">
          <img src="{{asset('img/productos/' . $producto->imagen)}}" class="img-fluid" alt="" />
        </figure>
        <!-- Nombre, precio y añadir la carrito -->
        <div class="producto__vender-container">
          <h2 class="producto__nombre">{{$producto->nombre}}</h2>
          <p class="producto__precio">$ {{number_format($producto->precio)}}</p>
          <button class="producto__carrito">
            + Añadir al carrito
          </button>
        </div>
        <div class="producto__detalles">
          <h3>Detalles</h3>
          <div class="producto__detalle">
            <p class="detalle_nombre">Marca</p>
            <p class="detalle_data">{{$producto->marca->nombre}}</p>
          </div>
          <div class="producto__detalle">
            <p class="detalle_nombre">Sistema Operativo</p>
            <p class="detalle_data">{{$producto->sist_operativo}}</p>
          </div>
          <div class="producto__detalle">
            <p class="detalle_nombre">Pantalla</p>
            <p class="detalle_data">{{$producto->pantalla}}"</p>
          </div>
          <div class="producto__detalle">
            <p class="detalle_nombre">Cámara</p>
            <p class="detalle_data">{{$producto->camara}} MP</p>
          </div>
          <div class="producto__detalle">
            <p class="detalle_nombre">Memoria Interna</p>
            <p class="detalle_data">{{$producto->memoria_int}} GB</p>
          </div>
          <div class="producto__detalle">
            <p class="detalle_nombre">Memoria RAM</p>
            <p class="detalle_data">{{$producto->memoria_ram}} GB</p>
          </div>
        </div>
      </article>
  </section>
@endsection