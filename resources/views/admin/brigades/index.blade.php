@extends('layouts.masterComplete')

@section('title', 'Brigadas')

@section('styles')
    @parent
@stop

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel">
	            <div class="panel-heading">
	                <div class="panel-title"><h4>Brigadas</h4></div>
	            </div><!--.panel-heading-->
	            <div class="panel-body">
	                <a href="{{ route('brigades.create') }}">
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
								@section('brigadesTableHeader')
			                	<th class="col-md-6">Brigada</th>
			                	<th class="col-md-6">Descripcion</th>
			                	@stop
			                	@section('brigadesTableBody')
				                	@foreach ($brigades as $brigade)
										<tr>
											<td><input type="hidden" id="_url" value="{{ action('BrigadesController@edit',$brigade)}}">{{ $brigade->name }}</a></td>	
											<td>
												{{ $brigade->description }}
											</td>	
										</tr>
									@endforeach
				                @stop
				                @include('components.searchableTables.component', [
				                		'elements' => 'brigades',
				                		'modelInstance' => new App\Brigade,
				                		'routePrefix' => 'brigades.',
				                		])
				                
	
	
						
	            </div><!--.panel-body-->
	        </div><!--.panel-->
	    </div><!--.col-md-12-->
	</div><!--.row-->
		
@stop