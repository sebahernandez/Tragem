@extends('layouts.master_home')

@section('content')
  <section class="front">      
    <div class="container">           
      <div class="row align-items-center d-flex justify-content-center front_intro">
        <div class="col-md-12 col-sm-12 text-center">
          <h1>La oportunidad de tener la casa <br>de tus sueños<br>  
            <button class="btn btn-danger">VER PROPIEDADES</button>
          </h1>        
        </div>
      </div>
    </div>
  </section>

  <section class="buscador">
    <div class="container">
      <div class="row">
        <div class="col-md-9 no-gutters">
          <div class="input-group">
            <span class="input-group-btn">
              <button class="btn btn-secondary" type="button">Buscar</button>
            </span>
            <input type="text" class="form-control" placeholder="Ingresa tu comuna o región">
          </div>
        </div>
        <div class="col-lg-3 d-flex flex-row-reverse">
          <i class="fab fa-facebook fa-2x"></i>  <i class="fab fa-instagram fa-2x"></i>                
        </div>
      </div>
    </div>
  </section>
    
    @include('front.propiedades_destacadas',$propiedades_destacadas)

    <ul class="pagination">
  
  <li class="page-item"><a class="page-link" href="#">Anterior</a></li>
  <li class="page-item active"><a class="page-link" href="#">1</a></li>
  <li class="page-item"><a class="page-link" href="#">2</a></li>
  <li class="page-item"><a class="page-link" href="#">3</a></li>
  <li class="page-item"><a class="page-link" href="#">4</a></li>
  <li class="page-item"><a class="page-link" href="#">5</a></li>
  <li class="page-item"><a class="page-link" href="#">Siguiente</a></li>
</ul>
  
  <div class="container-fluid">
    <div class="row mt-5">
      <div class="text-xs-center" style="color: #fff; background-color: #f05234; min-height: 100px; padding: 65px; text-align:center">
        <p class="lead" style="font-size: 1.8rem;">
          Porque sabemos que encontrar tu casa ideal no es fácil,  Te ayudamos con las mejores propuestas del mercado inmobiliario.
          Somos tu mejor alternativa de la zona. Arrienda,  Vende, y  publica con nosotros.
        </p>
      </div>
    </div>
  </div>

    @include('front.propiedades_arriendos',$propiedades_arriendos)
    
    @include('front.blog_home',$propiedades_arriendos)

@endsection

@section('js')
  @parent
  <script type='text/javascript' src='{{ asset('back/js/noty/jquery.noty.js') }}'></script>
  <script type='text/javascript' src='{{ asset('back/js/noty/layouts/center.js') }}'></script>
  <script type='text/javascript' src='{{ asset('back/js/noty/themes/default.js') }}'></script>
  <script type="text/javascript">
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      }); 

      $(document).ready(function() {
        iniciar_carousel();
      });

      function iniciar_carousel()
      {
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items:3,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:3000,
            autoplayHoverPause:false,
            nav: true,
        });
      }
        
  </script>

  <script type="text/javascript">
        $(document).on('click','.pagination a',function(e){
            e.preventDefault();
            var link = $(this);
            console.log(link);
            var page = $(this).attr('href').split('page=')[1];
            var url =  $(this).attr('href').split('page=')[0];
            var route = url+'page='+page;
            $.ajax({
                url: route,
                data: {page: page},
                type: 'GET',
                dataType: 'json',
                beforeSend: function() {
                    link.addClass("loading");
                },
                success: function(data){
                    $(".insert_by_ajax").html(data);
                    setTimeout(function() {link.removeClass("loading");}, 100);
                    iniciar_carousel();
                }
            });
        });
  </script>

  <script>
        var data_form = $("#form-search");

        data_form.submit(function(e){
            e.preventDefault();
            var formData = data_form.serialize();
            var url = $(this).attr('action');

                $.ajax({
                    url:url,
                    type:'POST',
                    data:formData,
                    beforeSend: function() {
                        $("#btn-search").addClass("loading");
                    },
                    success:function(data){                                                             
                                
                        if(data['type'] == 'error'){ 
                            noty({text: data['msj'], layout: 'center', type: 'error'});
                        }else{
                            $(".insert_by_ajax_list_search").html(data);
                        }

                         setTimeout(function() {$("#btn-search").removeClass("loading");}, 100);
                    },
                    error: function (data) {
                        var lista_errores="";
                        var errors = $.parseJSON(data.responseText);

                        $.each(errors,function(index, value) {
                            lista_errores+=value;
                        });
                        
                        noty({text: lista_errores, layout: 'center', type: 'error'});
                        setTimeout(function() {$("#btn-search").removeClass("loading");}, 100);
                    }
                });
           
        });
    </script>
@stop
