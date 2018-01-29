<section>
    <div class="container">
        <h1 class="mt-5">Propiedades  en Arriendo</h1>
        <div class="row mt-5">
            @foreach ($propiedades_arriendos as $p)
                 <div class="col-md-6 col-sm-6 col-lg-3">
                    <div class="card">

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
                            <a href="{{ url('detalles-de-la-propiedad') }}/{{$p->id}}">
                                <strong class="card-title">{{$p->nombre}}</strong>
                            </a>                 
                        </div>
                        <ul class="list-group list-group-flush">
                        
                            <li class="list-group-item"><i class="fas fa-map-marker-alt">
                                </i> &nbsp; {{$p->direccion}},{{$p->comuna->nombre}}
                            </li>
                            <li class="list-group-item"><img src="img/blueprint.png">&nbsp;{{$p->superficie}}</li>
                            <li class="list-group-item d-flex justify-content-between">
                                <i class="fas fa-bed"></i> {{$p->habitaciones}} 
                                <i class="fas fa-bath"></i> {{$p->banios}} 
                                <i class="fas fa-car"></i> {{$p->garages}}
                            </li>
                        </ul>
                        <div class="card-block">
                            <li class="list-group-item precio">UF {{$p->precio}}</li>             
                            <div class="d-flex justify-content-end  mt-4">
                                <i class="fas fa-share-alt"></i>                  
                             </div>             
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>