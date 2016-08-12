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
		.btn-personality-b{

			background: rgba(20, 145, 183, 0.64); 
		}

		.btn-personality-b:hover{
			   /* background: rgba(20, 145, 183, 0.79);*/


			background: rgba(242, 242, 242, 0.47);
			color: #000000;
		}

		.ch-grid {
			margin: 20px 0 0 0;
			padding: 0;
			list-style: none;
			display: block;
			text-align: center;
			width: 100%;
		}

		.ch-grid:after,
		.ch-item:before {
			content: '';
		    display: table;
		}

		.ch-grid:after {
			clear: both;
		}

		.ch-grid li {
			width: 220px;
			height: 220px;
			display: inline-block;
			margin: 20px;
		}

		.ch-item {
			width: 100%;
			height: 100%;
			border-radius: 50%;
			overflow: hidden;
			position: relative;
			cursor: default;
			box-shadow: 
				inset 0 0 0 16px rgba(255,255,255,0.6),
				0 1px 2px rgba(0,0,0,0.1);
			transition: all 0.4s ease-in-out;
		}

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

		.ch-info {
			position: absolute;
			background: rgba(63,147,147, 0.8);
			width: inherit;
			height: inherit;
			border-radius: 50%;
			overflow: hidden;
			opacity: 0;
			transition: all 0.4s ease-in-out;
			transform: scale(0);
		}

		.ch-info h3 {
			color: #fff;
			text-transform: uppercase;
			letter-spacing: 2px;
			font-size: 22px;
			margin: 0 30px;
			padding: 45px 0 0 0;
			height: 140px;
			font-family: 'Open Sans', Arial, sans-serif;
			text-shadow: 
				0 0 1px #fff, 
				0 1px 2px rgba(0,0,0,0.3);
		}

		.ch-info p {
			color: #fff;
			padding: 10px 5px;
			font-style: italic;
			margin: 0 30px;
			font-size: 12px;
			border-top: 1px solid rgba(255,255,255,0.5);
			opacity: 0;
			transition: all 1s ease-in-out 0.4s;
		}

		.ch-info p a {
			display: block;
			color: rgba(255,255,255,0.7);
			font-style: normal;
			font-weight: 700;
			text-transform: uppercase;
			font-size: 9px;
			letter-spacing: 1px;
			padding-top: 4px;
			font-family: 'Open Sans', Arial, sans-serif;
		}

		.ch-info p a:hover {
			color: rgba(255,242,34, 0.8);
		}

		.ch-item:hover {
			box-shadow: 
				inset 0 0 0 1px rgba(255,255,255,0.1),
				0 1px 2px rgba(0,0,0,0.1);
		}

		.ch-item:hover .ch-info {
			transform: scale(1);
			opacity: 1;
		}
		
		.ch-item:hover .ch-info p {
			opacity: 1;
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
						<div class="ch-item ch-img-1">
							<div class="ch-info">
								<h3>N U E V A</h3>
								<p>P E T I C I Ó N<a href="Peticion-publica">Crear Petición</a></p>
							</div>
						</div>
					</li>
					<li>
						<div class="ch-item ch-img-2">
							<div class="ch-info">
								<h3>S I S T E M A</h3>
								<p>C O N S U L T A<a href="Peticion-publica">Cómo Vamos?</a></p>
							</div>
						</div>
					</li>
					{{-- <li>
						<div class="ch-item ch-img-3">
							<div class="ch-info">
								<h3>Pink Lightning</h3>
								<p>by Charlie Wagers <a href="http://drbl.in/ekhp">View on Dribbble</a></p>
							</div>
						</div>
					</li> --}}
				</ul>

				
					
{{-- 				  
				   		 
						<a href="Peticion-publica">
						 	<img style="width:150px; height="150px" src="{{ asset('assets/globals/img/resources/requests.png') }}" />
						 	
				  		</a>
				  		<a href="" class="item btn" id="open-petition-modal">
						 	
				  		</a>
				  		<a href="">
						 	
				  		</a>					    
					
				 

				  <div class="cta">Nos Mueve y Nos Une</div> 
				  --}}
				
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
