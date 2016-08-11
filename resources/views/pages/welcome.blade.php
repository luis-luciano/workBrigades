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

		</header>

		<div class="slideshow">
			<canvas width="1" height="1" id="container" style="position:absolute">
				
			</canvas>
			<!-- Heavy Rain -->
			<div class="slide" id="slide-1" data-weather="rain">
				<!-- Form Module-->

				<div class="module form-module">
					
				  <div class="toggle"><i class="fa fa-times fa-pencil"></i>
				    H
				  </div>
				  <div class="form">
				    <h2>Sistema de Atención</h2>
				    <div class="btn-group">
				   		 <a href="">
						 	<button type="button" class="btn btn-orange btn-ripple">Ver video
						 		<span class="ripple _2 animate" style="height: 322px; width: 322px; top: -138.087px; left: -74.7848px;"></span>
						 		<span class="ripple _7 animate" style="height: 322px; width: 322px; top: -137.087px; left: 38.2152px;"></span></button>
				  		</a>
						 <a href="Peticion-publica">
						 	<button type="button" class="btn btn-orange btn-ripple">Crear Peticion
						 		<span class="ripple _2 animate" style="height: 322px; width: 322px; top: -138.087px; left: -74.7848px;"></span>
						 		<span class="ripple _7 animate" style="height: 322px; width: 322px; top: -137.087px; left: 38.2152px;"></span></button>
				  		</a>
				  		<a href="" class="item btn" id="open-petition-modal">
						 	<button type="button" class="btn btn-orange btn-ripple">Estado de Peticion!
						 		<span class="ripple _2 animate" style="height: 322px; width: 322px; top: -138.087px; left: -74.7848px;"></span>
						 		<span class="ripple _7 animate" style="height: 322px; width: 322px; top: -137.087px; left: 38.2152px;"></span></button>
				  		</a>
				  		<a href="">
						 	<button type="button" class="btn btn-orange btn-ripple">ingresar
						 		<span class="ripple _2 animate" style="height: 322px; width: 322px; top: -138.087px; left: -74.7848px;"></span>
						 		<span class="ripple _7 animate" style="height: 322px; width: 322px; top: -137.087px; left: 38.2152px;"></span></button>
				  		</a>					    
					</div>
				  </div>

				  <div class="cta">Nos Mueve y Nos Une</div>
				 
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
