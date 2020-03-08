@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/carrito.css')}}" />
@endsection

@section("title", "Carrito")

@section("main")
<section class="container fix-height">

        <h1 class="pl-3">Tu Carrito</h1>
        {{-- mostrar mensaje si la compra salio tudo bom --}}
        @if(isset($compraOK))
          <div class="alert alert-success alert-dismissible fade show">
            {{$compraOK}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
        {{-- @endif --}}
      @elseif($carrito)
        <ul>
        @forelse ($carrito as $producto)
            <li>
                <div class="producto_datos">
                    <img src="{{asset('img/productos/'. $producto->imagen)}}" alt="producto" width="40px">
                    <p class="producto_nombre">{{$producto->nombre}}</p>
                    <p class="producto_precio">$ {{$producto->precio}}</p>
                </div>
                <div class="actions_container">
                    <div class="contador">
                        <p>cantidad</p>
                        <form class="" action="index.html" method="post">
                          <input type="number" id="quantity" name="cantidad" min="1" max="5" value=1>
                        </form>
                    </div>
                    <form class="" action="/usuario/carrito/dropItem" method="post">
                      @csrf
                      <input type="hidden" name="id_producto" value="{{$producto->id}}">
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" class="btn btn-danger">eliminar</button>

                    </form>
                </div>
            </li>
          @empty
          @endforelse
        @endif
        </ul>
        <form class="" action="/usuario/carrito/comprar" method="get">
          @csrf
          {{-- <input type="hidden" name="" value=""> --}}
          @if(!isset($compraOK) && $carrito->count()!=0)
            <button type="submit" class="btn btn-success">
            Realizar compra
            </button>
          @endisset
        </form>
        <div class="">
          <a href="/catalogo" class="btn btn-info"> seguir comprando</a>
        </div>
    </section>

@endsection
