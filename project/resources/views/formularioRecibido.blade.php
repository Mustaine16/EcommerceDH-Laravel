@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/contacto.css')}}" />
@endsection

@section("title", "Contacto")

@section("main")
  <div class="container " style="min-height:50vh">
    <div class="alert alert-success alert-dismissible fade show">
        <p>El formulario se ha enviado con éxito</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

  </div>
@endsection
