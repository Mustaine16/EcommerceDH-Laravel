@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/perfil.css')}}" />
@endsection

@section("title", "Seguridad")

@section("main")
  <main class="container mt-4" id="form-container">
      <!-- LISTA -->
      <ul>
         <li><a href="/perfil">Perfil</a></li>
         <li><a href="/cuenta">Cuenta</a></li>
         <li><a href="/seguridad" class="active">Seguridad</a></li>
      </ul>

      <!-- CARTEL PARA CONFIRMAR QUE LOS CAMBIOS FUERON GUARDADOS -->

      <?php

      if($_POST && count($errores) == 0):?>
        <div class="confirmar-cambios">
        <p>Cambios guardados</p>
        </div>
      <?php endif; ?>

      <!-- FORMULARIO -->
      <form action="" method="Post"   class="fix-height">
        <h1 class="">Cambiar contraseña</h1>

        <section>

          <div class="d-flex flex-column">
            <label for="password">Nueva contraseña</label>
            <input class="inputs-f" type="password" name="password" placeholder="Introduce tu password">
            <!-- Mostrar errores -->
          </div>

          <div class="d-flex flex-column">
            <label for="repassword">Repite la contraseña</label>
            <input class="inputs-f" type="password" name="repassword" placeholder="Repite la contraseña">
            <!-- Mostrar errores -->
          </div>

          <input type="submit" name="guardar" class="btn btn-primary" value="Guardar Cambios">
        </form>

      </section>




  </main>
@endsection