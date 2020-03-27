@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/detallesProducto.css')}}" />
@endsection

@section("title", "Detalles Producto")

@section("main")
    <!-- Mensaje de avisando que el producto ya estaba añadido en el carrito -->
  @if( session()->has('mensaje') )
  <div class="alert alert-warning alert-dismissible fade show">
  {{ session()->get('mensaje') }} <a href="/carrito">carrito</a>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
{{-- {{ dd($producto->nombre)}} --}}
  <section class="container pt-2 mb-2">
      <article class="producto__container p-2">
        <!-- Imagen del producto -->
        <figure class="producto__imagen text-center">
          <img src="{{asset('img/productos/' . $producto->imagen)}}" class="img-fluid" alt="" />
        </figure>
        <!-- Nombre, precio y añadir la carrito -->
        <div class="producto__vender-container">
          <h2 class="producto__nombre">{{$producto->nombre}}</h2>
          <p class="producto__precio">$ {{number_format($producto->precio,0,"",".")}}</p>
          <form class="" action="/usuario/carrito/addItem" method="post">
            @csrf
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="id_producto" value="{{$producto->id}}">
            <button type="submit" class="producto__carrito">
              + Añadir al carrito
            </button>
          </form>

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
