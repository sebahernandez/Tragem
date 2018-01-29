@extends('layouts.master_admin')

@section('content')
	<!-- START BREADCRUMB -->
    <ul class="breadcrumb push-down-0">
        <li><a href="#">Admin</a></li>
        <li><a href="#">Propiedades</a></li>
        <li class="active">Listado</li>
    </ul>
    <!-- END BREADCRUMB --> 

    <!-- START CONTENT FRAME -->
    <div class="content-frame">   
        
        <!-- START CONTENT FRAME TOP -->
        <div class="content-frame-top">                        
            <div class="page-title">                    
                <h2><span class="fa fa-home"></span> Propiedades @if (isset($agentes))
                     de agentes
                @endif</h2>
            </div>                                      
            <div class="pull-right"> 
            	<a  href="{{ url('propiedades/agregar') }}">                           
	                <button class="btn btn-primary">
	                	<span class="fa fa-plus"></span> Agregar nueva propiedad
	                </button>
	            </a>
            </div>                         
        </div>
    
        <!-- START CONTENT FRAME BODY -->
        <div class="content-frame-body content-frame-body-left"> 
            <div class="pull-left push-up-10" >
               <div class="dropdown pull-left">
                    <button class="btn btn-sm btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <span class="glyphicon glyphicon-filter"></span>&nbsp;

                        @if (trim(\Request::get('filter'))!='')
                            Filtrado por  {{ucwords(\Request::get('filter')) }}
                        @else
                            Filtrar
                        @endif
                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                        <li><a href="{{ url('propiedades') }}">TODOS</a></li>
                        {{-- @if (isset($agentes))
                            @foreach ($agentes as $agente)
                                <li><a href="{{ url('propiedades-de-agentes') .'?filter=agente&idAgente='.$agente->id }}">
                                    {{$agente->name}}  ({{$agente->propiedades->count()}})</a></li>
                            @endforeach
                        @endif --}}
                        <li><a href="{{ url('propiedades') .'?filter=casa' }}">CASA</a></li>
                        <li><a href="{{ url('propiedades') .'?filter=arriendo' }}">ARRIENDO</a>
                        <li><a href="{{ url('propiedades') .'?filter=comercial' }}">COMERCIAL</a>
                        <li><a href="{{ url('propiedades') .'?filter=departamento' }}">DEPARTAMENTO</a>
                        <li><a href="{{ url('propiedades') .'?filter=terreno' }}">TERRENO</a>
                        <li style="background-color: #fbf5f5"><a href="{{ url('propiedades') .'?filter=destacada' }}">DESTACADAS</a>
                    </ul>
                </div>
            </div>           
            <div class="insert_by_ajax"> 
                <div class="pull-right">
                    
                    {!! $propiedades->appends(Request::only(['filter']))->render() !!}
                </div>
                
                <div class="gallery" >
                    <?php $i = 0;?>
                    @foreach ($propiedades as $propiedad) 

                        <?php 
                              
                            if($propiedad->img_destacada != ''){
                                $img_destacada=$propiedad->img_destacada;
                            }else{
                                $img_destacada=json_decode($propiedad->features, true)['images'][0];
                            }

                            if(!file_exists('public/img/propiedades/thumb/'.$img_destacada)){ $img_destacada = 'no-image.png';}
                        ?>
                        @if($i == 0 || $i==3) <div class='row'> @endif

                        <?php if($i == 4) {$i =0;} else {$i++;}?>
                        <div class="gallery-item" id="item{{$propiedad->id}}">
                            <a  id="links" href="{{ asset('public/img/propiedades') }}/{{$img_destacada}}" title="{{ $propiedad->nombre }} - UF {{ $propiedad->precio }}" data-gallery style="text-decoration: none">
                                <div class="image">                              
                                    <img src="{{ asset('public/img/propiedades/thumb') }}/{{$img_destacada}}" alt="{{ $propiedad->nombre }}"/>                                        
                                    <ul class="gallery-item-controls">
                                        <li><span ><i class="fa fa-image"></i></span></li>
                                    </ul>                                                                    
                                </div>
                            </a> 
                            <div class="meta">
                                <strong style="margin-bottom: 10px">{{ $propiedad->nombre }}</strong>
                                @if ($propiedad->estado)
                                    <span class="label label-success" style="font-weight: bold;color: #fff">
                                        ACTIVO &nbsp;&nbsp;-&nbsp;&nbsp;{{strtoupper($propiedad->tipo)}}&nbsp;&nbsp;-&nbsp;&nbsp;{{strtoupper($propiedad->clase)}}
                                    </span>
                                @endif
                                @if (!$propiedad->estado)
                                    <span class="label label-danger" style="font-weight: bold;color: #fff">
                                        INACTIVO &nbsp;&nbsp;-&nbsp;&nbsp;{{strtoupper($propiedad->tipo)}}&nbsp;&nbsp;-&nbsp;&nbsp;{{strtoupper($propiedad->clase)}}
                                    </span>
                                @endif
                                <span style="padding-top: 10px; color: black; font-size: 14px">
                                    <i class="fa fa-bed" aria-hidden="true" ></i> &nbsp;{{$propiedad->habitaciones}}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                    
                                    <i class="fa fa-shower" aria-hidden="true"></i> &nbsp;{{$propiedad->banios}}
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                                    
                                    <i class="fa fa-car" aria-hidden="true"></i> &nbsp;{{$propiedad->garages}}
                                </span>
                                <span style="font-size: 16px; font-weight: bold;margin-top: 15px;">
                                    UF {{ $propiedad->precio }}
                                    @if($propiedad->clase === "arriendo")
                                        <label style="margin-bottom: 0px !important;margin-left: 15px;">
                                            <input type="checkbox" onclick="arrienda({{$propiedad->id}})" @if($propiedad->arrendada) checked @endif> Arrendada
                                        </label>
                                    @endif
                                </span>
                            </div>                                
                            
                            <div class="btn-group" style="padding-top: 10px; text-align: center;" >
                                <a href="{{ url('propiedades/edit') }}/{{ $propiedad->id }}">
                                    <button class="btn btn-primary"><span class="fa fa-pencil"></span> Editar </button>
                                </a>
                                
                                <a  href="javascript:;" onclick="delete_propiedad({{$propiedad->id}})" >
                                    <button type="button" class="btn btn-primary" id="btn-eliminar-{{$propiedad->id}}">
                                        <span class="fa fa-trash"></span> Eliminar &nbsp;
                                    </button>
                                </a>
                                
                            </div>                        
                        </div>  
                        @if($i==4) </div> @endif    
                    @endforeach                                      
                </div> 
            </div>              
        </div>       
        <!-- END CONTENT FRAME BODY -->
    </div>               
    <!-- END CONTENT FRAME -->

    <!-- BLUEIMP GALLERY -->
        <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
            <div class="slides"></div>
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
        </div>      
        <!-- END BLUEIMP GALLERY -->
