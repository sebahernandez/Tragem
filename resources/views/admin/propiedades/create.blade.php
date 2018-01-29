@extends('layouts.master_admin')

@section('css')
    @parent

    <link rel="stylesheet" href="{{ asset('back/filepicker/css/filepicker.css') }}">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCQ9YX_EAJZcastJ3HZ0VR3lN03ysnJY60"></script>
@endsection

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb push-down-0">
        <li><a href="#">Admin</a></li>
        <li><a href="#">Propiedades</a></li>
        <li class="active">Agregar</li>
    </ul>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
    
        <div class="row">
            <div class="col-md-12">                
                <form method="POST" action="{{ url('propiedades/store') }}" id="form-propiedades" name="form-propiedades" class="form-horizontal" 
                enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @include("admin.propiedades.form")
                </form>                
            </div>
        </div>                    
        
    </div>
    <!-- END PAGE CONTENT WRAPPER -->
@endsection

@section('js')
    @parent
    <script type='text/javascript' src='{{ asset('back/js/noty/jquery.noty.js') }}'></script>
    <script type='text/javascript' src='{{ asset('back/js/noty/layouts/center.js') }}'></script>
    <script type='text/javascript' src='{{ asset('back/js/noty/themes/default.js') }}'></script>

    <script type='text/javascript' src='{{ asset('back/js/icheck.min.js') }}'></script>

    <script src="{{ asset('back/filepicker/js/cropper.min.js') }}"></script>
    <script src="{{ asset('back/filepicker/js/filepicker.js') }}"></script>
    <script src="{{ asset('back/filepicker/js/filepicker-drop.js') }}"></script>
    <script src="{{ asset('back/filepicker/js/filepicker-crop.js') }}"></script>

    
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
            $("#region").change(function(){
                getProvincias();
            });

            $("#provincia").change(function(){
                getComunas();                 
            });
        });

        var getProvincias = function(){
            
           
            var formData =  {'id_region' : $("#region").val()};
            var url = root + '/getProvincias';

            $.ajax({
                url:url,
                type:'POST',
                data:formData,
                beforeSend: function() {
                    
                },
                success:function(data){                                                            
                            
                    if(data['type'] == 'error'){                               
                        noty({text: data['msj'], layout: 'center', type: 'error'});
                    }else{
                        $('#provincia').html('');
                        $("#provincia").append('<option value="">Seleccione una provincia</option>');
                        for(var i = 0; i < data['provincias'].length; i++){
                            $("#provincia").append('<option value="' + data['provincias'][i].id + '">' + data['provincias'][i].nombre + '</option>');
                        }
                        $('#provincia').trigger("chosen:updated");
                    }

                     
                },
                error: function (data) {
                    
                }
            });        
        }

        var getComunas = function(){
            
           
            var formData =  {'id_provincia' : $("#provincia").val()};
            var url = root + '/getComunas';

            $.ajax({
                url:url,
                type:'POST',
                data:formData,
                beforeSend: function() {
                },
                success:function(data){                                                            
                            
                    if(data['type'] == 'error'){   
                        noty({text: data['msj'], layout: 'center', type: 'error'});  
                    }else{
                        $('#comuna').html('');
                        $("#comuna").append('<option value="">Seleccione una comuna</option>');
                        for(var i = 0; i < data['comunas'].length; i++){
                            $("#comuna").append('<option value="' + data['comunas'][i].id + '">' + data['comunas'][i].nombre + '</option>');
                        }
                        $('#comuna').trigger("chosen:updated");
                    }

                },
                error: function (data) {
                }
            });        
        }

        function load_map() {
            var myLatlng = new google.maps.LatLng(-33.4726900, -70.6472400);
            var myOptions = {
                zoom: 7,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map($("#mapa").get(0), myOptions);
        }

        $("#buscar-coordenadas").click(function(){

            var dir = $("#direccion").val();
            var reg = $("#region :selected").text();
            var prov = $("#provincia :selected").text();
            var com = $("#comuna :selected").text();
            var direccion = dir +','+ com + ',' + prov + ',' + reg;

            $.ajax({
                url:root + '/obtener_coordenadas',
                    type:'POST',
                    data:{direccion:direccion},
                    beforeSend: function() {
                        $("#direccion").addClass("loading");
                    },
                    success:function(data){                                                           
                                
                        if(data['error'] == 0){                               
                            var latitud = data.latitud;
                            var longitud = data.longitud;
                            var localizacion = data.localizacion;
          
                            $("#lat").val(latitud);
                            $("#lon").val(longitud);
                            $("#_latitud").val(latitud);
                            $("#_longitud").val(longitud);
                            $("#direccionLocalizada").val(localizacion);

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

                        if(data['error'] == 1){
                            noty({text: 'No se encontraron resultados!!', layout: 'center', type: 'warning'});
                        }

                         setTimeout(function() {$("#direccion").removeClass("loading");}, 100);
                    },
                error: function (data) {
                    noty({text: 'Hubo un error en la busqueda de coordenadas!!', layout: 'center', type: 'error'});
                    setTimeout(function() {$("#direccion").removeClass("loading");}, 100);
                }
            });

        });
    </script>

    <script>
        var data_form = $("#form-propiedades");

        data_form.submit(function(e){
            e.preventDefault();
            var formData = new FormData(this);
            var url = $(this).attr('action');

                $.ajax({
                    url:url,
                    type:'POST',
                    data:formData,
                    contentType: false,
                    cache: false,
                    processData:false,
                    beforeSend: function() {
                        $("#btn_guardar").addClass("loading");
                    },
                    success:function(data){                                                             
                                
                        if(data['type'] == 'error'){ 
                            noty({text: data['msj'], layout: 'center', type: 'error'});
                        }else{
                            noty({text: data['msj'], layout: 'center', type: 'success'});
                            $('input[type!="submit"]').each(function(i, e) {
                                  if (e.type == 'text'){
                                      e.value = '';
                                  }
                                  if (e.type == 'textarea'){
                                      e.value = '';
                                  }

                                  $('#links').html('');
                                  $('#nombre').val('');
                                  $('#descripcion').text('');
                                  $('#descripcion').val('');
                                  $('#descripcion').html('');
                                  $('#habitaciones').val(0);
                                  $('#banios').val(0);
                                  $('#garages').val(0);
                                  $('#superficie').val('');
                                  $('#precio').val(0);
                                  $('#adds').val('-1');
                                  $('#deletes').val('-1');
                              })
                        }

                         setTimeout(function() {$("#btn_guardar").removeClass("loading");}, 100);
                    },
                    error: function (data) {
                        var lista_errores="";
                        var errors = $.parseJSON(data.responseText);

                        $.each(errors,function(index, value) {
                            lista_errores+=value;
                        });
                        
                        noty({text: lista_errores, layout: 'center', type: 'error'});
                        setTimeout(function() {$("#btn_guardar").removeClass("loading");}, 100);
                    }
                });
           
        });
    </script>

    <script>
        $("#btn-upload").change(function(){ 
            $("#btn-upload").addClass("loading"); 
        });

        $('#filepicker').filePicker({
            url: root +'/filepicker',
            acceptedFiles: /(\.|\/)(gif|jpe?g|png)$/i,
            plugins: ['ui','drop', 'crop'],
            data: {_token: "{{ csrf_token() }}"},
            crop: {
                aspectRatio: 1, // Square
            }
        })
        .on('done.filepicker', function (e, data) {
            var list = $('#links');
            var files = data.files;
            // Iterate through the uploaded files
            $.each(files, function (i, file) {

                if (file.error) {
                    list.append('<li>' + file.name + ' - ' + file.error + '</li>');
                } else {
                    var nombre = "'"+file.name+"'";
                    var num = Math.floor(Math.random() * 110);
                    var url = '{{ url('public/img/propiedades/thumb') }}' ;
                    var path = url +'/'+file.name;
                    list.append('<div class="col-md-3 col-xs-12 col-sm-3" align="center" id="img-upload'+num+'" style="margin-top: 10px">'+
                                '<img src="'+ path +
                                '" class="img-responsive" style="height: 150px;width: auto;" title="'+file.name+'">'+
                                '<input type="hidden" value="'+nombre+'" name="feature_images_'+num+'">'+
                                '<a href="javascript:;" onclick="quitarimg('+nombre+','+num+')">'+
                                '<button type="button" class="btn btn-primary" style="margin-top: 15px"><span class="fa fa-trash-o"'+
                                'id="delete'+num+'">'+
                                '</span> Eliminar</button></a><label class="radio-label"><input type="radio"  name="img_destacada" '+
                                '  value='+nombre+'  id="r'+num+'"/> Destacada </label></div> ');
                    var imgs_adds = $('#adds').val();
                    $('#adds').val(imgs_adds+','+num);
                }
            });

            setTimeout(function() {$("#btn-upload").removeClass("loading");}, 100);
        })
        .on('fail.filepicker', function () {
            alert('Oops! Ocurrio algún error.');
        });
    </script>

    <script type="text/javascript">
        function quitarimg(nombre,num)
        {
             $.ajax({
                url:root + '/delete-img-propiedad',
                type:'POST',
                data:{nombre:nombre },
                beforeSend: function() {
                    $("#delete"+num).addClass("loading");
                },
                success:function(data){ 
                    setTimeout(function() {$("#delete"+num).removeClass("loading");}, 100);
                    var imgs_deleted = $('#deletes').val();
                    $('#deletes').val(imgs_deleted+','+num);
                    $("#img-upload"+num).fadeOut(400,function(){});
                    var element = document.getElementById("img-upload"+num);
                    element.parentNode.removeChild(element);
                },
                error: function (data) {
                    setTimeout(function() {$("#delete"+num).removeClass("loading");}, 100);
                }
            });
            
        }
    </script>
    
@stop