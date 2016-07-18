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
	<div class="container_login">

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
				    <form>
				      <input type="text" placeholder="Usuario"/>
				      <input type="password" placeholder="contraseña"/>
				      <button>Iniciar Sesión</button>
				    </form>
				  </div>

				  <div class="cta">Nos Mueve y Nos Une</div>
				</div>
			</div>
			<!-- Drizzle -->
			<!-- <div class="slide" id="slide-2" data-weather="drizzle">
				
			</div> -->
			<!-- Sunny -->
			<!-- <div class="slide" id="slide-3" data-weather="sunny">
			
			</div> -->
			<!-- Heavy rain -->
			<!-- <div class="slide" id="slide-5" data-weather="storm">
				
			</div> -->
			<!-- Fallout (greenish overlay with slightly greenish/yellowish drops) -->
			<!-- <div class="slide" id="slide-4" data-weather="fallout">
		

			</div> -->
	
			<!-- <nav class="slideshow__nav" style="opacity: 0.0">
				<a class="nav-item" href="#slide-1"><i class="icon icon--rainy"></i><span>10/24</span></a>
				<a class="nav-item" href="#slide-2"><i class="icon icon--drizzle"></i><span>10/25</span></a>
				<a class="nav-item" href="#slide-3"><i class="icon icon--sun"></i><span>10/26</span></a>
				<a class="nav-item" href="#slide-5"><i class="icon icon--storm"></i><span>10/28</span></a>
				<a class="nav-item" href="#slide-4"><i class="icon icon--radioactive"></i><span>10/27</span></a>
			</nav> -->

		</div>
		<p class="nosupport">Sorry, but your browser does not support WebGL!</p>
	</div>
	
	<script src= "{{ asset('assets/globals/plugins/jquery/dist/jquery.min.js') }}"></script>
	<script src= "{{ asset('assets/globals/plugins/bootstrap/dist/js/bootstrap.min.js') }}"></script>
	<script src= "{{ asset('assets/globals/js/index.js') }}"></script>


</body>

</html>
