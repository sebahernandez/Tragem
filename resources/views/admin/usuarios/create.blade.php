@extends('layouts.master_admin')

@section('css')
    @parent
@endsection

@section('content')
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb push-down-0">
        <li><a href="#">Admin</a></li>
        <li><a href="#">Usuarios</a></li>
        <li class="active">Agregar</li>
    </ul>
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
    
        <div class="row">
            <div class="col-md-12">                
                <form method="POST"  action="{{ route('register') }}" id="form-usuario" name="form-usuario" class="form-horizontal" >
                    {{ csrf_field() }}
                    @include("admin.usuarios.fields")
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

    
    <script type="text/javascript">
        $.ajaxSetup({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        }); 
    </script>    
@stop