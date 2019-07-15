@extends('layouts.admin')

@section('content-header')
<section class="content-header">
    <h1>
        Almacenes
        <small>Alta de Almacenes</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/adm"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="/adm">Inicio</a></li>
        <li><a href="#">Almacenes</a></li>
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
        	<h3 class="box-title">Nuevo Almacen</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('almacenes.store') }}" role="form">
        	{{ csrf_field() }}
        	<div class="form-horizontal">
            	<div class="box-body">
                	<div class="form-group">
          				<label class="col-sm-2 control-label" for="nomAlmacen">Almacen</label>
          				<div class="col-sm-10">
          					<input type="text" class="form-control" id="nomAlmacen" name="nomAlmacen" placeholder="Nombre Almacen">
              			</div>
              		</div>
              		<div class="form-group">
              			<label class="col-sm-2 control-label" for="direccion">Dirección</label>
              			<div class="col-sm-10">
              				<input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección Postal">
              			</div>
                	</div>
                	<div class="form-group">
              			<label class="col-sm-2 control-label" for="telefono">Teléfono</label>
              			<div class="col-sm-10">
              				<input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" pattern="[0-9]{9}">
              			</div>
                	</div>
                	<div class="form-group">
              			<label class="col-sm-2 control-label" for="cpostal">Código Postal</label>
              			<div class="col-sm-10">
              				<input type="text" class="form-control" id="cpostal" name="cpostal" placeholder="Código Postal" pattern="0[1-9][0-9]{3}|[1-4][0-9]{4}|5[0-2][0-9]{3}">
              			</div>
                	</div>
                	<div class="form-group">
              			<label class="col-sm-2 control-label" for="provincia">Provincia</label>
              			<div class="col-sm-10">
              				<input type="text" class="form-control" id="provincia" name="provincia" placeholder="Provincia">
              			</div>
                	</div>
              	</div>
            </div>
            <!-- /.box-body -->             
            <div class="box-footer">
            	<a href="{{ route('almacenes.index') }}"><button type="button" class="btn btn-primary">Volver Atrás</button></a>
            	<button type="submit" class="btn btn-success pull-right">Guardar Registro</button>
            </div>
        </form>
    </div>
<!-- /.box -->
</div>
@endsection