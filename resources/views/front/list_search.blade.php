<div class="insert_by_ajax">
    <div class="container">
        <div class="row mb-4">
            <div class="col-12 col-sm-12 col-md-12 center">
                <h2>Propiedades</h2>
                <p>En Move And Life seleccionamos las mejores propiedades para ti.</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            @foreach ($propiedades as $p)
                <div class="pb-4 col-sm-12 col-md-4"> 
                    <a href="{{ url('detalles-de-la-propiedad') }}/{{$p->id}}" style="text-decoration: none">     
                        <div class="card">
                            <div class="titulo">
                                {{$p->nombre}}
                            </div>
                            @if($p->clase == 'arriendo')
                                <div class="propiedad-arriendo-label">
                                    <h5>@if($p->arrendada)Arrendada @else Arriendo @endif</h5>
                                </div>
                            @endif
                            <?php   
                            if($p->img_destacada != ''){
                                $img_destacada=$p->img_destacada;
                            }else{
                                $img_destacada=json_decode($p->features, true)['images'][0];
                            }

                            if(!file_exists('public/img/propiedades/thumb/'.$img_destacada)){ $img_destacada = 'no-image.png';}
                        ?>

                        <img class="card-img-top" 
                             src="{{ asset('public/img/propiedades/thumb') }}/{{$img_destacada}}" 
                             alt="{{$p->nombre}}">
                            <div class="card-block">
                                <h4 class="card-title">
                                    {{$p->direccion}},{{$p->comuna->nombre}}
                                </h4>  

                                <p class="card-text">
                                    {{str_limit($p->descripcion,100)}}
                                </p>

                                <div id="price">
                                    UF {{number_format ( $p->precio , 0 , "," , "." ) }}
                                </div>

                                <div class="caracteristicas d-flex justify-content-between">
                                    <i class="fa fa-bed fa-lg" aria-hidden="true"> {{$p->habitaciones}}</i>
                                    <i class="fa fa fa-bath fa-lg" aria-hidden="true"> {{$p->banios}} </i>
                                    <i class="fa fa fa-car fa-lg" aria-hidden="true"> {{$p->garages}} </i>
                                </div>              
                            </div>
                        </div>                        
                    </a>
                </div>
            @endforeach        
        </div> <!-- fin row propiedades -->

        <nav aria-label="Page navigation example">
             {!! $propiedades->appends(Request::only(['clase','habitaciones','banios','garages']))->render() !!}
        </nav>
    </div><!-- fin container propiedades premium -->
</div>