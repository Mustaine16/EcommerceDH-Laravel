@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/contacto.css')}}" />
@endsection

@section("title", "Contacto")

@section("main")
  <section class="container p-3 fix-height">
    <h1>Contactanos</h1>
    <!-- esto envuelve al formulario -->
    <article class="container container-fluid" id="form-container">
    
      <form action="contacto.php" method="post">

        <div class="form-group">
          <label for="nombre">Nombre</label>
          <input
            type="text"
            id="nombre"
            class="form-control text-input"
            name="nombre"
            value=""
          />
        </div>

        <div class="form-group">
          <label for="apellido">Apellido</label>
          <input
            type="text"
            class="form-control text-input"
            id="apellido"
            name="apellido"
            value=""
          />
        </div>

        <div class="form-group">
          <label for="email">Email</label>
          <input
            type="email"
            id="email"
            class="form-control email-input"
            name="email"
            value=""
          />
        </div>

        <div class="form-group">
          <label for="telefono">Teléfono</label>
          <input
            type="tel"
            id="telefono"
            class="form-control password-input"
            name="telefono"
            value=""
          />
        </div>

        <div class="form-group">
          <input
            type="submit"
            class="col col-md-auto col-lg-auto btn btn-lg btn-primary"
            value="Enviar"
            id="create-count"
          />
        </div>

      </form>
    </article>
  </section>
@endsection