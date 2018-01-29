@extends('layouts.master_admin')

@section('content')
<!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>                    
        <li class="active">Dashboard</li>
    </ul>
    <!-- END BREADCRUMB --> 
    
    <!-- PAGE CONTENT WRAPPER -->
    <div class="page-content-wrap">
        <div class="row">
            <div class="col-md-3">
                
                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-default widget-item-icon">
                    <div class="widget-item-left">
                        <span class="fa fa-home"></span>
                    </div>                             
                    <div class="widget-data">
                        <div class="widget-int num-count">{{$total}}</div>
                        <div class="widget-title">Propiedades<br> totales</div>
                        <div class="widget-subtitle">Premium: {{$premium_activas + $premium_inactivas}} Classic: {{$classic_activas + $classic_inactivas}}</div>
                    </div>      
                    {{-- <div class="widget-controls">                                
                        <a href="#" class="widget-control-right" data-toggle="tooltip" data-placement="top" title="Ver todos los productos"><span class="glyphicon glyphicon-eye-open"></span></a>
                    </div> --}}
                </div>                            
                <!-- END WIDGET MESSAGES -->
                
            </div>
            <div class="col-md-3">
                
                <!-- START WIDGET MESSAGES -->
                <div class="widget widget-default widget-item-icon">
                    <div class="widget-item-left">
                        <span class="glyphicon glyphicon-ok-circle"></span>
                    </div>                             
                    <div class="widget-data">
                        <div class="widget-int num-count">{{$activas}}</div>
                        <div class="widget-title">Propiedades<br> activas</div>
                        <div class="widget-subtitle">Premium: {{$premium_activas}} Classic: {{$classic_activas}}</div>
                    </div>      
                    {{-- <div class="widget-controls">                                
                        <a href="#" class="widget-control-right" data-toggle="tooltip" data-placement="top" title="Ver productos activos"><span class="glyphicon glyphicon-eye-open"></span></a>
                    </div> --}}
                </div>                            
                <!-- END WIDGET MESSAGES -->
                
            </div>
            <div class="col-md-3">
                
                <!-- START WIDGET REGISTRED -->
                <div class="widget widget-default widget-item-icon">
                    <div class="widget-item-left">
                        <span class="glyphicon glyphicon-remove-circle"></span>
                    </div>
                    <div class="widget-data">
                        <div class="widget-int num-count">{{$inactivas}}</div>
                        <div class="widget-title">Propiedades<br> inactivas</div>
                        <div class="widget-subtitle">Premium: {{ $premium_inactivas}} Classic: {{$classic_inactivas}}</div>
                    </div>
                    {{-- <div class="widget-controls">                                
                        <a href="#" class="widget-control-right" data-toggle="tooltip" data-placement="top" title="Ver productos inactivos"><span class="glyphicon glyphicon-eye-open"></span></a>
                    </div>  --}}                           
                </div>                            
                <!-- END WIDGET REGISTRED -->
                
            </div>
            
            <div class="col-md-3">
                
                <!-- START WIDGET CLOCK -->
                <div class="widget widget-info widget-padding-sm">
                    <div class="widget-big-int plugin-clock">00:00</div>                            
                    <div class="widget-subtitle plugin-date">Loading...</div>
                    <div class="widget-controls">                                
                        <a href="#" class="widget-control-right widget-remove" data-toggle="tooltip" data-placement="left" title="Remove Widget"><span class="fa fa-times"></span></a>
                    </div>                            
                    <div class="widget-buttons widget-c3">
                        <div class="col">
                            <a href="#"><span class="fa fa-clock-o"></span></a>
                        </div>
                        <div class="col">
                            <a href="#"><span class="fa fa-bell"></span></a>
                        </div>
                        <div class="col">
                            <a href="#"><span class="fa fa-calendar"></span></a>
                        </div>
                    </div>                            
                </div>                        
                <!-- END WIDGET CLOCK -->
                
            </div>

            @if (Auth::user()->isAdmin())
                <div class="col-md-3">
                    
                    <!-- START WIDGET REGISTRED -->
                    <div class="widget widget-default widget-item-icon">
                        <div class="widget-item-left">
                            <span class="glyphicon glyphicon-user"></span>
                        </div>
                        <div class="widget-data">
                            <div class="widget-int num-count">{{$propiedades_de_agentes}}</div>
                            <div class="widget-title">Propiedades<br> de agentes</div>
                            <div class="widget-subtitle">
                                Premium: {{ $premium_agentes}} Classic: {{$classic_agentes}}
                            </div>
                        </div>
                        {{-- <div class="widget-controls">                                
                            <a href="#" class="widget-control-right" data-toggle="tooltip" data-placement="top" title="Ver productos inactivos"><span class="glyphicon glyphicon-eye-open"></span></a>
                        </div>  --}}                           
                    </div>                            
                    <!-- END WIDGET REGISTRED -->
                    
                </div>
            @endif
        </div>
    </div>
@endsection
