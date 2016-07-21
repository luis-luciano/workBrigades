@extends('layouts.masterComplete')

@section('title', 'Tipos de Estado')

@section('styles')
    @parent
@stop

@include('partials.tableScripts')

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel">
	            <div class="panel-heading">
	                <div class="panel-title"><h4>Estados de Peticion</h4></div>
	            </div><!--.panel-heading-->
	            <div class="panel-body">
	                <a href="{{ route('requestsStates.create') }}">
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
								@section('statesTableHeader')
			                	<th class="col-md-6">Etiqueta</th>
			                	<th class="col-md-5">Nombre</th>
			                	<th class="col-md-1">Color</th>
			                	@stop
			                	@section('statesTableBody')
				                	@foreach ($states as $state)
									
				    					<tr>
											<td>
											<input type="hidden" id="_url" value="{{ action('RequestStatesController@edit',$state)}}">{{ $state->label }}</a>
											</td>
											<td>{{ $state->name }}</td>

											<td >
											<button type="button" class="btn btn-default btn-lg" style="background-color:{{ $state->color }};"></button>


											</td>					
										</tr>
									
									@endforeach
				                @stop
				                @include('components.searchableTables.component', [
				                		'elements' => 'states',
				                		'modelInstance' => new App\RequestState,
				                		'routePrefix' => 'requestsStates.',
				                		])
					
	            </div><!--.panel-body-->
	        </div><!--.panel-->
	    </div><!--.col-md-12-->
	</div><!--.row-->
		
@stop