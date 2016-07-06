@extends('layouts.masterComplete')

@section('title', 'Tipos de Peticion')

@section('styles')
    @parent
    
@stop

@include('partials.tableScripts')

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel">
	            <div class="panel-heading">
	                <div class="panel-title"><h4>Tipos de Peticion</h4></div>
	            </div><!--.panel-heading-->
	            <div class="panel-body">
	                <a href="{{ route('requestTypes.create') }}">
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
								@section('requestTypesTableHeader')
			                	<th class="col-md-6">Tipo de Peticion</th>
			                	<th class="col-md-6">Color</th>
			                	@stop
			                	@section('requestTypesTableBody')
				                	@foreach ($requestTypes as $requestType)
									
				    					<tr>
											<td><a href="{{ route('requestTypes.edit', $requestType->id ) }}">{{ $requestType->name }}</a></td>
											<th><button type="button" class="btn btn-default btn-lg" style="background-color:{{ $requestType->color }};"></button>
</th>										
										</tr>
									
									@endforeach
				                @stop
				                @include('components.searchableTables.component', [
				                		'elements' => 'requestTypes',
				                		'modelInstance' => new App\RequestType,
				                		'routePrefix' => 'requestTypes.',
				                		])

	            </div><!--.panel-body-->
	        </div><!--.panel-->
	    </div><!--.col-md-12-->
	</div><!--.row-->
		
@stop