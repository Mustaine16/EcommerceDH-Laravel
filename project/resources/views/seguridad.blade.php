@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/perfil.css')}}" />
@endsection

@section("title", "Seguridad")
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
         <li><a href="/cuenta">Cuenta</a></li>
         <li><a href="/seguridad" class="active">Seguridad</a></li>
         <li><a href="/compras">Compras</a></li>
      </ul>

      <!-- CARTEL PARA CONFIRMAR QUE LOS CAMBIOS FUERON GUARDADOS -->

      <?php

      if($_POST && count($errores) == 0):?>
        <div class="confirmar-cambios">
        <p>Cambios guardados</p>
        </div>
      <?php endif; ?>

      <!-- FORMULARIO -->
      <form action="/seguridad/{{$usuario->id}}" method="Post" class="fix-height">
        @csrf

        <h1 class="">Cambiar contraseña</h1>

        <section>

          <div class="d-flex flex-column">
            <label for="password">Nueva contraseña</label>
            <input class="inputs-f" type="password" name="password" placeholder="Introduce tu password">
            <!-- Mostrar errores -->
          </div>

          <div class="d-flex flex-column">
            <label for="password_confirmation">Repite la contraseña</label>
            <input class="inputs-f" type="password" name="password_confirmation" placeholder="Repite la contraseña">
            <!-- Mostrar errores -->
          </div>
          <input type="hidden" name="_method" value="PUT">
          <input type="submit" name="guardar" class="btn btn-primary" value="Guardar Cambios">
        </form>

      </section>




  </main>
@endsection
