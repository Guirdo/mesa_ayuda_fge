<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sideBar" aria-controls="sideBar" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container-fluid">
            <div class="row">
                <nav id="sideBar" class="col-md-3 col-lg-2 d-md-block bg-light navbar-collapse collapse">
                    @if(Auth::user()->idTipoUsuario == 1)
                        <!-- Administrador -->

                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('solicitudes.create') }}" class="nav-link"><ion-icon name="add-circle-outline"></ion-icon>Registrar solicitud</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('users.index') }}" class="nav-link"><ion-icon name="people-circle-outline"></ion-icon>Gestion Usuarios</a>
                            </li>
                        </ul>

                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('empleados.index') }}" class="nav-link"><ion-icon name="briefcase-outline"></ion-icon>Gestion Empleados</a>
                            </li>
                        </ul>

                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('equipos.index') }}" class="nav-link"><ion-icon name="desktop-outline"></ion-icon>Gestion Equipos</a>
                            </li>
                        </ul>

                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('solicitudes.index')}}" class="nav-link"><ion-icon name="document-attach-outline"></ion-icon>Gestion Solicitudes</a>
                            </li>
                        </ul>
                    </div>
                    
                    @endif
                    @if (Auth::user()->idTipoUsuario == 2)
                    <!-- Soporte -->
                    
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('solicitudes.create') }}" class="nav-link"><ion-icon name="add-circle-outline"></ion-icon>Registrar solicitud</a>
                            </li>
                        </ul>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('solicitudes.index')}}" class="nav-link"><ion-icon name="document-attach-outline"></ion-icon>Gestion Solicitudes</a>
                            </li>
                        </ul>

                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a href="{{ route('equipos.index') }}" class="nav-link"><ion-icon name="desktop-outline"></ion-icon>Gestion Equipos</a>
                            </li>
                        </ul>
                    </div>
                        
                    @endif
                </nav>

                <main class="col-md-9 ml-sm-auto col-lg-10 px-md-2 py-md-4">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
    @yield('scripts')
</body>
</html>
