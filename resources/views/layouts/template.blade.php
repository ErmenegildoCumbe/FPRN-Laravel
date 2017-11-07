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
                <link href="{{ asset('css/estilo.css') }}" rel="stylesheet">
              <link href="{{ asset('css/pages/dashboard.css') }}" rel="stylesheet">
              <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
              <!--  <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> -->
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

        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
        <script src="{{ asset('js/jquery-1.12.4.js') }}"></script>
        <script src=" {{ asset('js/bootstrap.min.js') }}"></script>
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>  -->
        <!-- <script src="{{ asset('js/jquery-1.12.4.js') }}"></script> -->
        <script src="{{ asset ('js/jquery-ui.js') }}"></script>
        
        <!--jquery de autocomplete-->
        
		
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container"> 
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </a>
                    <a class="brand" href="#"> <img style="width: 110px; height: 25px;" class="img-responsive" src="{{ asset('img/logo_t.png') }} "></a>
                    @if(!Auth::check())
                    <div class="nav">
                        <a href="logar">Login </a> 
                    </div>
                    @endif 
                    <!-- sbj -->
                    @if(Auth::check())
                    <div class="nav-collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                                        class="fa icon-cog"></i> Conta <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li ><a href="javascript:;">Definicoes </a> </li>
                                    <li ><a href="javascript:;">Ajuda</a> </li>
                                </ul>
                            </li>
                            
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><img src="{{ asset(Auth::user()->foto) }}" alt="perfil" style="width: 32px; height: 32px; position: absolute; float: left;border-radius: 50%; margin-top: 0px;"> <span>{{ Auth::user()->name }}</span>  <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Perfil</a></li>
                                    <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Sair</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            

                        </ul>
                    </div>
                    @endif
                    <!--/.nav-collapse --> 
                </div>
                <!-- /container --> 
            </div>
            <!-- /navbar-inner --> 
        </div>
        <!-- /navbar -->
        @if(Auth::check())
        <div class="subnavbar">
            <div class="subnavbar-inner">
                <div class="container">
                    <ul class="mainnav">
                        <li class="active"><a href=""><i class="fa icon-dashboard"></i><span>Dashboard</span> </a> </li>
                        <li><a href="/admin"><i class="fa icon-list-alt"></i><span>Reportes</span> </a> </li>
                        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa icon-user"></i><span>Motuario</span> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="/">Registar Pedido</a></li>
                                <li><a href="{{ route('pedidoempresti') }}">Lista de Pedido</a></li>
                            </ul>
                        </li>
                        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa icon-long-arrow-down"></i><span>Combatente</span> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('combatente.create') }}">Registar Combatente</a></li>
                                <li><a href="{{ route('combatente.index') }}">Listar Combantente</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /container --> 
            </div>
            <!-- /subnavbar-inner --> 
        </div>
        @endif
        <!-- /subnavbar -->

        <!-- getss -->
        <div class="row tama">
            @yield('page')
        </div>
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
        
         <script language="javascript" type="text/javascript" src=" {{ asset('js/full-calendar/fullcalendar.min.js') }}"></script> 
         <script src=" {{ asset('js/base.js') }}"></script>  
        <!-- <script src="{{ asset('js/app.js') }}"></script> -->
        <!-- Scripts que estavam no cabeçalho... -->
        <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> -->
        <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
        

    </body>
</html>
