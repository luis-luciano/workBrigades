@extends('layouts.masterComplete')

@section('title', 'Tipos de Peticion')

@section('styles')
    @parent
    
@stop

@section('scripts')

@stop

@section('content')
	<div class="row">
	    <div class="col-md-12">
	        <div class="panel">
	            <div class="panel-heading">
	                <div class="panel-title"><h4>Tipos de Peticion</h4></div>
	            </div><!--.panel-heading-->
	            <div class="panel-body">
	                <a href="{{ route('requestsTypes.create') }}">
	                    <button type="button" class="btn btn-success btn-ripple">Nuevo</button>
	                </a>

	                <button type="button" class="btn btn-light-blue btn-ripple">Imprimir</button>
	                <div class="row">
	                    <form action="#" class="form-horizontal parsley-validate">
	                        <div class="form-body">

	                        </div><!--.fomr-body-->
	                    </form>

	                </div><!--.row-->
					<div class="overflow-table">
							<table class="display datatables-basic">
								<thead>
									<tr>
										<th>Tipo de Captura</th>	
										<th>Color</th>									
									</tr>
								</thead>
	
								<tfoot>
									<tr>
										<th>Tipo de Captura</th>
										<th>Color</th>
									</tr>
								</tfoot>

								<tbody>
									@foreach ($requestsTypes as $captureType)
									
				    					<tr>
											<td><a href="{{ route('requestsTypes.edit', $captureType->id ) }}">{{ $captureType->name }}</a></td>
											<th>{{  $captureType->color }}</th>										
										</tr>
									
									@endforeach

								</tbody>
							</table>
						</div><!--.overflow-table-->
	            </div><!--.panel-body-->
	        </div><!--.panel-->
	    </div><!--.col-md-12-->
	</div><!--.row-->
		
@stop