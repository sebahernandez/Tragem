@extends('layouts.master_home')

@section('css')
    @parent
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ9YX_EAJZcastJ3HZ0VR3lN03ysnJY60"></script>
@endsection

@section('content')

<div class="container" style="padding-top:100px;">
    <div class="row mt-5 no-gutters">
        <h1>{{$propiedad->nombre}} </h1>
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner" role="listbox">
                <?php $i = 0; ?> 
                @foreach (json_decode($propiedad->features, true)['images'] as $img)
                    @if(file_exists('public/img/propiedades/'.$img))
                        <div class="carousel-item @if($i == 0) active @endif"">
                            <img class="d-block img-fluid" 
                                 src="{{url('public/img/propiedades')}}/{{$img}}">
                        </div>
                    @endif
                    <?php $i++;?>                        
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 d-flex flex-wrap d-flex justify-content-between mt-5">
            <div class="direccion"> 
                <i class="fas fa-map-marker-alt"></i> {{$propiedad->direccion}},  {{$propiedad->comuna->nombre}}
            </div>
            <div> 
                <i class="fas fa-bed"></i>{{$propiedad->habitaciones}} | 
                <i class="fas fa-bath"></i>{{$propiedad->banios}} |
                <i class="fas fa-car"></i> {{$propiedad->garages}} | m2: {{$propiedad->superficie}}
            </div> 

        </div><!-- fin iconos -->

        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mt-5 d-flex justify-content-end">
            <div class="valor">UF {{number_format ( $propiedad->precio , 0 , "," , "." ) }}
        </div>
    </div>
</div><!-- fin row -->

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mt-5">
        <h4>Descripción</h4>
        <p>{{$propiedad->descripcion}}</p>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 mt-5 "  style="background-color: #f0f0f0;padding: 2px 55px 15px 55px">
        @include('front.formulario')
    </div>

  </div>
</div>

<div class="row">
    <div class="container">
        <div class="mt-4 col-md-12 col-xs-12 col-sm-12">
            <input type="hidden" name="direccion" id="direccion" value="{{$propiedad->direccion}}">
            <input type="hidden" name="region" id="region" value="{{$propiedad->region->nombre}}">
            <input type="hidden" name="provincia" id="provincia" value="{{$propiedad->provincia->nombre}}">
            <input type="hidden" name="comuna" id="comuna" value="{{$propiedad->comuna->nombre}}">
            <div style="width:100%; height:280px;" id="mapa"></div>
        </div>
    </div>
</div>
    

@endsection

@section('js')
  @parent
  <script type="text/javascript">
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        }); 
    </script>

    <script>
        $(document).ready(function() {
            load_map();
        });

        function load_map() {
            @if (isset($propiedad)&&isset($propiedad->lat)&&isset($propiedad->lon))
                mostrar_mapa();
            @else
                var myLatlng = new google.maps.LatLng(-33.4726900, -70.6472400);
                var myOptions = {
                    zoom: 7,
                    center: myLatlng,
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map($("#mapa").get(0), myOptions);
            @endif            
        }

        function mostrar_mapa()
        {
            var dir = $("#direccion").val();
            var reg = $("#region").val();
            var prov = $("#provincia").val();
            var com = $("#comuna").val();
            var direccion = dir.trim() +','+ com.trim() + ',' + prov.trim() + ',' + reg.trim();

            $.ajax({
                url:root + '/obtener-mapa',
                    type:'POST',
                    data:{direccion:direccion},
                    beforeSend: function() {
                        
                    },
                    success:function(data){                                                           
                                
                        if(data['error'] == 0){                               
                            var latitud = data.latitud;
                            var longitud = data.longitud;
                            var localizacion = data.localizacion;

                            var myOptions = {
                                zoom: 16,
                                center: new google.maps.LatLng(latitud, longitud),
                                mapTypeId: google.maps.MapTypeId.ROADMAP
                            };

                            map = new google.maps.Map(document.getElementById("mapa"), myOptions);

                            var marker = new google.maps.Marker({
                                map: map,
                                position: new google.maps.LatLng(latitud, longitud)
                            });

                            var infowindow = new google.maps.InfoWindow({
                                content: localizacion
                            });

                            marker.addListener(marker, "click", function () {

                                infowindow.open(map, marker);
                            });

                            infowindow.open(map, marker);
                        }
                    },
                error: function (data) {
                    
                }
            });
        }
    </script>
@stop
