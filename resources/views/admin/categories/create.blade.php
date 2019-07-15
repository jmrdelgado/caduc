@extends('layouts.admin')

@section('content-header')
<section class="content-header">
    <h1>
        Categorías
        <small>Alta de Categorías</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/adm"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="/adm">Inicio</a></li>
        <li><a href="#">Categorías</a></li>
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
        	<h3 class="box-title">Nueva Categoría</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <form method="POST" action="{{ route('categorias.store') }}" role="form">
        	{{ csrf_field() }}
        	<div class="box-body">
            	<div class="form-group">
              		<label for="nomCategoria">Nombre Categoría</label>
              			<input type="text" class="form-control" id="nomCategoria" name="nomCategoria" placeholder="Nombre Categoría">
            	</div>
          	</div>
            <!-- /.box-body -->             
            <div class="box-footer">
            	<a href="{{ route('categorias.index') }}"><button type="button" class="btn btn-primary">Volver Atrás</button></a>
            	<button type="submit" class="btn btn-success pull-right">Guardar Registro</button>
            </div>
        </form>
    </div>
<!-- /.box -->
</div>
@endsection