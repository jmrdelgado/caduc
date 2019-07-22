@extends('layouts.admin')

@section('content-header')
<section class="content-header">
    <h1>
        {{__ ('Productos')}}
        <small>{{__ ('Alta de Productos')}}</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/adm"><i class="fa fa-dashboard"></i> {{__ ('Admin')}}</a></li>
        <li><a href="/adm">{{__ ('Inicio')}}</a></li>
        <li><a href="#">{{__ ('Productos')}}</a></li>
    </ol>
</section>
@endsection

@section('content')
<div class="col-md-8 col-md-offset-2">
    <!-- Mensaje de error -->    
    @if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">{{__ ('×')}}</button>
        <h4><i class="icon fa fa-ban"></i>{{__ ('¡Error!')}}</h4>
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
            <h4><i class="icon fa fa-check"></i> {{__ ('¡Atención!')}}</h4>
            {{Session::get('success')}}
      </div>
    @endif
    
    <!-- general form elements -->
    <div class="box box-primary">
        <div class="box-header with-border">
        	<h3 class="box-title">{{__ ('Nuevo Producto')}}</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('productos.store') }}" role="form">
        	{{ csrf_field() }}
        	<div class="form-horizontal">
            	<div class="box-body">
            		<div class="form-group">
            			<label class="col-sm-3 control-label" for="idSubcategoriaFK">{{__ ('Subcategoría*') }}</label>
            			<div class="col-sm-8">
                			<select class="form-control" style="width: 50%;" id="idSubcategoriaFK" name="idSubcategoriaFK">
                				@if ($subcategorias->count())
                						<option value="">{{__ ('Seleccione Subcategoría') }}</option>
                					@foreach($subcategorias as $subcategoria)
                						<option value="{{ $subcategoria->id }}">{{ $subcategoria->nomSubcategoria }}</option>
                					@endforeach
                				@else
                					<option>{{__ ('Seleccione Subcategoría') }}</option>
                				@endif
                			</select>
                		</div>
        			</div>
                	<div class="form-group">
          				<label class="col-sm-3 control-label" for="nomProducto">{{__ ('Denominación*')}}</label>
          				<div class="col-sm-8">
          					<input type="text" class="form-control" id="nomProducto" name="nomProducto" placeholder="Nombre de Producto">
              			</div>
              		</div>
              		<div class="form-group">
              			<label class="col-sm-3 control-label" for="descripcion">{{__ ('Descripción')}}</label>
              			<div class="col-sm-8">
              				<textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripción" style="resize:none;"></textarea>
              			</div>
                	</div>
                	<div class="form-group">
              			<label class="col-sm-3 control-label" for="precioCosto">{{__ ('Precio de Compra')}}</label>
              			<div class="col-sm-2">
              				<input type="text" class="form-control" id="precioCosto" name="precioCosto" placeholder="00.00">
              			</div>
              			<label class="control-label">{{__ ('€')}}</label>
                	</div>
                	<div class="form-group">
              			<label class="col-sm-3 control-label" for="fechaCaducidad">{{__ ('Fecha Caducidad*')}}</label>
              			<div class="col-sm-3">
              				<input type="date" class="form-control" id="fechaCaducidad" name="fechaCaducidad" style="line-height: 18px;">
              			</div>
                	</div>
                	<div class="form-group">
              			<label class="col-sm-3 control-label" for="existencias">{{__ ('Existencias*')}}</label>
              			<div class="col-sm-2">
              				<input type="text" class="form-control" id="existencias" name="existencias" placeholder="Existencias">
              			</div>
              			<label class="control-label">{{__ ('Und.')}}</label>
                	</div>
              	</div>
            </div>
            <!-- /.box-body -->             
            <div class="box-footer">
            	<a href="{{ route('productos.index') }}"><button type="button" class="btn btn-primary">{{__ ('Volver Atrás')}}</button></a>
            	<button type="submit" class="btn btn-success pull-right">{{__ ('Guardar Registro')}}</button>
            </div>
        </form>
    </div>
<!-- /.box -->
</div>
@endsection