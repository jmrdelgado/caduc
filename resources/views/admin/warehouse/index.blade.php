@extends('layouts.admin')

@section('content-header')
<section class="content-header">
    <h1>
        Almacenes
        <small>Gestión interna</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="/adm"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li><a href="/adm">Inicio</a></li>
        <li><a href="#">Almacenes</a></li>
    </ol>
</section>
@endsection

@section('content')

<!-- Mensaje de confirmación -->
@if(Session::has('success'))
	<div class="alert alert-success alert-dismissible">
    	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> ¡Atención!</h4>
        {{Session::get('success')}}
  </div>
@endif

<div class="box box-primary">
    <div class="box-header">
    	<h3 class="box-title">Listado de Almacenes</h3>
    </div>

    <!-- /.box-header -->
    <div class="box-body">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
        	<div class="row" style="padding: 15px 0px;">
        		<form method="GET" action="{{ route('almacenes.index') }}" role="form">
            		<!-- Registros por página -->
            		<div class="col-sm-6">
            			<div class="dataTables_length" id="example1_length">
            				<label>Registros por página: 
            					<select name="regpag" aria-controls="example1" class="form-control input-sm">
            						<option value="3">3</option>
            						<option value="5">5</option>
            						<option value="10">10</option>
            						<option value="15">15</option>
        						</select>
    						</label>
    					</div>
    				</div>
            		<!-- Buscador -->
            		<div class="col-sm-6">
        				{{ csrf_field() }}
            			<div id="example1_filter" class="dataTables_filter">
            				<label>Buscar por:
            					<input type="search" class="form-control input-sm" id="searchalmacen" name="searchalmacen" aria-controls="example1" placeholder="Almacen">
            					<input type="search" class="form-control input-sm" id="searchprovincia" name="searchprovincia" aria-controls="example1" placeholder="Provincia">
            				</label>
            				<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
            			</div>
            		</div>
            	</form>
        	</div>
        	<div class="row"> 
        		<div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                    	<thead>
                    		<tr role="row">
                    			<th rowspan="1" colspan="">Nombre Almacen</th>
                    			<th rowspan="1" colspan="">Dirección</th>
                    			<th rowspan="1" colspan="">Teléfono</th>
                    			<th rowspan="1" colspan="">Cód.Postal</th>
                    			<th rowspan="1" colspan="3">Provincia</th>
                    		</tr>
                    	</thead>
                        <tbody>
                        	@if($almacenes->count())
                            	@foreach($almacenes as $almacen)
                                    <tr role="row" class="odd">
                                        <td class="">{{$almacen->nomAlmacen}}</td>
                                        <td class="">{{$almacen->direccion}}</td>
                                        <td class="">{{$almacen->telefono}}</td>
                                        <td class="">{{$almacen->cpostal}}</td>
                                        <td class="">{{$almacen->provincia}}</td>
                                        <td style="width: 1%;"><a class="btn btn-primary" href="{{action('AlmacenController@edit', $almacen->id)}}" ><span class="fa fa-edit"> Editar</span></a></td>
                                        <td style="width: 1%;">
                                        	<form action="{{action('AlmacenController@destroy', $almacen->id)}}" method="post">
                       							{{csrf_field()}}
                       							<input name="_method" type="hidden" value="DELETE">
     						                	<button class="btn btn-danger" type="submit"><span class="fa fa-trash"> Eliminar</span></button>
                                        	</form>
                                        </td>
                                    </tr>
                                @endforeach
                                @else
                                    <tr role="row" class="even">
                                        <td class="">No existen registros que mostrar</td>
                                    </tr>
                        	@endif
                        </tbody>
                    </table>
            	</div>
        	</div>
        	<div class="row">
        		<div class="col-sm-5">
        			<div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Total de registros: {{$almacenes->total()}}</div>
        		</div>
        		<div class="col-sm-7">
        			<div id="example2_paginate" class="dataTables_paginate paging_simple_numbers">
        				{{$almacenes->links()}}
    				</div>
    			</div>
    		</div>
    		<div style="padding-top: 15px;">
            	<a href="{{ route('almacenes.create') }}" class="btn btn-success btn-block" >Alta de Nuevo Almacen</a>
            </div>
		</div>
    </div>
    <!-- /.box-body -->
</div> 
@endsection