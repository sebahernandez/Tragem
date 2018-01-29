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