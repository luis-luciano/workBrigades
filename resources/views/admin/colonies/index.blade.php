@extends('layouts.masterComplete')

@section('title', 'Colonias')

@section('styles')
    @parent
@stop

@include('partials.tableScripts')
<script type="text/javascript">
function imprSelec(dataTable)
{var ficha=document.getElementById(dataTable);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();}
</script>

@section('content')
		
		<div class="row">
			<div class="col-md-12">
				<div class="panel">

					<div class="panel-heading">
						<div class="panel-title"><h4>COLONIAS CORDOBA VERACRUZ</h4></div>
					</div><!--.panel-heading-->
					<div class="panel-body">
					<a href="{{ route('colonies.create') }}">
	                    <button type="button" class="btn btn-success btn-ripple">Nuevo</button>
	                </a>

	                <button type="button" class="btn btn-light-blue btn-ripple" onclick="javascript:imprSelec('dataTable')">
	                Imprimir</button>
	                <div class="row">
	                    <form action="#" class="form-horizontal parsley-validate">
	                        <div class="form-body">

	                        </div><!--.fomr-body-->
	                    </form>

	                </div><!--.row-->


					<br>
								@section('coloniesTableHeader')
			                	<th class="col-md-4">Colonia</th>
			                	<th class="col-md-2">Codigo Postal</th>
			                	<th class="col-md-1">Sector</th>
			                	<th class="col-md-1">Ambio</th>
			                	<th class="col-md-2">Tipo de Asentamiento</th>

			                	@stop
			                	@section('coloniesTableBody')
				                	@foreach ($colonies as $colony)
				    					<tr>
											<td><input type="hidden" id="_url" value="{{ action('ColoniesController@edit',$colony)}}">{{ $colony->name }}</a></td>
											<td>{{ $colony->zip }}</td>
											<td>{{ $colony->sector->number }}</td>
											<td>{{ $colony->colonyScope->name }}</td>
											<td>{{ $colony->settlementType->name }}</td>
					
										</tr>
									
									@endforeach
				                @stop
				                @include('components.searchableTables.component', [
				                		'elements' => 'colonies',
				                		'modelInstance' => new App\Colony,
				                		'routePrefix' => 'colonies.',
				                		])

					</div><!--.panel-body-->
				</div><!--.panel-->
			</div><!--.col-md-12-->
		</div><!--.row-->

			
					
									
@stop