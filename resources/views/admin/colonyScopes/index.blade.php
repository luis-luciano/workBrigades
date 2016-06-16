@extends('layouts.masterComplete')

@section('title', 'Ambitos')

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
	                <div class="panel-title"><h4>Ámbitos</h4></div>
	            </div><!--.panel-heading-->
	            <div class="panel-body">
	                <a href="{{ route('colonies.scopes.create') }}">
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
										<th>Tipo de Ambito</th>										
									</tr>
								</thead>
	
								<tfoot>
									<tr>
										<th>Tipo de Ambito</th>
									</tr>
								</tfoot>

								<tbody>
									@foreach ($scopes as $scope)
									
				    					<tr>
											<td><a href="{{ route('colonies.scopes.edit', $scope->id ) }}">{{ $scope->name }}</a></td>																		
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