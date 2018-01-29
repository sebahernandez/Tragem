<!DOCTYPE html>
<html lang="es">
    <head>        
        <!-- META SECTION -->
        <title>Venta y arriendo de propiedades con servicio integral y personalizado.</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon/apple-icon-57x57.png')}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon/apple-icon-60x60.png')}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon/apple-icon-72x72.png')}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon/apple-icon-76x76.png')}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon/apple-icon-114x114.png')}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon/apple-icon-120x120.png')}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon/apple-icon-144x144.png')}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon/apple-icon-152x152.png')}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-icon-180x180.png')}}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset('favicon/android-icon-192x192.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon/favicon-96x96.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png')}}">
        <link rel="manifest" href="{{ asset('favicon/manifest.json')}}">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="{{ asset('favicon/ms-icon-144x144.png') }}">
        <meta name="theme-color" content="#ffffff">
        
        <link rel="icon" href="{{ asset('favicon/favicon.ico') }}" type="image/x-icon" />
        <!-- END META SECTION -->
        @section('css')
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="{{ asset('back/css/theme-default.css') }}"/>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- EOF CSS INCLUDE -->  
        @show   

        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>

            var root = "{{ url('') }}";
      </script>                               
    </head>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-logo">
                        <a href="index.html">Tragem</a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{{ asset('favicon/android-icon-48x48.png') }}" alt="Tragem"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{ asset('favicon/android-icon-144x144.png') }}" alt="Tragem"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{ Auth::user()->name }}</div>
                                <div class="profile-data-title">
                                    ADMINISTRADOR                                   
                                </div>
                            </div>
                            
                        </div>                                                                        
                    </li>
                    <li class="xn-title">MENÚ</li>
                    
                    <li>
                        <a href="{{ url('/home') }}">
                            <span class="fa fa-desktop"></span> 
                            <span class="xn-text">Inicio</span>
                        </a>
                    </li>

                    <li class="xn-openable ">
                        <a href="#">
                            <span class="fa fa-home"></span>
                            <span class="xn-text">Propiedades</span>
                        </a>
                        <ul>
                            <li class="active">
                                <a href="{{ url('propiedades') }}">
                                    <span class="fa fa-list"></span> Mis Propiedades
                                </a>
                            </li>
                           {{--  @if (Auth::user()->isAdmin())
                                <li>
                                    <a href="{{ route('propiedades.agente') }}">
                                        <span class="fa fa-user"></span> De agentes
                                    </a>
                                </li>
                            @endif --}}
                            <li>
                                <a href="{{ url('propiedades/agregar') }}">
                                    <span class="fa fa-plus"></span> Agregar
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="xn-openable ">
                        <a href="#">
                            <span class="fa fa-files-o"></span>
                            <span class="xn-text">Posts</span>
                        </a>
                        <ul>
                            <li class="active">
                                <a href="{{ route('posts') }}">
                                    <span class="fa fa-list"></span> Listado
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('post/nuevo') }}">
                                    <span class="fa fa-plus"></span> Nuevo
                                </a>
                            </li>

                        </ul>
                    </li>
                    
                    {{-- @if (Auth::user()->isAdmin())
                        <li class="xn-openable ">
                            <a href="#">
                                <span class="fa fa-users"></span>
                                <span class="xn-text">Usuarios</span>
                            </a>
                            <ul>
                                <li class="active">
                                    <a href="{{ url('usuarios') }}">
                                        <span class="fa fa-list"></span> Listado
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('usuario.create') }}">
                                        <span class="fa fa-plus"></span> Agregar
                                    </a>
                                </li>                           
                            </ul>
                        </li>
                    @endif --}}
                                        
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->
            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel">
                    <!-- TOGGLE NAVIGATION -->
                    <li class="xn-icon-button">
                        <a href="#" class="x-navigation-minimize"><span class="fa fa-dedent"></span></a>
                    </li>
                    <!-- END TOGGLE NAVIGATION -->
        
                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <form action="{{ url('/logout') }}" method="POST" role="form">
                            {{ csrf_field() }}
                            <button type="submit" class="button-logout" >
                                <span class="fa fa-sign-out"></span>
                            </button>
                        </form>                        
                    </li> 
                    <!-- END SIGN OUT -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     

                @yield('content')

            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
                 
    
    @section('js')  
        
    <!-- START SCRIPTS -->
        <!-- START THIS PAGE PLUGINS-->        
        <script type='text/javascript' src="{{ asset('back/js/todo.js') }}"></script>      
        <!-- START TEMPLATE -->       
        <script type="text/javascript" src="{{ asset('back/js/plugins.js') }}"></script>       
        <script type="text/javascript" src="{{ asset('back/js/actions.js') }}"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->
    @show         
    </body>
</html>






