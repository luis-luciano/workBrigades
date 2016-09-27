@extends('layouts.masterComplete')

@section('title', 'Permisos')

@section('styles')
    @parent
@stop


@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel">
	            <div class="panel-heading">
	                <div class="panel-title"><h4>Permisos</h4></div>
	            </div><!--.panel-heading-->
	            
	            <div class="panel-body">

		            	<div class="row">
		            		<a href="{{ route('permissions.create') }}">
		                    <button type="button" class="btn btn-success btn-ripple">Nuevo</button>
		                </a>

		                <button type="button" class="btn btn-light-blue btn-ripple">Imprimir</button>
		            	</div>
		           		<br>
	                
	                	<div class="row">
	                	@section('permissionsTableHeader')
		                	<th class="col-md-6">{{ trans('permissions.label') }}</th>
		                	<th class="col-md-6">{{ trans('permissions.name') }}</th>
	                	@stop

	                	@section('permissionsTableBody')
		                	@foreach ($permissions as $permission)
		                	<tr>
		                		<td><input type="hidden" id="_url" value="{{ route('permissions.edit', [$permission->id]) }}">{{ $permission->label }}</td>
		                		<td>{{ $permission->name }}</td>
		                	</tr>
		                	@endforeach
	                	@stop

	                	@include('components.searchableTables.component', [
	                		'elements' => 'permissions',
	                		'modelInstance' => new App\Permission,
	                		'routePrefix' => 'permissions.',
	                		])
	                	</div>
	                	                
					
	            </div><!--.panel-body-->
	        </div><!--.panel-->
	    </div><!--.col-md-12-->
	</div><!--.row-->
		
@stop

{{-- <table class="table table-hover" id="dataTable">
				                	
	                		<thead>
									<tr>
										<th class="col-md-6">{{ trans('permissions.label') }}</th>
                        				<th class="col-md-6">{{ trans('permissions.name') }}</th>								
									</tr>
									<tfoot>
									<tr>
										<th class="col-md-6">{{ trans('permissions.label') }}</th>
                      					<th class="col-md-6">{{ trans('permissions.name') }}</th>
									</tr>
								</tfoot>
							</thead>
							<tbody>
									@foreach ($permissions as $permission)
									
				    					<tr>
											<td>
											<input type="hidden" id="_url" value="{{ action('PermissionsController@edit',$permission)}}">{{ $permission->name }}</a>
											</td>

											<td >
											{{ $permission->label }}
											</td>					
										</tr>
									
									@endforeach

							</tbody>

	                	</table> --}}