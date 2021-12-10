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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    
</head>
<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar-->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">TemploGym</div>
            <div class="list-group list-group-flush">
                <a class="list-group-item list-group-item-action bg-light" href="{{ url('/') }}">DASHBOARD</a>
            @can('admin.empleado.index')
                <a class="list-group-item list-group-item-action bg-light" href="{{ url('empleado') }}">Empleados</a>
            @endcan

            @can('admin.cliente.index')
                <a class="list-group-item list-group-item-action bg-light" href="{{ url('cliente') }}">Clientes</a>
            @endcan 

            @can('admin.users.index')
                <a class="list-group-item list-group-item-action bg-light" href="{{ url('users') }}">Usuario</a>
            @endcan  

            @can('admin.roles.index')
                <a class="list-group-item list-group-item-action bg-light" href="{{ url('roles') }}">Lista de Roles</a>
            @endcan                 
                
            @can('admin.area.index')
                <a class="list-group-item list-group-item-action bg-light" href="{{ url('area') }}">Area</a>
            @endcan 
               
            @can('admin.membresia.index')
                <a class="list-group-item list-group-item-action bg-light" href="{{ url('membresia') }}">Membresia</a>
            @endcan 
                
            @can('admin.producto.index')
                <a class="list-group-item list-group-item-action bg-light" href="{{ url('producto') }}">Producto</a>
            @endcan 
                
            @can('admin.venta.index')
                <a class="list-group-item list-group-item-action bg-light" href="{{ url('venta') }}">Venta</a>
            @endcan 

            @can('admin.asistencia.index')
                <a class="list-group-item list-group-item-action bg-light" href="{{ url('asistencia') }}">lista Asistencia Empleados</a>
            @endcan  

            @can('admin.asistencia_cliente.index')
                <a class="list-group-item list-group-item-action bg-light" href="{{ url('asistencia_cliente') }}">lista Asistencia cliente</a>
            @endcan

                <a class="list-group-item list-group-item-action bg-light" href="{{ url('reporte/reports_day') }}">Reporte por dia</a>
                <a class="list-group-item list-group-item-action bg-light" href="{{ url('reporte/reports_date') }}">Reporte por mes</a>
             
   
            </div>
        </div>
        <!-- Page Content-->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <button class="btn btn-primary" id="menu-toggle">Menu</button>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

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
            </nav>
            <main class="py-4">
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Bootstrap core JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('js/scripts.js') }}"></script>    
    </body>
</html>
