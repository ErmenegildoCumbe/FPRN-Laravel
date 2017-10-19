<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>FPRN - Administracao</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
              rel="stylesheet">
              
               <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
               <link href="{{ asset('css/style.css') }}" rel="stylesheet">
              <link href="{{ asset('css/pages/dashboard.css') }}" rel="stylesheet">
               <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
               <!-- <title>{{ config('app.name', 'Laravel') }}</title> -->

        <!-- <link href=" {{ asset('css/font-awesome.css') }} " rel="stylesheet"> -->
        <!-- <link href=" {{ asset('css/style.css') }}" rel="stylesheet"> -->
        <!-- <link href=" {{ asset('css/pages/dashboard.css') }}" rel="stylesheet"> -->
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
              <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
            <![endif]-->

        <!--css de autocomplete-->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

        <!--jquery de autocomplete-->
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
		<script src="{{ asset ('js/jquery-ui.js') }}"></script>
		
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container"> 
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </a><a class="brand" href="#"> <img style="width: 110px; height: 25px;" class="img-responsive" src="{{ asset('img/logo_t.png') }} "></a>
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                        class="icon-cog"></i> Conta <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li ><a href="javascript:;">Definicoes </a> </li>
                                    <li ><a href="javascript:;">Ajuda</a> </li>
                                </ul>
                            </li>
                            @if(Auth::check())
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                        class="icon-user"></i> {{ Auth::user()->name }} <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Perfil</a></li>
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sair</a></li>
                                </ul>
                            </li>
                            @endif

                        </ul>
                    </div>
                    <!--/.nav-collapse --> 
                </div>
                <!-- /container --> 
            </div>
            <!-- /navbar-inner --> 
        </div>
        <!-- /navbar -->
        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <ul class="mainnav">
                        <li class="active"><a href="index.html"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
                        <li><a href="reportes.html"><i class="icon-list-alt"></i><span>Reportes</span> </a> </li>
                        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><span>Motuario</span> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?php //echo 'index.php/PedidoEmprestimo_controller/pesquisarCombatente' ?>">Registar Pedido</a></li>
                                <li><a href="<?php //echo 'index.php/PedidoEmprestimo_controller/getPedidoByMes' ?>">Lista de Pedido</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-long-arrow-down"></i><span>Combatente</span> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="formulario.html">Registar Combatente</a></li>
                                <li><a href="faq.html">Listar Combantente</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /container --> 
            </div>
            <!-- /subnavbar-inner --> 
        </div>
        <!-- /subnavbar -->
        <div class="main">
            <div class="main-inner">
                <div class="container">
                    <div class="row">
                        <!--Main contente-->
                        @yield('content')
                    </div>
                </div>
                <!-- /container --> 
            </div>
            <!-- /main-inner --> 
        </div>
        <!-- /main -->
        <div class="extra">
            <div class="extra-inner">
                <div class="container">
                    <div class="row">
                        <div class="span3">
                            <h4>
                                FPRN</h4>
                            <ul>
                                <li><a href="javascript:;">facebbok</a></li>
                                <li><a href="javascript:;">Intagram</a></li>
                                <li><a href="javascript:;">twitter</a></li>
                                <li><a href="javascript:;">whatsapp</a></li>
                            </ul>
                        </div>
                        <!-- /span3 -->
                        <div class="span3">
                            <h4>
                                Suporte</h4>
                            <ul>
                                <li><a href="javascript:;">Dabula</a></li>
                            </ul>
                        </div>
                        <!-- /span3 -->
                    </div>
                    <!-- /row --> 
                </div>
                <!-- /container --> 
            </div>
            <!-- /extra-inner --> 
        </div>
        <!-- /extra -->
        <div class="footer">
            <div class="footer-inner">
                <div class="container">
                    <div class="row">
                        <div class="span12"> &copy; 2017 <a href="#">DAW</a>. </div>
                        <!-- /span12 --> 
                    </div>
                    <!-- /row --> 
                </div>
                <!-- /container --> 
            </div>
            <!-- /footer-inner --> 
        </div>
        <!-- /footer --> 
        <!-- Le javascript<script src="
        ================================================== --> 
      
         <script src=" {{ asset('js/excanvas.min.js') }}"></script>  
        <script src=" {{ asset('js/chart.min.js') }}" type="text/javascript"></script> 
        <script src=" {{ asset('js/bootstrap.min.js') }}"></script> 
         <script language="javascript" type="text/javascript" src=" {{ asset('js/full-calendar/fullcalendar.min.js') }}"></script> 
         <script src=" {{ asset('js/base.js') }}"></script>  
        <script src="{{ asset('js/app.js') }}"></script>

    </body>
</html>