@endsection

@section('js')
	@parent
	<script type="text/javascript" src="{{ asset('back/js/blueimp/jquery.blueimp-gallery.min.js') }}"></script>
    <script type='text/javascript' src='{{ asset('back/js/noty/jquery.noty.js') }}'></script>
    <script type='text/javascript' src='{{ asset('back/js/noty/layouts/center.js') }}'></script>
    <script type='text/javascript' src='{{ asset('back/js/noty/themes/default.js') }}'></script>

    <script type="text/javascript">
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        }); 
    </script>

	<script>            
        document.getElementById('links').onclick = function (event) {
            event = event || window.event;
            var target = event.target || event.srcElement;
            var link = target.src ? target.parentNode : target;
            var options = {index: link, event: event,onclosed: function(){
                    setTimeout(function(){
                        $("body").css("overflow","");
                    },200);                        
                }};
            var links = this.getElementsByTagName('a');
            blueimp.Gallery(links, options);
        };
    </script> 

    <script type="text/javascript">
        $(document).on('click','.pagination a',function(e){
            e.preventDefault();
            var link = $(this);
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
                }
            });
        });
    </script>

    <script type="text/javascript">
        function delete_propiedad(id)
        {
            var url = root + '/eliminar-propiedad';

            $.ajax({
                url:url,
                type:'POST',
                data:{id:id},               
                beforeSend: function() {
                    $("#btn-eliminar-"+id).addClass("loading");
                },
                success:function(data){                                                             
                            
                    if(data['type'] == 'error'){ 
                        noty({text: data['msj'], layout: 'center', type: 'error'});
                    }else{
                        noty({text: data['msj'], layout: 'center', type: 'success'});
                        $('#item'+id).css({
                            display: "none",
                            visibility: "hidden"
                        });
                    }

                     setTimeout(function() {$("#btn-eliminar-"+id).removeClass("loading");}, 100);
                },
                error: function (data) {
                    var lista_errores="";
                    var errors = $.parseJSON(data.responseText);

                    $.each(errors,function(index, value) {
                        lista_errores+=value;
                    });
                    
                    noty({text: lista_errores, layout: 'center', type: 'error'});
                    setTimeout(function() {$("#btn-eliminar-"+id).removeClass("loading");}, 100);
                }
            });
        }

        function arrienda(id)
        {
            var url = root + '/arrienda-propiedad';

            $.ajax({
                url:url,
                type:'POST',
                data:{id:id},               
                beforeSend: function() {
                   
                },
                success:function(data){                                                             
                            
                    if(data['type'] == 'error'){ 
                        noty({text: data['msj'], layout: 'center', type: 'error'});
                    }else{
                        noty({text: data['msj'], layout: 'center', type: 'success'});
                    }
                },
                error: function (data) {
                    var lista_errores="";
                    var errors = $.parseJSON(data.responseText);

                    $.each(errors,function(index, value) {
                        lista_errores+=value;
                    });
                    
                    noty({text: lista_errores, layout: 'center', type: 'error'});
                }
            });
        }
    </script>
@stop