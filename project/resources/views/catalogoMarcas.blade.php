@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/catalogo.css')}}" />
@endsection

@section("title", "Marcas")

@section("main")

    <!-- Catalogo  de marcas-->

    <section class="products__container">
      <h1>Marcas</h1>

       @foreach ($marcas as $marca)
       <a href="/catalogo/marcas/{{$marca->id}}" class="product__card">
          <figure>
            <img src="/img/productos/logos/{{$marca->imagen}}" class="img-thumbnail" alt="" class="product__img" />
          </figure>

        </a>
        @endforeach

    </section>
@endsection
