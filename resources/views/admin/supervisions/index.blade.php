@extends('layouts.masterComplete')

@section('title', 'Superviciones')

@section('styles')
    @parent
    
@stop

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel">
	            <div class="panel-heading">
	                <div class="panel-title"><h4>Superviciones</h4></div>
	            </div><!--.panel-heading-->
	            <div class="panel-body">
	                <a href="{{ route('supervisions.create') }}">
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
								@section('supervisionsTableHeader')
			                	<th class="col-md-6">Supervicion</th>
			                	<th class="col-md-6">Extencion</th>
			                	@stop
			                	@section('supervisionsTableBody')
				                	@foreach ($supervisions as $supervision)
										<tr>
											<td><input type="hidden" id="_url" value="{{ action('SupervisionsController@edit',$supervision)}}">{{ $supervision->name }}</a></td>	
											<td>
												{{ $supervision->extension }}
											</td>	
										</tr>
									@endforeach
				                @stop
				                @include('components.searchableTables.component', [
				                		'elements' => 'supervisions',
				                		'modelInstance' => new App\Supervision,
				                		'routePrefix' => 'supervisions.',
				                		])

	            </div><!--.panel-body-->
	        </div><!--.panel-->
	    </div><!--.col-md-12-->
	</div><!--.row-->
		
@stop