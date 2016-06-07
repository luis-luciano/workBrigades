<!DOCTYPE html>
    <!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
    <!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
    <!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
    <!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Cerca De Ti - @yield('title')</title>

        <meta name="description" content="">
        <meta name="author" content="">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">

        <!-- BEGIN CORE CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset(elixir('css/style.css')) }}">
        <!-- END CORE CSS -->

        <!-- BEGIN SHORTCUT AND TOUCH ICONS -->
        <link rel="shortcut icon" href="{{ asset('assets/globals/img/icons/favicon.ico') }}">
        <link rel="apple-touch-icon" href="{{ asset('assets/globals/img/icons/apple-touch-icon.png') }}">
        <!-- END SHORTCUT AND TOUCH ICONS -->

        <script type="text/javascript" src="{{ asset('assets/globals/plugins/modernizr/modernizr.min.js') }}"></script>
    </head>
    <body class="theme-teal">

        <div class="nav-bar-container">

            <!-- BEGIN ICONS -->
            <div class="nav-menu">
                <div class="hamburger">
                    <span class="patty"></span>
                    <span class="patty"></span>
                    <span class="patty"></span>
                    <span class="patty"></span>
                    <span class="patty"></span>
                    <span class="patty"></span>
                </div><!--.hamburger-->
            </div><!--.nav-menu-->

            {{-- <div class="nav-search">
                <span class="search"></span>
            </div> --}}<!--.nav-search-->

            {{-- <div class="nav-user">
                <div class="user">
                    <img src="{{ asset('assets/globals/img/faces/tolga-ergin.jpg') }}" alt="">
                    <span class="badge">3</span>
                </div><!--.user-->
                <div class="cross">
                    <span class="line"></span>
                    <span class="line"></span>
                </div><!--.cross-->
            </div> --}}<!--.nav-user-->
            <!-- END OF ICONS -->

            <div class="nav-bar-border"></div><!--.nav-bar-border-->

            <!-- BEGIN OVERLAY HELPERS -->
            <div class="overlay">
                <div class="starting-point">
                    <span></span>
                </div><!--.starting-point-->
                <div class="logo">Cerca de ti</div><!--.logo-->
            </div><!--.overlay-->

            <div class="overlay-secondary"></div><!--.overlay-secondary-->
            <!-- END OF OVERLAY HELPERS -->
        </div><!--.nav-bar-container-->

        <div class="content">
            @section('header')
                <div class="page-header full-content bg-purple">
                    <div class="row">
                        <div class="col-xs-12 col-md-8">
                            <div class="row">
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <img class="img-logo zoom" src="{{ asset('assets/globals/img/resources/atci-logo.png') }}" alt="">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <img class="img-logo zoom" src="{{ asset('assets/globals/img/resources/cordoba-solo.png') }}" alt="">
                                </div>
                                <div class="col-xs-4 col-sm-4 col-md-4">
                                    <img class="img-logo zoom" src="{{ asset('assets/globals/img/resources/escudo-cordoba.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <h1 class="pull-right">Córdoba <small>Cerca de ti</small></h1>
                        </div><!--.col-->
                    </div><!--.row-->
                </div><!--.page-header-->
            @show

            @include('flash::message')
            @include('errors.list')

            <!-- content -->
                @yield('content')
            <!-- content -->
        </div><!--.content-->

        <div class="layer-container">

            <!-- BEGIN MENU LAYER -->
            <div class="menu-layer">
                @include($menuLayer)
            </div><!--.menu-layer-->
            <!-- END OF MENU LAYER -->

            <!-- BEGIN SEARCH LAYER -->
            <div class="search-layer">
                @include($searchLayer)
            </div><!--.search-layer-->
            <!-- END OF SEARCH LAYER -->

            <!-- BEGIN USER LAYER -->
            <div class="user-layer">
                @include($userLayer)
            </div><!--.user-layer-->
            <!-- END OF USER LAYER -->

        </div><!--.layer-container-->

        <script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
        <!-- BEGIN CORE JAVASCRIPT -->
        <script type="text/javascript" src="{{ asset(elixir('js/app.js')) }}"></script>
        <!-- END CORE JAVASCRIPT -->

        <!-- BEGIN INITIALIZATION-->
        <script type="text/javascript">
            $(document).ready(function () {
                Pleasure.init();
                Layout.init();
                @yield('scripts')
                $("#errorsList").slideDown(800);
            });
        </script>
        <!-- END INITIALIZATION-->
        @include('sweet::alert')

        <script>
            $('#flash-overlay-modal').modal();
        </script>
    </body>
</html>
