@extends('layouts.master_admin')

@section('content')
     <!-- START BREADCRUMB -->
    <ul class="breadcrumb push-down-0">
        <li><a href="#">Home</a></li>
        <li><a href="#">Página de error</a></li>
        <li class="active">Error de acceso</li>
    </ul>
    <!-- END BREADCRUMB -->                                                

    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <div class="error-container">
                    <div class="error-code">422</div>
                    <div class="error-text">No tiene permitido realizar esta actividad.</div>
                    <div class="error-subtext">Unfortunately we're having trouble loading the page you are looking for. Please wait a moment and try again or use action below.</div>
                    <div class="error-actions">                                
                        <div class="row">
                            <div class="col-md-6">
                                <a class="btn btn-info btn-block btn-lg" href="{{ route('propiedades') }}">Regresar a mis propiedads</a>
                            </div>
                            <div class="col-md-6">
                                <button class="btn btn-primary btn-block btn-lg" onClick="history.back();">Ir a página anterior</button>
                            </div>
                        </div>                                
                    </div>
                </div>

            </div>
        </div>
        
                                                            
    </div>                
    <!-- END PAGE CONTENT WRAPPER -->
    
@endsection

@section('js')
	@parent
	
@stop