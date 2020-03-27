@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/perfil.css')}}" />
@endsection

@section("title", "Cuenta")
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@section("main")
  <main class="container mt-4" id="form-container">

    <!-- LISTA -->
    <ul>
      <li><a href="/perfil">Perfil</a></li>
      <li><a href="/cuenta" class="active">Cuenta</a></li>
      <li><a href="/seguridad">Seguridad</a></li>
      <li><a href="/compras">Compras</a></li>
    </ul>
    <!-- CARTEL PARA CONFIRMAR QUE LOS CAMBIOS FUERON GUARDADOS -->
    <?php
    if($_POST && count($erroresFormulario) == 0 && count($erroresDeValidacion) == 0):?>
      <div class="confirmar-cambios">
      <p>Cambios guardados</p>
      </div>
    <?php endif; ?>
    <!-- FORMULARIO -->
    {{-- {{dd($usuario->username)}} --}}
    <form action="/cuenta/{{$usuario->id}}" method="Post" class="fix-height">
      @csrf

      <h1 class="">Cambiar datos de la cuenta</h1>
      <section>

        <div class="d-flex flex-column">
          <label for="username">Usuario</label>
          <input class="inputs-f" type="text" name="username" placeholder="Introduce tu usuario" value='{{$usuario->username}}'>
         <!-- MOSTRAR ERROR  -->
        </div>

        {{-- <div class="d-flex flex-column">
          <label for="email">Email</label>
          <input class="inputs-f" type="email" name="email" placeholder="Introduce tu email" value=''>
         <!-- MOSTRAR ERROR  -->
        </div> --}}
        <input type="hidden" name="_method" value="PUT">

        <input type="submit" name="guardar" class="btn btn-primary" value="Guardar Cambios">

      </section>
    </form>

  </main>
@endsection
