@extends('layouts.masterComplete')

@section('title', 'Roles')

@section('styles')
    @parent
    
@stop

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel">
	            <div class="panel-heading">
	                <div class="panel-title"><h4>Roles</h4></div>
	            </div><!--.panel-heading-->
	            <div class="panel-body">
	                <a href="{{ route('roles.create') }}">
	                    <button type="button" class="btn btn-success btn-ripple">Nuevo</button>
	                </a>

	                <button type="button" class="btn btn-light-blue btn-ripple">Imprimir</button>
	                <div class="row">
	                    <form action="#" class="form-horizontal parsley-validate">
	                        <div class="form-body">

	                        </div><!--.fomr-body-->
	                    </form>
	                </div><!--.row-->
	                <br>
								@section('rolesTableHeader')
			                	<th class="col-md-6">Nombre</th>
			                	<th class="col-md-6">Etiqueta</th>
			                	@stop
			                	@section('rolesTableBody')
				                	@foreach ($roles as $role)
										<tr>
											<td><input type="hidden" id="_url" value="{{ action('RolesController@edit',$role)}}">{{ $role->name }}</a></td>	
											<td>
												{{ $role->label }}
											</td>	
										</tr>
									@endforeach
				                @stop
				                @include('components.searchableTables.component', [
				                		'elements' => 'roles',
				                		'modelInstance' => new App\Role,
				                		'routePrefix' => 'roles.',
				                		])
	     

	            </div><!--.panel-body-->
	        </div><!--.panel-->
	    </div><!--.col-md-12-->
	</div><!--.row-->
		
@stop