<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong>@if (isset($propiedad)) Editar la propiedad @else Agregar nueva propiedad @endif</strong></h3>
    </div>
    <br>
    <div class="panel-body">                                                                        
        
        <div class="row">            
            <div class="row">                            
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Nombre
                        </label>
                        <div class="col-md-9">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                <input type="text" class="form-control" name="nombre"   
                                @if(isset($propiedad)) value="{{$propiedad->nombre}}" @endif />
                            </div>                                            
                            <span class="help-block">Ingrese el nombre de la propiedad</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Descripción</label>
                        <div class="col-md-9 col-xs-12">                                            
                            <textarea class="form-control" rows="8" name="descripcion" id="descripcion" style="resize:none">@if(isset($propiedad)) {{$propiedad->descripcion}} @endif</textarea>
                            <span class="help-block">Ingrese una descripción de la propiedad</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Habitaciones
                        </label>
                        <div class="col-md-9">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-bed" aria-hidden="true"></i></span>
                                <input type="number" min="0"  step="1" class="form-control" name="habitaciones" 
                                @if(isset($propiedad)) value="{{$propiedad->habitaciones}}" @endif/>
                            </div>                                            
                            <span class="help-block">Ingrese la cantidad de habitaciones</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Baños
                        </label>
                        <div class="col-md-9">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-shower"></span></span>
                                <input type="number" min="0"  step="1" class="form-control" name="banios" 
                                @if(isset($propiedad)) value="{{$propiedad->banios}}" @endif/>
                            </div>                                            
                            <span class="help-block">Ingrese la cantidad de baños</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Estacionamientos
                        </label>
                        <div class="col-md-9">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-car"></span></span>
                                <input type="number" min="0"  step="1" class="form-control" name="garages" 
                                @if(isset($propiedad)) value="{{$propiedad->garages}}" @endif/>
                            </div>                                            
                            <span class="help-block">Ingrese la cantidad de estacionamientos</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Superficie total
                        </label>
                        <div class="col-md-9">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-area-chart"></span></span>
                                <input type="text" class="form-control" name="superficie" 
                                @if(isset($propiedad)) value="{{$propiedad->superficie}}" @endif/>
                            </div>                                            
                            <span class="help-block">Ingrese la superficie total de la propiedad</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Precio
                        </label>
                        <div class="col-md-9">                                            
                            <div class="input-group">
                                <span class="input-group-addon"><span class="fa fa-usd"></span></span>
                                <input type="number" min="0"  step="0.01" class="form-control" name="precio" 
                                @if(isset($propiedad)) value="{{$propiedad->precio}}" @endif/>
                            </div>                                            
                            <span class="help-block">Ingrese el precio de la propiedad</span>
                        </div>
                    </div>                    
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="col-md-3 control-label">Región</label>
                        <div class="col-md-9">
                            <select class="form-control select" name="region" id="region">
                                <option>Seleccione una region</option>
                                @foreach ($regiones as $region)
                                    <option value="{{$region->id}}" 
                                        @if(isset($propiedad)&&$propiedad->tbl_region_id == $region->id) selected @endif>
                                        {{$region->nombre}}
                                    </option>
                                @endforeach
                            </select>
                            <span class="help-block">Seleccione la region de la propiedad</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Provincia</label>
                        <div class="col-md-9">                                                                    
                            <select class="form-control select" name="provincia" id="provincia">
                                <option  @if(isset($propiedad)) value="{{$propiedad->tbl_provincia_id}}"  @endif>
                                    @if(isset($propiedad)) {{$propiedad->provincia->nombre}} @endif
                                </option>
                            </select>
                            <span class="help-block">Seleccione la provincia</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">Comuna</label>
                        <div class="col-md-9">                                                                    
                            <select class="form-control select" name="comuna" id="comuna">
                                <option  @if(isset($propiedad)) value="{{$propiedad->tbl_comuna_id}}"  @endif>
                                    @if(isset($propiedad)) {{$propiedad->comuna->nombre}} @endif
                                </option>
                            </select>
                            <span class="help-block">Seleccione la comuna</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-3 control-label">
                            Dirección
                        </label>
                        <div class="col-md-9" id="direccion_div">
                            <div class="input-group">
                              <input type="text" class="form-control" id="direccion" name="direccion" value="@if (isset($propiedad)){{$propiedad->direccion}} @endif" >
                              <span class="input-group-btn">
                                  <button type="button" class="btn btn-primary " id="buscar-coordenadas" >
                                    <i class="fa fa-search "></i>
                                  </button>
                              </span>
                            </div>
                            <input type="hidden" name="lat" id="lat" value="@if (isset($propiedad)){{$propiedad->lat}} @endif">
                            <input type="hidden" name="lon" id="lon" value="@if (isset($propiedad)){{$propiedad->lon}} @endif">
                            <span class="help-block" id="direccionLocalizada">Ingrese la dirección y luego presione la lupa</span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-10 col-md-offset-2 col-sm-10 col-xs-10" style="border: 1px solid #000">
                            <div style="width:100%; height:180px;" id="mapa"></div>
                        </div>
                    </div>                              
                    {{-- @if (Auth::user()->isAdmin()) --}}
                        <div class="form-group">
                            <label class="col-md-3 control-label">Estado</label>
                            <div class="col-md-9">                                                                                            
                                <select class="form-control select" name="estado">
                                    <option value="1" @if(isset($propiedad)&&$propiedad->estado) selected @endif>
                                        <span class="label label-success" style="font-weight: bold;color: #fff">
                                            ACTIVO
                                        </span>
                                    </option>
                                    <option value="0" @if(isset($propiedad)&& !$propiedad->estado) selected @endif>
                                        <span class="label label-danger" style="font-weight: bold;color: #fff">
                                            INACTIVO
                                        </span>
                                    </option>
                                </select>
                                <span class="help-block">Seleccione el estado del propiedad</span>
                            </div>
                        </div>
                   {{--  @endif --}}
                    
                    <div class="form-group">
                        <label class="col-md-3 control-label">Tipo</label>
                        <div class="col-md-5">                                                                                            
                            <select class="form-control select" name="tipo">
                                <option value="normal" @if(isset($propiedad)&&$propiedad->tipo == 'normal') selected @endif>
                                    NORMAL
                                </option>
                                <option value="destacada" @if(isset($propiedad)&&$propiedad->tipo == 'destacada') selected @endif>
                                    DESTACADA
                                </option>
                            </select>
                            <span class="help-block">Seleccione si es destacada y el tipo de propiedad</span>
                        </div>

                        <div class="col-md-4">                                                                                            
                            <select class="form-control select" name="clase">
                                <option value="casa" @if(isset($propiedad)&&$propiedad->clase == 'casa') selected @endif>
                                    CASA
                                </option>
                                <option value="arriendo" @if(isset($propiedad)&&$propiedad->clase == 'arriendo') selected @endif>
                                    ARRIENDO
                                </option>
                                <option value="comercial" @if(isset($propiedad)&&$propiedad->clase == 'comercial') selected @endif>
                                    COMERCIAL
                                </option>
                                <option value="departamento" @if(isset($propiedad)&&$propiedad->clase == 'departamento') selected @endif>
                                    DEPARTAMENTO
                                </option>
                                <option value="terreno" @if(isset($propiedad)&&$propiedad->clase == 'terreno') selected @endif>
                                    TERRENO
                                </option>
                            </select>
                        </div>
                    </div>
                    
                </div>

                <div class="col-md-10 col-md-offset-1" style="margin-top: 25px;">
                    <div class="form-group" id="filepicker">
                        <div class="button-bar">
                            <div class="btn btn-success fileinput" id="btn-upload">
                                <i class="fa fa-arrow-circle-o-up"></i> Subir imágenes
                                <input type="file" name="files[]" id="files" multiple>
                            </div>

                            <span class="help-block">Seleccione una o varias imágenes (con Ctrl + click) para la propiedad.</span>
                        </div>
                    </div>
                    <input type="hidden" name="deletes" id="deletes" value="-1">
                    
                    <div class="row" id="links"> 
                        <?php $i = 0; $concat = '-1'; ?>                                               
                        @if(isset($propiedad))
                            @foreach (json_decode($propiedad->features, true)['images'] as $img)
                                @if(file_exists('public/img/propiedades/thumb/'.$img))
                                    <?php $concat .= ','.$i;?>
                                    <div class="col-md-3 col-xs-12 col-sm-3" align="center" id="img-upload{{$i}}" style="margin-top: 10px">
                                        <img src="{{url('public/img/propiedades/thumb/')}}/{{$img}}" 
                                             class="img-responsive" 
                                             style="height: 150px;width: auto;" 
                                             title="{{$img}}">
                                        <input type="hidden" value="{{$img}}" name="feature_images_{{$i}}">
                                        <a href="javascript:;" onclick="quitarimg('{{$img}}','{{$i}}')">
                                            <button type="button" class="btn btn-primary" style="margin-top: 15px" id="delete{{$i}}">
                                                <span class="fa fa-trash-o"></span> Eliminar
                                            </button>
                                        </a>
                                        
                                        <label class="radio-label">
                                            <input type="radio" name="img_destacada" id="r{{$i}}" value="{{$img}}" @if($propiedad->img_destacada == $img) checked @endif/>
                                            Destacada
                                        </label>
                                    </div>
                                @endif
                                <?php $i++;?>
                            @endforeach
                        @endif                               
                    </div>
                    <input type="hidden" name="adds" id="adds" value="{{$concat}}">
                </div>
                
            </div>           
        </div>

    </div>
    <div class="panel-footer">                                   
        <button type="submit" class="btn btn-success pull-right" id="btn_guardar"><i class="fa fa-plus"></i>Guardar</button>
    </div>
</div>