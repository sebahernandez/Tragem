@extends('layouts.master_admin')

@section('css')
    @parent
@endsection

@section('content')
 <!-- START BREADCRUMB -->
    <ul class="breadcrumb push-down-0">
        <li><a href="#">Admin</a></li>
        <li><a href="#">Usuarios</a></li>
        <li class="active">Listado</li>
    </ul>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="content-frame">
    	<div class="content-frame-top">                        
            <div class="page-title">                    
                <h2><span class="fa fa-users"></span> Usuarios</h2>
            </div>                                      
            <div class="pull-right"> 
            	<a  href="{{ route('usuario.create') }}">                           
	                <button class="btn btn-primary">
	                	<span class="fa fa-plus"></span> Agregar nuevo usuario.
	                </button>
	            </a>
            </div>                         
        </div>
		<!-- START RESPONSIVE TABLES -->
		<div class="row">
		    <div class="col-md-12">
		        <div class="panel panel-default">

		        	<div class="panel-heading">
                        <h3 class="panel-title">Listado de usuarios del sistema</h3>
                    </div>

		            <div class="panel-body panel-body-table">

		                <div class="table-responsive">
		                    <table class="table table-bordered table-striped table-actions">
		                        <thead>
		                            <tr>
		                                <th width="50">Id</th>
		                                <th>NOMBRE</th>
		                                <th width="100">EMAIL</th>
		                                <th width="100">ESTADO</th>
		                                <th width="100">ROL</th>
		                                <th width="150">ACCIONES</th>
		                            </tr>
		                        </thead>
		                        <tbody>
		                        	@foreach ($usuarios as $usuario)
                                    	<tr id="trow_{{$usuario->id}}">
			                                <td class="text-center">
			                                	{{$usuario->id}}
			                                </td>
			                                <td>
			                                	<strong>{{$usuario->name}}</strong>
			                                </td>
			                                <td>
			                                	{{$usuario->email}}
			                                </td>
			                                <td>
			                                	@if ($usuario->activo)
			                                		<span class="label label-success">ACTIVO</span>
			                                	@else
			                                		<span class="label label-danger">INACIVO</span>
			                                	@endif
			                                </td>

			                                <td>
			                                	@if ($usuario->rol == 'admin')
			                                		<span class="label label-info">ADMINISTRADOR</span>
			                                	@else
			                                		<span class="label label-agente">AGENTE</span>
			                                	@endif
			                                </td>
			                                <td>
			                                    <a href="{{ route('usuario.edit',$usuario->id)}}" class="btn btn-default btn-rounded btn-sm">
			                                    	<span class="fa fa-pencil"></span>
			                                    </a>
			                                    <a  href="javascript:;" class="btn btn-danger btn-rounded btn-sm" onClick="delete_usuario({{$usuario->id}});">
			                                    	<span class="fa fa-times"></span>
			                                    </a>
			                                </td>
			                            </tr>
                                    @endforeach 
		                        </tbody>
		                    </table>
		                </div>                                

		            </div>
		        </div>                                                

		    </div>
		</div>

		<!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-remove-row">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span> Eliminar el <strong>usuario</strong> ?</div>
                    <div class="mb-content">
                        <p>Está seguro de eliminar el usuario?</p>                    
                        <p>Presione SI para confirmar!!.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <button class="btn btn-success btn-lg mb-control-yes">SI</button>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX--> 
		<!-- END RESPONSIVE TABLES -->
	</div>
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

        function delete_usuario(id){
        
	        var box = $("#mb-remove-row");
	        box.addClass("open");
	        
	        box.find(".mb-control-yes").on("click",function(){
	            box.removeClass("open");
	            eliminar(id);
	            $("#trow_"+id).hide("slow",function(){
	                $(this).remove();
	            });
	        });
	        
	    }

	    function eliminar(id)
        {
            var url = root + '/eliminar-usuario';

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
                        $('#item'+id).css({
                            display: "none",
                            visibility: "hidden"
                        });
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