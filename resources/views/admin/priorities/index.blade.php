@extends('layouts.masterComplete')

@section('title', 'Tipos de Estado')

@section('styles')
    @parent
    
@stop

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel">
	            <div class="panel-heading">
	                <div class="panel-title"><h4>Prioridades de Peticion</h4></div>
	            </div><!--.panel-heading-->
	            <div class="panel-body">
	                <a href="{{ route('requestsPriorities.create') }}">
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
								@section('prioritiesTableHeader')
			                	<th class="col-md-6">Prioridad de Peticion</th>
			                	<th class="col-md-6">color</th>
			                	@stop
			                	@section('prioritiesTableBody')
				                	@foreach ($priorities as $priority)
									
				    					<tr>
											<td><input type="hidden" id="_url" value="{{ action('RequestPrioritiesController@edit',$priority)}}">{{ $priority->name }}</a></td>

											<td >
											<button type="button" class="btn btn-default btn-lg" style="background-color:{{ $priority->color }};"></button>
											</td>
																	
										</tr>
									
									@endforeach
				                @stop
				                @include('components.searchableTables.component', [
				                		'elements' => 'priorities',
				                		'modelInstance' => new App\RequestPriority,
				                		'routePrefix' => 'requestsPriorities.',
				                		])

					
	            </div><!--.panel-body-->
	        </div><!--.panel-->
	    </div><!--.col-md-12-->
	</div><!--.row-->
		
@stop