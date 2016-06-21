@extends('layouts.masterComplete')

@section('title', 'Colonias')

@section('styles')
    @parent
    
@stop

@section('scripts')
	$("#dataTable>tbody>tr").on("click", function(e)
   {
       var url = $(this).find("#_url").val();
       if( e.which == 2 ) {
           e.preventDefault();
           var win = window.open(url, '_blank');
           win.focus();
           return;
      }
       window.location.href =  url;
   });
@stop

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
											<td>{{ $colony->colonyScopes->name }}</td>
											<td>{{ $colony->settlementTypes->name }}</td>
											
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