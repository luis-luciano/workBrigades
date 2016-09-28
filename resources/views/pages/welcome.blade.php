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

  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  	<link rel="stylesheet" href="{{ asset('assets/globals/css/normalize.css') }}">
  	
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

	<link rel="stylesheet" href="{{ asset('assets/globals/css/demo.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/globals/css/style1.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/globals/plugins/sweetAlert/sweetalert.css') }}">
	<style type="text/css">
		.alert-danger-p {
		    color: #2c6782;
		    background-color: #f2dedee6;
		    border-color: #4cc2e5;
		}
	</style>

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
			
	  		<div class="row">
	  			<div class="pull-right">
	  				<a href="">
					 	<button type="button" class="btn btn-personality-b pull-right"><i class="fa fa-play" aria-hidden="true"></i>
							Ver video
					 		{{-- <span class="" style=""></span>
					 		<span class="ripple _7 animate" style=""></span> --}}
					 	</button>
			  		</a>
	  			</div>
	  			
	  		</div>

		</header>

		<div class="slideshow">
			<canvas width="1" height="1" id="container" style="position:absolute">
				
			</canvas>
			<!-- Heavy Rain -->

			<div class="slide" id="slide-1" data-weather="rain">
				<ul class="ch-grid list-group">
					<li>
						<a href="{{ route('Peticion-publica.create') }}" style="text-decoration:none;">
							<div class="ch-item ch-img-1">
								<div class="ch-info">
									<h3>N U E V A</h3>
									<p>P E T I C I Ó N<a href="Peticion-publica">Crear Petición</a></p>
								</div>
							</div>
						</a>
					</li>
					<li>
						<div class="ch-item ch-img-2  bd-example" data-toggle="modal" data-target="#exampleModal">
							<div class="ch-info">
								<h3>S I S T E M A</h3>
								<p>C O N S U L T A<a href="Peticion-publica" >Cómo Vamos?</a></p>
							</div>
						</div>
					</li>
				</ul>
				<div class="row">
					<div class="col-xs-4 col-md-offset-4">
						@if($errors->any())
						
						<div id="errorsList" class="alert alert-danger-transparent" role="alert">							
							<div class="alert alert-danger-p alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <strong>Warning!</strong><br>
								  @foreach ($errors->all() as $error)
								  <h6>* {{ $error }}</h6> <br>	
								  @endforeach
								  
							</div>
						</div>
					@endif
					</div>
				</div>
				<div class="row">
		  			<div class="col-xs-4 col-md-offset-4">
						@if(isset($message))
						<div id="errorsList" class="alert alert-danger-transparent" role="alert">							
							<div class="alert alert-dange-p alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>Warning!</strong><br> <small>* {{ $message }}</small>
								  
							</div>
						</div>
						@endif
					</div>
	  			</div>
			</div>

<div class="bd-example">
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title" id="exampleModalLabel">Conoce el estado actual de tu petición</h4>
        </div>
        {!! Form::open(['route' => 'findRequest', 'id' => 'findRequestForm', 'files'=> true ]) !!}
        	<div class="modal-body">
	               	<div class="form-group">
	               	    {!! Form::label('folio', 'Folio:', ['class' => 'control-label require-asterisk']) !!}
                        {!! Form::text('folio', null, ['class' => 'form-control']) !!}
                        
                    </div><!--.form-group-->
		            <div class="form-group">
		              {!! Form::label('pin', 'Pin:', ['class' => 'control-label require-asterisk']) !!}
                        {!! Form::text('pin', null, ['class' => 'form-control']) !!}
		            </div>         
	        <h6>* Ingresa el número de folio y pin de Seguridad de tu petición para realizar la busqueda.</h6>   
        	</div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-ban" aria-hidden="true"></i>Cancelar</button>
          {!! Form::submit('Buscar',['class' => 'btn btn-success button-striped button-full-striped btn-ripple','id' => 'editForm']) !!}
        </div>
        {!! Form::close() !!} 
      </div>
    </div>
  </div>
</div>


				

	<div>
		<p class="nosupport">Sorry, but your browser does not support WebGL!</p>
	</div>
	
	<script src= "{{ asset('assets/globals/plugins/jquery/dist/jquery.min.js') }}"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script src= "{{ asset('assets/globals/plugins/sweetAlert/sweetalert.min.js') }}"></script>
	<script src= "{{ asset('assets/globals/js/index.js') }}"></script>
	<script type="text/javascript">


		$('#exampleModal').on('show.bs.modal', function (event) {
		  var button = $(event.relatedTarget); // Button that triggered the modal
		  //var recipient = button.data('whatever') // Extract info from data-* attributes
		  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		  var modal = $(this)
		  modal.find('.modal-title');
		  modal.find('.modal-body input').val(recipient);
		})
	</script>



</body>

</html>
