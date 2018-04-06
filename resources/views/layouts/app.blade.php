<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Sistema Bancario</title>

    <!-- Styles -->
    <link href="{{ asset('css/materialize.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/materialize.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>
</head>
<body>
    <header>
        <nav>
        <div class="nav-wrapper ">
            <a href="/" class="brand-logo">&nbsp; Sistema Bancario</a>
            <a data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
            <ul class="right hide-on-med-and-down">
                @if(auth()->check())
                    
                    @if(auth()->user()->isClient())
                        <ul id="dpdItem" class="dropdown-content">
                            <li><a href="{{ route('cuentas.create') }}">Añadir <i class="material-icons">add</i></a></li>
                            <li><a href="{{ route('cuentas.index') }}">Listar <i class="material-icons">remove_red_eye</i></a></li>
                            <li class="divider"></li>
                            <li><a href="{{ route('cuentas.edit', ['id' => 1]) }}">Depositar <i class="material-icons">attach_money</i></a></li>
                            <li><a href="{{ route('cuentas.edit', ['id' => 0]) }}">Retirar <i class="material-icons">money_off</i></a></li>
                        </ul>
                        <li><a class="dropdown-trigger" id="dropA" data-target="dpdItem">Cuentas<i class="material-icons right">arrow_drop_down</i></a></li>
                    @else
<<<<<<< HEAD
                    <li><a href="{{-- url(strtolower(auth()->user()->userType->id)) --}}">Inicio <i class="material-icons">home</i></a></li>
=======
                        <ul id="dpdItem" class="dropdown-content">
                            <li><a href="{{ route('users.index') }}">Listar <i class=material-icons>remove_red_eye</i></a></li>
                        </ul>
                        <li><a class="dropdown-trigger" id="dropA" data-target="dpdItem">Usuarios<i class="material-icons right">arrow_drop_down</i></a></li>
                    @endif

                    <li><a onclick="event.preventDefault();document.getElementById('logout-form').submit();">Cerrar sesión <i class="material-icons left">exit_to_app</i></a></li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">{{ csrf_field() }}</form>
                @else
                    <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
>>>>>>> 1926cc2a711158e8ac3d6a646ed49eafb5172e58
                @endif
            </ul>
        </div>
    </nav>

    <ul class="sidenav" id="mobile-demo">
        <li><a href="sass.html">Sass</a></li>
        <li><a href="badges.html">Components</a></li>
        <li><a href="collapsible.html">Javascript</a></li>
        <li><a href="mobile.html">Mobile</a></li>
    </ul>
    </header>

    <main class="container">
        <br><br>
        @yield('content')
    </main>

</body>
</html>
