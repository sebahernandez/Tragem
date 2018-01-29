<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong>@if (isset($post)) Editar el post @else Agregar nuevo post @endif</strong></h3>
    </div>
    <br>
    <div class="panel-body">                                                                        
        
        <div class="row">                            
            <div class="col-md-12">
                <div class="form-group">
                    <label class="col-md-1 control-label">
                        Titulo
                    </label>
                    <div class="col-md-11">                                            
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" class="form-control" name="titulo"   
                            @if(isset($post)) value="{{$post->titulo}}" @endif />
                        </div>                                            
                        <span class="help-block">Ingrese el titulo del post</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label">
                        Descripción corta
                    </label>
                    <div class="col-md-11">                                            
                        <div class="input-group">
                            <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                            <input type="text" class="form-control" name="descripcion_corta"   
                            @if(isset($post)) value="{{$post->descripcion_corta}}" @endif />
                        </div>                                            
                        <span class="help-block">Ingrese una breve descripción del post</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-1 control-label">
                        Imágen
                    </label>
                    <div class="col-md-11">                                            
                        <div class="input-group">
                            <input type="file" multiple id="file-simple" name="imagen" />
                        </div>                                            
                        <span class="help-block">Seleccione una imágen para el post</span>
                    </div>
                </div>

                <div class="block">
                    <h4>Texto</h4>
                    <textarea class="summernote" id="texto" name="texto"></textarea>
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer">                                   
        <button type="submit" class="btn btn-success pull-right" id="btn_guardar"><i class="fa fa-plus"></i>Guardar</button>
    </div>
</div>