@extends('layouts.masterComplete')

@section('title', 'Colonias')

@section('styles')
    @parent
@stop

@section('scrip')
    
@stop

@section('content')
		<div class="full-content margin-top-40 margin-bottom-40 bg-white">
				<div class="row">
					<div class="col-md-12">
						<div class="panel">
							<div class="panel-heading">
								<div class="panel-title"><h4>Sistema de atencion para reportes de brigadas</h4></div>
							</div><!--.panel-heading-->
							<div class="panel-body">
								<div class="row">
									<div class="col-md-4 material-animate padding-right-40 material-animated" style="animation-delay: 0.67s;">
										<h4>Record de Peticiones {{ $requests->count() }} </h4>
										<p class="text-grey">
										Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
										tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
										quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
										consequat. 
									</div><!--.col-->

									<div class="col-md-8 material-animate material-animated" style="animation-delay: 0.79s;">
										<div class="chart chart-sales-by-year without-time rickshaw_graph">
											<svg width="631" height="250">
												<path d="M0,243,80,{{ 243-(($counters[1]/$requests->count())*243) }},170,{{ 243-(($counters[2]/$requests->count())*243) }},250,{{ 243-(($counters[3]/$requests->count())*243) }}, 350,{{ 243-(($counters[4]/$requests->count())*243) }},500,{{ 243-(($counters[5]/$requests->count())*243) }},580,{{ 243-(($counters[5]/$requests->count())*243) }}," fill="none" stroke="#2095f2" stroke-width="2"></path>
												 <path d="M0,245,135,245,270,245,405,245,580,245" fill="none" stroke="#1A3750" stroke-width="2"></path>
												 <circle cx="80" cy="{{ 243-(($counters[1]/$requests->count())*243) }}" r="3" data-color="#2095f2" fill="white" stroke="#2095f2" stroke-width="2"></circle>											
												 <circle cx="170" cy="{{ 243-(($counters[2]/$requests->count())*243) }}" r="3" data-color="#2095f2" fill="white" stroke="#2095f2" stroke-width="2"></circle>											
												 <circle cx="250" cy="{{ 243-(($counters[3]/$requests->count())*243) }}" r="3" data-color="#2095f2" fill="white" stroke="#2095f2" stroke-width="2"></circle>											
												 <circle cx="350" cy="{{ 243-(($counters[4]/$requests->count())*243) }}" r="3" data-color="#2095f2" fill="white" stroke="#2095f2" stroke-width="2"></circle>											
												 <circle cx="500" cy="{{ 243-(($counters[5]/$requests->count())*243) }}" r="3" data-color="#2095f2" fill="white" stroke="#2095f2" stroke-width="2"></circle>
											</svg>
											<div class="x_tick plain" style="left: 0px;"><div class="title"></div></div>	
											<div class="x_tick plain" style="left: 80px;"><div class="title">AGUA</div></div>											
											<div class="x_tick plain" style="left: 170px;"><div class="title">DRENAJE</div></div>											
											<div class="x_tick plain" style="left: 250px;"><div class="title">BACHEO</div></div>											
											<div class="x_tick plain" style="left: 350px;"><div class="title">CULTURA DEL AGUA</div></div>											
											<div class="x_tick plain" style="left: 500px;"><div class="title">AREA COMERCIAL</div></div>
											<div class="x_tick plain" style="left: 580px;"><div class="title"></div></div>
										</div>
									</div><!--.col-->
								</div>
							</div>
						</div>	
					</div>
				</div>
		</div>								
@stop