@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/perfil.css')}}" />
@endsection

@section("title", "Perfil")

@section("main")
<main class="container mt-4" id="form-container">

  @if( session()->has('compraOK') )
    <div class="alert alert-success">
      {{ session()->get('compraOK') }}
    </div>
  @endif

  <!-- LISTA -->
  <ul>
    <li><a href="/perfil">Perfil</a></li>
    <li><a href="/cuenta">Cuenta</a></li>
    <li><a href="/seguridad">Seguridad</a></li>
    <li><a href="/compras" class="active">Compras</a></li>
  </ul>

  <section class="fix-height">
    <ul class="lista-compras">
      @forelse ($compras as $producto)
        <li>
          <img src="{{asset('img/productos/' . $producto->imagen)}}" width="50" alt="">
          <p class="nombre">{{$producto->nombre}}</p>
          <div class="cantidad">
            <small>Cantidad</small>
            <p>{{$producto->pivot->cantidad}}</p>
          </div>
          <div class="total">
            <small>Total</small>
            <p>$ {{number_format($producto->pivot->total)}}</p>
          </div>
          <small>{{$producto->pivot->fecha}}</small>
        </li>

        @empty
          <div class="compras-vacias">
            <p>No has realizado compras</p>
            <a href="/catalogo" class="boton boton-back"><i class="fas fa-arrow-left"></i> Ir al Catalogo</a>
          </div>

      @endforelse
    </ul>
  </section>

</main>
@endsection
