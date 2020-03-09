@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/catalogo.css')}}" />
@endsection

@section("title", "Catalogo")

@section("main")
    <!-- Catalogo -->


    <section class="products__container">
      <h1>Catalogo</h1>
       @foreach ($productos as $key => $producto)
        <article class="product__card">
          <figure>
            <img src="{{asset('img/productos/' . $producto->imagen)}}" width="100" alt="{{$producto->nombre}}" class="product__img" />
          </figure>
          <div class="product__info">
            <h3 class="product__name">{{$producto->nombre}}</h3>
            <p class="product__price">$ {{number_format($producto->precio)}}</p>
            <a href="/detalle-producto/{{$producto->id}}" class="product__link-details">Ver más</a>
          </div>
        </article>
        @endforeach
        {{$productos->links()}}
    </section>
@endsection
