@extends('layouts.masterComplete')

@section('title', 'Sectores')

@section('styles')
    @parent
    
@stop

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel">
	            <div class="panel-heading">
	                <div class="panel-title"><h4>Sectores</h4></div>
	            </div><!--.panel-heading-->
	            <div class="panel-body">
	                <a href="{{ route('sectors.create') }}">
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
								@section('sectorsTableHeader')
			                	<th class="col-md-6">Sector</th>
			                	
			                	@stop
			                	@section('sectorsTableBody')
				                	@foreach ($sectors as $sector)
									
				    					<tr>
				    						<td><input type="hidden" id="_url" value="{{ action('SectorsController@edit',$sector)}}">{{ $sector->number }}</a></td>															
										</tr>
									
									@endforeach
				                @stop
				                @include('components.searchableTables.component', [
				                		'elements' => 'sectors',
				                		'modelInstance' => new App\Sector,
				                		'routePrefix' => 'sectors.',
				                		])
	                
	            </div><!--.panel-body-->
	        </div><!--.panel-->
	    </div><!--.col-md-12-->
	</div><!--.row-->
		
@stop