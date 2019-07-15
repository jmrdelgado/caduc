@extends('layouts.admin')

@section('content-header')
<section class="content-header">
    <h1>
        Roles y Permisos
        <small>Alta de Roles y Permisos</small>
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
        	<h3 class="box-title">Nuevo Rol y Asignación de Permisos</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('roles.store') }}" role="form">
        	{{ csrf_field() }}
        	<div class="form-horizontal">
            	<div class="box-body">
                	<div class="form-group">
          				<label class="col-sm-2 control-label" for="tipoRol">Tipo Rol</label>
          				<div class="col-sm-5">
          					<input type="text" class="form-control" id="tipoRol" name="tipoRol" placeholder="Tipo de Rol">
              			</div>
              		</div>
              		<div class="form-group">
              			<div class="col-sm-offset-3 col-sm-8">
              				<div class="checkbox">
                    			<input class="form-check-input" type="checkbox" value="1" id="categorias" name="categorias">
          						<label for="categorias">Gestión Sección Categorías</label>
              				</div>	
              			</div>
                	</div>
                	<div class="form-group">
              			<div class="col-sm-offset-3 col-sm-8">
              				<div class="checkbox">
                    			<input class="form-check-input" type="checkbox" value="1" id="subcategorias" name="subcategorias">
          						<label for="subcategorias">Gestión Sección Subcategorías</label>
              				</div>	
              			</div>
                	</div>
                	<div class="form-group">
              			<div class="col-sm-offset-3 col-sm-8">
              				<div class="checkbox">
                    			<input class="form-check-input" type="checkbox" value="1" id="productos" name="productos">
          						<label for="productos">Gestión Sección Productos</label>
              				</div>	
              			</div>
                	</div>
                	<div class="form-group">
              			<div class="col-sm-offset-3 col-sm-8">
              				<div class="checkbox">
                    			<input class="form-check-input" type="checkbox" value="1" id="almacenes" name="almacenes">
          						<label for="almacenes">Gestión Sección Almacenes</label>
              				</div>	
              			</div>
                	</div>
                	<div class="form-group">
              			<div class="col-sm-offset-3 col-sm-8">
              				<div class="checkbox">
                    			<input class="form-check-input" type="checkbox" value="1" id="proveedores" name="proveedores">
          						<label for="proveedores">Gestión Sección Proveedores</label>
              				</div>	
              			</div>
                	</div>
                	<div class="form-group">
              			<div class="col-sm-offset-3 col-sm-8">
              				<div class="checkbox"> 
                    			<input class="form-check-input" type="checkbox" value="1" id="usuarios" name="usuarios">
          						<label for="usuarios">Gestión Sección Usuarios</label>
              				</div>	
              			</div>
                	</div>
                	<div class="form-group">
              			<div class="col-sm-offset-3 col-sm-8">
              				<div class="checkbox">
                    			<input class="form-check-input" type="checkbox" value="1" id="roles" name="roles">
          						<label for="roles">Gestión Sección Roles y Permisos</label>
              				</div>	
              			</div>
                	</div>
              	</div>
            </div>
            <!-- /.box-body -->             
            <div class="box-footer">
            	<a href="{{ route('roles.index') }}"><button type="button" class="btn btn-primary">Volver Atrás</button></a>
            	<button type="submit" class="btn btn-success pull-right">Actualizar Registro</button>
            </div>
        </form>
    </div>
<!-- /.box -->
</div>
@endsection