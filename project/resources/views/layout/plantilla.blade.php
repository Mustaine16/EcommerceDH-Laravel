<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Alata|Quicksand:400,500,700&display=swap" rel="stylesheet" />

    <!-- Estilos Generales -->

    <link rel="stylesheet" href="{{asset('css/styles.css')}}" type="text/css" />

    <!-- Estilos particulares de la vista -->
    @yield("estilos")

    <!-- Title -->
    <title>@yield("title")</title>
</head>

<body>
    <!-- Header  -->
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-md navbar-dark">
            <a class="navbar-brand" href="/">
                <img src="{{asset('img/logo.png')}}" alt="Logo" class="logo__brand" style="width:100px;" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav text-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/catalogo">Catálogo</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/catalogo/marcas">Marcas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/faq">F.A.Q</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contacto">Contacto</a>
                    </li>
                </ul>

                <!-- Si el usuario esta logueado, puede ver el link del perfil -->

                @auth
                 <!-- Si el usuario esta flageado como admin o es admin  -->
                @if ( (Auth::user()->email) == 'admin@admin.com')

                <div class="nav-item dropdown perfil__icon">
                    <a class="nav-link dropdown-toggle text-center" id="navbardrop" data-toggle="dropdown" href="#">
                        <img src='{{asset("img/avatars/" . Auth::user()->avatar )}}' alt="Perfil" style="width:42px;"  class="rounded-circle"/>
                    </a>

                    <!-- ehh...magia de laravel? -->
                    <div class="dropdown-menu perfil__menu-desplegable">   
                        <a class="dropdown-item text-center p-3" href="/producto/admin">Productos</a>
                        <a class="dropdown-item text-center p-3" href="/marca/admin">Marcas</a>
                        <hr>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                        </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                        </form>
                    </div>
        
                  
                  
               
            
                @else

                 <!-- Si no es admin -->


                <div class="nav-item dropdown perfil__icon">
                    <a class="nav-link dropdown-toggle text-center" id="navbardrop" data-toggle="dropdown" href="#">
                        <img src='{{asset("img/avatars/" . Auth::user()->avatar )}}' alt="Perfil" style="width:46px;"  class="rounded-circle"/>
                    </a>

                    <!-- Magia de Laravel para Desloguear.. -->
                    <div class="dropdown-menu perfil__menu-desplegable">
                        <a class="dropdown-item" href="/perfil">Perfil</a>
                        <a class="dropdown-item" href="/carrito"><i class="fas fa-shopping-cart"></i>  Carrito</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                            </form>
                        </div>
                @endif

                @endauth


                        <!-- De lo contrario ve los links para loguearse o registrarse -->
                    @guest

                        <ul class="navbar-nav text-center ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="/login">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/register">Registrate</a>
                            </li>
                        </ul>

                    @endguest

                </div>
            </div>
        </nav>
        <!-- Boton entrar al catalogo, solo se muestra en el Home -->
        <a class="button_catalogo" href="/catalogo">Entrá al catálogo</a>
    </header>

    <!-- Main -->
    @yield("main")

    <!-- Footer -->
    <footer class="bg-dark">
        <div
            class="col-lg-10 pt-4 pb-4 text-center m-auto row flex-column flex-lg-row justify-content-between align-items-center">
            <div class="mx-auto p-2 text-white d-flex flex-column justify-content-center">
                <span class="font-weight-bold p-1">UBICACION</span>
                <span class=" p-1">Talcahuano 1382</span>
                <span class="p-1">Ciudad de Buenos Aires</span>
            </div>
            <div class="col-md-4 p-2 text-white social-media__container">
                <p class="font-weight-bold">REDES SOCIALES</p>
                <div class="social-media__icons">
                    <a class="text-white" href="#"><i
                            class="fab fa-facebook-f col-lg-2 col-md-2 col-3"></i></a>&nbsp;&nbsp;
                    <a class="text-white" href="#"><i
                            class="fab fa-google-plus-g col-lg-2 col-md-2 col-3"></i></a>&nbsp;&nbsp;<a
                        class="text-white" href="#"><i class="fab fa-twitter col-lg-2 col-md-2 col-3"></i></a>
                </div>
            </div>

            <div class="col-md-4 text-white horarios__container">
                <p class="font-weight-bold m-0 p-1">HORARIOS</p>
                <p class="m-0 p-1">Lu a Vie - 10 a 19hs.</p>
                <p class="m-0 p-1">Feriados: Cerrado.</p>
            </div>
        </div>
        <p class="bg-secondary pt-3 pb-3 m-0 text-white text-center">Copyright © Empresa 2019</p>
    </footer>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/2641c51c10.js" crossorigin="anonymous"></script>

    <!-- Script particular-->
    @yield("script")
</body>

</html>
