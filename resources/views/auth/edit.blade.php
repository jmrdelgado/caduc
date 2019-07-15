@extends('layouts.admin')

@section('content-header')
<section class="content-header">
    <h1>
        Usuarios
        <small>Edición de Usuarios</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/adm"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="/adm">Inicio</a></li>
        <li><a href="#">Roles y Permisos</a></li>
    </ol>
</section>
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
    <!-- Mensaje de error -->    
    @if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-ban"></i>¡Error!</h4>
    	<ul>
    		@foreach ($errors->all() as $error)
    		<li>{{ $error }}</li>
    		@endforeach
    	</ul>
    </div>
    @endif
    
    <!-- Mensaje de confirmación -->
    @if(Session::has('success'))
    	<div class="alert alert-success alert-dismissible">
        	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> ¡Atención!</h4>
            {{Session::get('success')}}
      </div>
    @endif
    
<!-- general form elements -->
<div class="box box-primary">
    <div class="box-header with-border">
    	<h3 class="box-title">Modificar Usuario</h3>
    </div>
    <!-- /.box-header -->
    <!-- form start -->
        <form method="POST" action="{{ route('usuarios.update',$usuarios->id) }}">
            @csrf
            <input name="_method" type="hidden" value="PATCH">
			<div class="form-horizontal">
                <div class="box-body">
                	<div class="form-group">
                    	<label for="name" class="col-sm-2 control-label">{{ __('Nombre*') }}</label>
                		<div class="col-sm-10">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $usuarios->name }}" required autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                	</div>
                	
                	<div class="form-group">
                    	<label for="name" class="col-sm-2 control-label">{{ __('Apellidos') }}</label>
                		<div class="col-sm-10">
                            <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ $usuarios->apellidos }}" required autocomplete="apellidos" autofocus>
                            @error('apellidos')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                	</div>
    
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">{{ __('E@mail*') }}</label>
                        <div class="col-sm-10">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $usuarios->email }}" required autocomplete="email">
        
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group">
                    	<label for="estado"  class="col-sm-2 control-label">Estado</label>
          				<div class="col-sm-5">
          				@if ($usuarios->estado === 1)
          					<input class="form-check-input" type="checkbox" value="1" id="estado" name="estado" style="margin-top: 10px;" checked="checked">
          				@else
                			<input class="form-check-input" type="checkbox" value="1" id="estado" name="estado" style="margin-top: 10px;">
          				@endif
          					<label for="estado" style="color:grey;">&nbsp;Activar o desactivar usuario</label>
          				</div>	
                	</div>
                    
                    <div class="form-group">
            			<label for="idRolFK" class="col-sm-2 control-label">Tipo Rol*</label>
            			<div class="col-sm-7">
                			<select class="form-control" style="width: 50%;" id="idRolFK" name="idRolFK">
                				@if ($permisos->count())
                						<option value="">Seleccione Tipo Rol</option>
                					@foreach($permisos as $permiso)
                						<option value="{{ $permiso->id }}" {{($permiso->id == $usuarios->idRolFK)?'selected':""}}>{{ $permiso->tipoRol }}</option>
                					@endforeach
                				@else
                					<option>Seleccione Tipo Rol</option>
                				@endif
                			</select>
                		</div>
        			</div>
                    
                </div>
			</div>
            <div class="box-footer">
                <a href="{{ route('usuarios.index') }}"><button type="button" class="btn btn-primary">Volver Atrás</button></a>
                <button type="submit" class="btn btn-success pull-right">{{ __('Actualizar Registro') }}</button>
            </div>
        </form>
    </div>
</div>
@endsection
