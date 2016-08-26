<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> @yield('title') </title>

    <meta name="description" content="Pleasure is responsive, material admin dashboard panel">
    <meta name="author" content="Teamfox">

    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-touch-fullscreen" content="yes">

    <!-- BEGIN CORE CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset(elixir('css/style-open.css')) }}">
        <link rel="stylesheet" type="text/css" href="{{ asset(elixir('css/style.css')) }}">
        <link rel="stylesheet" href="../../assets/admin1/css/admin1.css">
        <link rel="stylesheet" href="../../assets/globals/css/elements.css">
    <!-- END CORE CSS -->

    <!-- BEGIN PLUGINS CSS -->
    <link rel="stylesheet" href="../../assets/globals/plugins/jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/globals/css/plugins.css">
    <!-- END PLUGINS CSS -->
    <!-- END CORE CSS -->
        <link rel="stylesheet" type="text/css" media="print" href="{{ asset('assets/globals/css/print.css') }}" />

       <!-- BEGIN SHORTCUT AND TOUCH ICONS -->
        <link rel="shortcut icon" href="{{ asset('assets/globals/img/icons/favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/globals/img/icons/apple-touch-icon.png') }}">
    <!-- END SHORTCUT AND TOUCH ICONS -->

        <script type="text/javascript" src="{{ asset('assets/globals/plugins/modernizr/modernizr.min.js') }}"></script><meta charset="UTF-8">
    
</head>
<body style="    margin: 0 0 0 0px;">

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
                </div><!--.row-->
            </div><!--.page-header-->
  <div class="content">
      @yield('content')

                

    </div>

    <!-- BEGIN CORE JAVASCRIPT -->
    <script type="text/javascript" src="{{ asset(elixir('js/app.js')) }}"></script>
    <script src="../../assets/globals/js/global-vendors.js"></script>
    <script src="../../assets/globals/plugins/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
    <!-- END CORE JAVASCRIPT -->
    <script src="../../assets/globals/js/pleasure.js"></script>
    <!-- ADMIN 1 -->
    <script src="../../assets/admin1/js/layout.js"></script>    
   

     
    <script>
    $(document).ready(function () {
        Pleasure.init();
        Layout.init();
    });
    </script>
    <!-- END INITIALIZATION--> 
    @yield('scripts')
</body>
</html>

