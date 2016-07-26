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

					<div class="col-md-4 material-animate padding-right-40 material-animated" style="animation-delay: 0.67s;">
						<h4>Sales in 2014</h4>
						<p class="text-grey">Collaboratively administrate empowered markets via plug-and-play networks. Dynamically procrastinate B2C users after installed base benefits. Dramatically visualize customer directed convergence without revolutionary ROI.</p>
					</div><!--.col-->

					<div class="col-md-8 material-animate material-animated" style="animation-delay: 0.79s;">
						<div class="chart chart-sales-by-year without-time rickshaw_graph">
							<svg width="631" height="250">
								
								<path d="
								M0,243,
								135,230,
								350,243, 
								405,243
								540,243
								 " fill="none" stroke="#2095f2" stroke-width="2"></path>

								 <path d="M0,245,135,245,270,245,405,245,540,245" fill="none" stroke="#1A3750" stroke-width="2"></path>

								@foreach ($typologies as $key => $typology)
					    			<circle cx="{{ $key*135  }}" cy="230" r="3" data-color="#2095f2" fill="white" stroke="#2095f2" stroke-width="2"></circle>											
								@endforeach

								
							</svg>

							
							@foreach ($typologies as $key => $typology)
				    			<div class="x_tick plain" style="left: {{ $key*135  }}px;">
									<div class="title">{{ $typology->name }}</div>
								</div>											
							@endforeach
							
							

						</div>
					</div><!--.col-->


					</div><!--.row-->
			</div>
			{{ $typologies[0]->problems }}
			<br>
			{{ $requests->count() }}
		
							
			
					
									
@stop