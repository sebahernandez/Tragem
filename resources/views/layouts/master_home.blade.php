<!doctype html>
<html lang="es">
  <head>
    <title>TRAGEM | PROPIEDADES</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ asset('favicon/favicon.ico') }}" type="image/x-icon" />

    @section('css')  
      <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
      <link rel="stylesheet" href="{{ asset('css/main.css') }}">
      <link href="https://fonts.googleapis.com/css?family=Shrikhand" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Satisfy" rel="stylesheet">
      <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
    @show 
        <script>
            window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
            ]); ?>

            var root = "{{ url('') }}";
        </script> 
  </head>
  <body>
    <!-- barra de navegación fija -->
      <nav class="navbar navbar-toggleable-md  navbar-light fixed-top ">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="#" style="color:white;"><img src="{{ asset('img/logo-tragem-oficial.png') }}"></a>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">Inicio<span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="nosotros.html">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="propiedades.html">Propiedades</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="remates.html">Remates</a>
                </li>
              <li class="nav-item">
                  <a class="nav-link" href="contacto.html">Contacto</a>
                </li>
              
            </ul>
          </div>
      </nav>
<!-- barra de navegación fija -->

    @yield('content')

    <!-- footer -->
     <footer class="mt-5">
      <div class="container">
        <div class="row">

          <div class="col-xs-12 col-md-4 col-ls-4" style="color:white;">

            <div><a class="navbar-brand" href="#" style="color:rgb(255, 255, 255);"><img src="{{ asset('img/logo-tragem-oficial.png') }}"></a></div>
            <i class="fab fa-whatsapp" style="color:white;"></i> +56 9 7774 0087.<br>
            <i class="far fa-envelope"></i> contacto@tragem.cl


          </div>

          <div class="col-xs-12 col-md-4 col-ls-4">

              <ul class="texto-final">
                  <li>Remates</li>
                  <li>Propiedades</li>
                  <li>Arriendos</li>
                </ul>

          </div>

          <div class="col-xs-12 col-md-4 col-ls-4">

              <ul class="texto-final">
                  <li>Corretaje de propiedades</li>
                  <li>Tasaciones</li>
                  <li>Administración de inmuebles</li>
                </ul>



          </div>


        </div>
      </div>
      <div class="container">
        <div class="row mt-5">
          <div class="col-12">
            Tragem Ltda 2018 @Todos los derechos reservados.
          </div>
        </div>
      </div>
    </footer>  
    <!-- fin footer -->     
    @section('js') 
      <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
      <script src="{{ asset('js/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/main.js') }}"></script>

    @show 
  </body>
</html>

