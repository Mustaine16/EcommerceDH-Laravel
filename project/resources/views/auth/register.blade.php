@extends('layout.plantilla')

@section("estilos")
<link rel="stylesheet" href="{{asset('css/registro.css')}}" />
@endsection

@section("title", "Registro")


@section("main")
  <section class="container formularios__container" id="form-container">
    <h1 class="important-text my-3">Creá tu cuenta</h1>

      <form action="{{ route('register') }}" method="post" enctype="multipart/form-data" id="formularioRegistro" novalidate>
      @csrf
      {{-- errores de js --}}
      <div id="erroresAlEnviar"></div>
      <!-- Creacion de usuario y email -->

        <div class="form-group avatar__container">
          <label class="avatar__img_container" for="avatar">
            <img src="{{asset('img/perfil.png')}}" alt="avatar" class="avatar__img" >
            <p>Elegí un avatar</p>
          </label>
          <input type="file" name="avatar" id="avatar" class="avatar__input" required autocomplete ='avatar' id="avatar">
          <span class="error" aria-live="polite"></span>

          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="form-group">
          <label for="username">Nombre de Usuario</label>

          <input type="text"
          class="form-control @error('username') is-invalid @enderror"
          id="username"
          name="username"
          value="{{ old('username') }}"
          required autocomplete="username"
          />
          <span class="error" aria-live="polite"></span>

          @error('name')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror

        </div>
        <div class="form-group">
          <label for="email">{{ __('E-Mail Address') }}</label>

          <input type="email"
          id="email"
          class="form-control @error('email') is-invalid @enderror"
          name="email"
          value="{{ old('email') }}"
          required autocomplete="email"
          />
          <span class="error" aria-live="polite"></span>

          @error('email')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
         @enderror


        </div>

        <!-- Contraseñas -->

        <div class="form-group">
          <label for="password">Contraseña</label>

          <input type="password"
           id="password"
           class="form-control @error('password') is-invalid @enderror"
           name="password"
           required autocomplete="new-password"/>
           <span class="error" aria-live="polite"></span>
           @error('password')
           <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>
        <div class="form-group">
          <label for="repassword">Repetir Contraseña</label>

          <input type="password"
          id="password-confirm"
          class="form-control password-input"
          name="password_confirmation"
          required autocomplete="new-password"/>
          <span class="error" aria-live="polite"></span>

        </div>
        <div class="form-group buttons">
          <button type="submit"
          class="col col-md-auto col-lg-auto mb-3 btn btn-lg btn-primary"
          value="Registrarse"
           id="registracion">
            {{ __('Register') }}
           </button>

        </div>
        <a href="/login" class="col col-md-auto col-lg-auto mb-3 text-center fix-a" id="already-count">
          Ya tengo una cuenta
        </a>
      </form>
      <div class="">

      </div>
  </section>
@endsection
@section('script')
  <script src="{{asset('js/validar_formulario_registro.js')}}">

  </script>
@endsection
