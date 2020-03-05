@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/login.css')}}" />
@endsection

@section("title", "Login")

@section("main")
<section class="container formularios__container" id="form-container">
  <h1 class="important-text my-3">Inicia Sesión</h1>
  <form action="{{ route('login') }}" method="POST">
  @csrf

    <div class="form-group">
      <label for="email">{{ __('E-Mail') }}</label>
      <input
        type="text"
        id="email"
        class="form-control @error('email') is-invalid @enderror"
        name="email"
        value= "{{ old('email') }}"
        required autocomplete="email" 
        autofocus
      />
      @error('email')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
      @enderror
    </div>
    <div class="form-group">
      <label for="password">Clave</label>
      <input
        type="password"
        id="password"
        class="form-control @error('password') is-invalid @enderror"
        name="password"
        required autocomplete="current-password"
      />
      @error('password')
      <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
      </span>
       @enderror
    </div>
    <div class="form-check">
      <input class="form-check-input" 
      type="checkbox" 
      value="yes" 
      id="defaultCheck1" 
      name="mantenerLogueado">
      <label class="form-check-label" for="defaultCheck1">{{ __('Recordarme') }}</label>
    </div>
    <div class="form-group row mb-0">
    <div class="col-md-8 offset-md-4">
    <button type="submit" class="btn btn-primary">
    {{ __('Login') }}
    </button>
   @if (Route::has('password.request'))
    <a class="btn btn-link" href="{{ route('password.request') }}">
    {{ __('¿Te olvidaste la contra perri?') }}
    </a>
   @endif
  </div>
  </form>
</section>
@endsection
