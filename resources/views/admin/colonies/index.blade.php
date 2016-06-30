@extends('layouts.masterComplete')

@section('title', 'Colonias')

@section('styles')
    @parent
@stop

@include('partials.tableScripts')

@section('content')
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel">

					<div class="panel-heading">
						<div class="panel-title"><h4>COLONIAS CORDOBA VERACRUZ</h4></div>
					</div><!--.panel-heading-->
					<div class="panel-body">

						<div class="overflow-table">
							<table class="display datatables-basic" id="dataTable">
								<thead>
									<tr>
										<th>Colonia</th>
										<th>Codigo Postal</th>
										<th>Asentamiento</th>
										<th>Ambito</th>
									</tr>
								</thead>
	
								<tfoot>
									<tr>
										<th>Colonia</th>
										<th>Codigo Postal</th>
										<th>Asentamiento</th>
										<th>Ambito</th>
									</tr>
								</tfoot>

								<tbody>
									@foreach ($colonies as $colony)
									
				    					<tr>
											<td><input type="hidden" id="_url" value="{{ action('ColoniesController@edit',$colony)}}">{{ $colony->name }}</a></td>
											<td>{{ $colony->zip }}</td>
											<td>{{ $colony->colonyScope->name }}</td>
											<td>{{ $colony->settlementType->name }}</td>
											
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