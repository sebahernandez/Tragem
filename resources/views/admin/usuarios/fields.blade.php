<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><strong>@if (isset($usuario)) Editar el usuario @else Agregar nuevo usuario @endif</strong></h3>
    </div>
    <br>
    <div class="panel-body">                                                                        
        @if (Session()->has('edit_usuario'))
            <div class="alert alert-success" role="alert">
                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <strong>{{Session('edit_usuario')}} </strong>
            </div>
        @endif  
        <div class="row">            
            <div class="row">                            
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Nombre</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ $usuario->name or old('name') }}"  autofocus>

                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ $usuario->email or old('email') }}" >

                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                @if (!isset($usuario))
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Password</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control" name="password" >

                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-4 control-label">Confirmar Password</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" >
                        </div>
                    </div>
                @endif

                <div class="form-group">
                    <label class="col-md-4 control-label">Rol</label>
                    <div class="col-md-6">                                                                                            
                        <select class="form-control select" name="rol">
                            <option value="admin" @if (isset($usuario) && $usuario->rol == 'admin') selected  @endif>
                                ADMINISTRADOR
                            </option>
                            <option value="agente" @if (isset($usuario) && $usuario->rol == 'agente') selected  @endif>
                                AGENTE
                            </option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                        <label class="col-md-4 control-label">Estado</label>
                        <div class="col-md-6">                                                                                            
                            <select class="form-control select" name="activo">
                                <option value="1" @if (isset($usuario) && $usuario->activo) selected  @endif>
                                    ACTIVO
                                </option>
                                <option value="0" @if (isset($usuario) && !$usuario->activo) selected  @endif>
                                    INACTIVO
                                </option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>           
        </div>

    </div>
    <div class="panel-footer">                                   
        <button type="submit" class="btn btn-success pull-right" id="btn_guardar"><i class="fa fa-plus"></i>Guardar</button>
    </div>
</div>
