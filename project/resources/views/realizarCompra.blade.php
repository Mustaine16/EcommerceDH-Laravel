@extends('layout.plantilla')

@section('main')
  <div class="container d" style="min-height:50vh;">
    <h1>realizar la compra</h1>
    <h2>Elije el medio de pago</h2>
    {{-- <form class="form" action="" method="post">
      @csrf
      <select class="list-group" name="" size="1">
        <option value="" class="list-group-item">tarjeta de  creditus</option>
        <option value="" class="list-group-item">debitus</option>
        <option value="" class="list-group-item">bitcoin</option>
        <option value="" class="list-group-item">rapipago</option>
        <option value="" class="list-group-item">otro</option>
      </select>
      <button type="submit" class="btn btn-danger">Realizar compra</button>
    </form> --}}
    <ul class="list-group">
      <li class="list-group-item"><a href="/usuario/carrito/finCompra">creditus</a> </li>
      <li class="list-group-item"><a href="/usuario/carrito/finCompra">debitus</a> </li>
      <li class="list-group-item"><a href="/usuario/carrito/finCompra">bitcoin</a> </li>
      <li class="list-group-item"><a href="/usuario/carrito/finCompra">rapipago</a> </li>
      <li class="list-group-item"><a href="/usuario/carrito/finCompra">otro</a> </li>
    </ul>
  </div>
@endsection
