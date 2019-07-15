@extends('layouts.admin')

@section('content-header')
<section class="content-header">
    <h1>
        Proveedores
        <small>Edición de Proveedores</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/adm"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="/adm">Inicio</a></li>
        <li><a href="#">Proveedores</a></li>
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
        	<h3 class="box-title">Modificar Proveedor</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('proveedores.update', $proveedores->id) }}" role="form">
        	{{ csrf_field() }}
        	<input name="_method" type="hidden" value="PATCH">
        	<div class="form-horizontal">
            	<div class="box-body">
                	<div class="form-group">
          				<label class="col-sm-2 control-label" for="cif">CIF/NIF</label>
          				<div class="col-sm-10">
          					<input type="text" class="form-control" id="cif" name="cif" placeholder="CIF Proveedor" value="{{$proveedores->cif}}">
              			</div>
              		</div>
              		<div class="form-group">
              			<label class="col-sm-2 control-label" for="razonSocial">Razón Social</label>
              			<div class="col-sm-10">
              				<input type="text" class="form-control" id="razonSocial" name="razonSocial" placeholder="Razón Social" value="{{$proveedores->razonSocial}}">
              			</div>
                	</div>
                	<div class="form-group">
              			<label class="col-sm-2 control-label" for="direccion">Dirección</label>
              			<div class="col-sm-10">
              				<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" value="{{$proveedores->direccion}}">
              			</div>
                	</div>
                	<div class="form-group">
              			<label class="col-sm-2 control-label" for="telefono">Teléfono</label>
              			<div class="col-sm-10">
              				<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" pattern="[0-9]{9}"  value="{{$proveedores->telefono}}">
              			</div>
                	</div>
                	<div class="form-group">
              			<label class="col-sm-2 control-label" for="email">Email</label>
              			<div class="col-sm-10">
              				<input type="email" class="form-control" id="email" name="email" placeholder="Correo Electrónico" value="{{$proveedores->email}}">
              			</div>
                	</div>
                	<div class="form-group">
              			<label class="col-sm-2 control-label" for="cpostal">Código Postal</label>
              			<div class="col-sm-10">
              				<input type="text" class="form-control" id="cpostal" name="cpostal" placeholder="Código Postal" pattern="0[1-9][0-9]{3}|[1-4][0-9]{4}|5[0-2][0-9]{3}" value="{{$proveedores->cpostal}}">
              			</div>
                	</div>
                	<div class="form-group">
              			<label class="col-sm-2 control-label" for="ciudad">Ciudad</label>
              			<div class="col-sm-10">
              				<input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="{{$proveedores->ciudad}}">
              			</div>
                	</div>
              	</div>
            </div>
            <!-- /.box-body -->             
            <div class="box-footer">
            	<a href="{{ route('proveedores.index') }}"><button type="button" class="btn btn-primary">Volver Atrás</button></a>
            	<button type="submit" class="btn btn-success pull-right">Actualizar Registro</button>
            </div>
        </form>
    </div>
<!-- /.box -->
</div>
@endsection