<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>HIDROSISTEMA | CÓRDOBA</title>
	<meta name="description" content="Some WebGL experiments with raindrop effects" />
	<meta name="keywords" content="webgl, raindrops, effect, rain, web, video, background" />
	<meta name="author" content="Lucas Bebber for Codrops" />
	<link rel="shortcut icon" href="{{ asset('assets/globals/img/icon.ico') }}">

  	<link rel="stylesheet" href="{{ asset('assets/globals/plugins/bootstrap/dist/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/globals/css/normalize.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/globals/css/demo.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/globals/css/style1.css') }}">

	<!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script src="{{ asset('assets/globals/js/global-vendors.js') }}"></script>
	<style type="text/css">
		.ch-img-1 { 
			background-image: url({{ asset('assets/globals/img/resources/requ.png') }});
			opacity: 0.7;
		}

		.ch-img-2 { 
			background-image: url({{ asset('assets/globals/img/resources/buscar.png') }});
			opacity: 0.7;
		}

		.ch-img-3 { 
			background-image: url({{ asset('assets/globals/img/resources/requ.png') }});
		}
	</style>
</head>

<body class="demo-1">
	<div class="image-preload">
		<img class="background_log" src="{{ asset('assets/globals/img/drop-color.png') }}">
		<img class="background_log" src="{{ asset('assets/globals/img/drop-alpha.png') }}">
		<img class="background_log" src="{{ asset('assets/globals/img/weather/texture-rain-fg.png') }} " />
		<img class="background_log" src="{{ asset('assets/globals/img/weather/texture-sun-fg.png') }} " />
		<img class="background_log" src="{{ asset('assets/globals/img/weather/texture-sun-bg.png') }} " />
		<img class="background_log" src="{{ asset('assets/globals/img/weather/texture-fallout-fg.png') }} " />
		<img class="background_log" src="{{ asset('assets/globals/img/weather/texture-fallout-bg.png') }} " />
		<img class="background_log" src="{{ asset('assets/globals/img/weather/texture-drizzle-fg.png') }} " />
		<img class="background_log" src="{{ asset('assets/globals/img/weather/texture-drizzle-bg.png') }} " />

	</div>
	<div class="">
	
		<header class="codrops-header">
			
			<img class="img-logo" src="{{ asset('assets/globals/img/logo_h.png') }}" />
			<a href="">
			 	<button type="button" class="btn btn-personality-b">Ver video
			 		{{-- <span class="" style=""></span>
			 		<span class="ripple _7 animate" style=""></span> --}}
			 	</button>
	  		</a>
		</header>

		<div class="slideshow">
			<canvas width="1" height="1" id="container" style="position:absolute">
				
			</canvas>
			<!-- Heavy Rain -->
			<div class="slide" id="slide-1" data-weather="rain">
				<ul class="ch-grid">
					<li>
						<a href="Peticion-publica/create"><div class="ch-item ch-img-1">
							<div class="ch-info">
								<h3>N U E V A</h3>
								<p>P E T I C I Ó N<a href="Peticion-publica">Crear Petición</a></p>
							</div>
						</div></a>
					</li>
					<li>
						<div class="ch-item ch-img-2" data-toggle="modal" data-target=".bs-example-modal-sm">
							<div class="ch-info">
								<h3>S I S T E M A</h3>
								<p>C O N S U L T A<a href="Peticion-publica" >Cómo Vamos?</a></p>
							</div>
						</div>
					</li>

				</ul>

				<!-- Small modal -->
				

				<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
				  <div class="modal-dialog modal-sm" role="document">
				    <div class="modal-content">
				       {!! Form::open(['route' => 'findRequest', 'id' => 'FindRequestForm']) !!}
                        	<div class="row">
				                    <div class="col-md-6">
				                        <div class="form-group">
				                            <div class="inputer floating-label">
				                                <div class="input-wrapper">
				                                    {!! Form::text('folio', null, ['class' => 'form-control']) !!}
				                                    {!! Form::label('folio', 'Folio', ['class' => 'control-label']) !!}
				                                </div>
				                            </div>
				                        </div><!--.form-group-->
				                    </div>				                    
				            </div>
				            <div class="row">
				            	<div class="col-md-6">
				                        <div class="form-group">
				                            <div class="inputer floating-label">
				                                <div class="input-wrapper">
				                                    {!! Form::text('pin', null, ['class' => 'form-control']) !!}
				                                    {!! Form::label('pin','Pin', ['class' => 'control-label']) !!}
				                                </div>
				                            </div>
				                        </div><!--.form-group-->
				                    </div>
				            </div>
				            <div class="row">
				            	<div class="form-buttons form-group clearfix">
								    <div class="row">
								        <div class="col-md-12">
								        <button type="submit" 'class'='btn btn-success button-striped button-full-striped btn-ripple' >
								        	CONSULTAR
								        </button>
								            
								        </div>
								    </div>
								</div>
				            </div>
                    	{!! Form::close() !!} 
				    </div>
				  </div>
				</div>
			</div>
			

		</div>
		<p class="nosupport">Sorry, but your browser does not support WebGL!</p>
	</div>
	
	<script src= "{{ asset('assets/globals/plugins/jquery/dist/jquery.min.js') }}"></script>
	<script src= "{{ asset('assets/globals/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src= "{{ asset('assets/globals/js/index.js') }}"></script>
	<script type="text/javascript">
            $(document).ready(function(){
                Pleasure.init();
                Layout.init();
                                $("#errorsList").slideDown(800);
                $('a#open-petitions-modal').click(function(e){
                    e.preventDefault();
                    $('#petitionsModal').modal({keyboard: true}); 
                });
     </script>


</body>

</html>
