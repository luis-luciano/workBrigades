@extends('layouts.masterComplete')

@section('title', 'Tipos de Asentamiento')

@section('styles')
    @parent
    
@stop


@include('partials.tableScripts')

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel">
	            <div class="panel-heading">
	                <div class="panel-title"><h4>Tipos de Asentamiento</h4></div>
	            </div><!--.panel-heading-->
	            <div class="panel-body">
	                <a href="{{ route('colonies.settlement-types.create') }}">
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
								@section('settlementsTableHeader')
			                	<th class="col-md-6">Tipo de Asentamiento</th>
			                	
			                	@stop
			                	@section('settlementsTableBody')
				                	@foreach ($settlements as $settlement)
									
				    					<tr>
				    						<td><input type="hidden" id="_url" value="{{ action('SettlementTypesController@edit',$settlement)}}">{{ $settlement->name }}</a></td>
																											
										</tr>
									
									@endforeach
				                @stop
				                @include('components.searchableTables.component', [
				                		'elements' => 'settlements',
				                		'modelInstance' => new App\SettlementType,
				                		'routePrefix' => 'colonies.settlement-types.',
				                		])
					
	            </div><!--.panel-body-->
	        </div><!--.panel-->
	    </div><!--.col-md-12-->
	</div><!--.row-->
		
@stop