@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/catalogo.css')}}" />
@endsection

@section("title", "Catalogo marcas")

@section("main")

    <!-- Catalogo  de marcas-->

    <section class="products__container">
      <h1>Marcas</h1>
      @php
        $i=0;
      @endphp
       @foreach ($marcas as $marca)
        <article class="product__card">
          <figure>
            <img src="/img/productos/logos/{{$marca->nombre}}.png" width="100" alt="" class="product__img" />
          </figure>
          <div class="product__info">
            <h3 class="product__name">{{$marca->nombre}}</h3>
            {{-- <p class="product__price">$ {{number_format($producto->precio)}}</p> --}}
            {{-- <a href="/detalle-producto/{{$producto->id}}" class="product__link-details">Ver más</a> --}}
          </div>
          <div class="">
            <ul class="list-unstyled">
              @php
                $i++;
              @endphp
              @foreach($marca->productos as $producto)
                <li><a href="/detalle-producto/{{$producto->id}}">{{$producto->nombre}}</a></li>
              @endforeach
            </ul>
          </div>
        </article>
        @endforeach
    </section>
@endsection
