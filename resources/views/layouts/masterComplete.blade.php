<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title> @yield('title')</title>

	<meta name="description" content="Pleasure is responsive, material admin dashboard panel">
	<meta name="author" content="Teamfox">

	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
	<meta name="apple-touch-fullscreen" content="yes">

	<!-- BEGIN CORE CSS -->
		<link rel="stylesheet" type="text/css" href="{{ asset(elixir('css/style-open.css')) }}">
        <link rel="stylesheet" type="text/css" href="{{ asset(elixir('css/style.css')) }}">
    <!-- END CORE CSS -->
		<link rel="stylesheet" type="text/css" media="print" href="{{ asset('assets/globals/css/print.css') }}" />

    <!--COLOR SELECTOR -->
		<link rel="stylesheet" href="{{ asset('assets/globals/plugins/pnikolov-bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/globals/plugins/minicolors/jquery.minicolors.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/globals/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/globals/plugins/clockface/css/clockface.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/globals/plugins/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css') }}">
		<link rel="stylesheet" href="{{ asset('assets/globals/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">

    <!-- BEGIN SHORTCUT AND TOUCH ICONS -->
	    <link rel="shortcut icon" href="{{ asset('assets/globals/img/icons/favicon.ico') }}">
	    <link rel="apple-touch-icon" href="{{ asset('assets/globals/img/icons/apple-touch-icon.png') }}">
    <!-- END SHORTCUT AND TOUCH ICONS -->

    	<script type="text/javascript" src="{{ asset('assets/globals/plugins/modernizr/modernizr.min.js') }}"></script>

	

	@yield('styles')
</head>
<body class="theme-teal">
	
	@include('partials.mainMenu')

	
	<div class="content">
			<div class="page-header full-content bg-purple">
                <div class="row">
                    <div class="col-xs-12 col-md-8">
                        <div class="row">
                            <div class="col-xs-5 col-sm-5 col-md-5">
                                <img class="img-logo zoom" src="{{ asset('assets/globals/img/resources/logo_hidro.png') }}" alt="">
                            </div>
                            <div class="col-xs-4 col-sm-4 col-md-4">
                                <img class="img-logo zoom print-left" src="{{ asset('assets/globals/img/resources/cordoba-solo.png') }}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4 no-print" >
                        <h1 class="pull-right">Hidrosistema<small> Sistema de atención</small></h1>
                    </div><!--.col-->
                </div><!--.row-->
            </div><!--.page-header-->

		@yield('content')
	</div><!--.content-->

	@include('partials.hiddenMenu')

	<!-- BEGIN CORE JAVASCRIPT -->
    <script type="text/javascript" src="{{ asset(elixir('js/app.js')) }}"></script>
    <!-- END CORE JAVASCRIPT -->

    <!--COLOR SELECTOR -->
	<script src="{{ asset('assets/globals/plugins/pnikolov-bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
	<script src="{{ asset('assets/globals/plugins/minicolors/jquery.minicolors.min.js') }}"></script>
	<script src="{{ asset('assets/globals/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
	<script src="{{ asset('assets/globals/plugins/clockface/js/clockface.js') }}"></script>

	<script src="{{ asset('assets/globals/scripts/forms-pickers.js') }}"></script>




	<script>
	$(document).ready(function () {
		Pleasure.init();
		Layout.init();
		TablesDataTables.init();
		FormsPickers.init();// COLOR SELECTOR

	});
	</script>
	<!-- END INITIALIZATION-->

	@include('sweet::alert')
	
	<script type="text/javascript">
		
		@yield('scripts')
	</script>

</body>
</html>