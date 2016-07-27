@extends('layouts.masterComplete')

@section('title', 'Inicio')

@section('styles')
    @parent
@stop

@section('scripts')

	var counters={!! $counters !!};
	console.log(counters[1]);

    var chart = c3.generate({
	    bindto: '#chart-donut',
	    data: {
	      columns: [
	        ['Drenaje', counters[2]],
	        ['Bacheo', counters[3]],
	        ['Agua', counters[1]]
	      ], 
	      type: 'donut', 
	    },
	    donut: {
	        title: "Peticiones"
	    }
	});

	var chart = c3.generate({
	    bindto: '#chart-bar',
	    data: {
	      columns: [
	        ['Drenaje', counters[2]],
	        ['Bacheo', counters[3]],
	        ['Agua', counters[1]]
	      ], 
	      type: 'bar', 
	    },
	    donut: {
	        title: "Peticiones"
	    }
	});

@stop

@section('content')
		<div class="full-content margin-top-40 margin-bottom-40 bg-white">
				<div class="row">
					<div class="col-md-4">
						<div class="panel">
							<div class="panel-heading">
								<div class="panel-title"><h4>Peticiones Por Día</h4></div>
							</div><!--.panel-heading-->
							<div class="panel-body">
								<div id="chart-donut"></div>
							</div><!--.panel-body-->
						</div><!--.panel-->
					</div><!--.col-md-4-->

					<div class="col-md-8">
						<div class="panel">
							<div class="panel-heading">
								<div class="panel-title"><h4>Peticiones Por Mes</h4></div>
							</div><!--.panel-heading-->
							<div class="panel-body">
								<div id="chart-bar"></div>
							</div><!--.panel-body-->
						</div><!--.panel-->
					</div><!--.col-md-8-->
				</div>
		</div>								
@stop