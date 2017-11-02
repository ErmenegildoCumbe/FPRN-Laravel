<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>FPRN - Login</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes"> 

        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/bootstrap-responsive.min.css') }}" rel="stylesheet" type="text/css" />

        <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

        <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/pages/signin.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/estilo.css') }}" rel="stylesheet" type="text/css">

    </head>

    <body>
      
        <div class="img-responsive">
            <img class="img-login" src="{{ asset('img/logo_login.jpg') }}">
        </div>
        <div class="account-container">

            <div class="content clearfix">
                <form action="{{ route('login') }}" method="post">
                    {{ csrf_field() }}
                    <h1>Membro Login</h1>		
                    <!-- <div class="login-fields"> -->
                        
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                   <!--  </div> --> <!-- /login-fields -->
                         <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Manter sassao iniciada
                                    </label>
                                </div>
                            </div>
                        </div>

                    <!-- <div class="login-actions">
                        <!-- <span class="login-checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                            </label>
                        </span> -->
                       <!--  <input type="submit" class="button btn btn-success btn-large" value="Entrar">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                    </div> <!-- .actions --> 
                    <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-success btn-large">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    Esqueceu-se da senha?
                                </a>
                            </div>
                        </div>
                </form>
            </div> <!-- /content -->
        </div> <!-- /account-container -->

        <div class="login-extra">
            <a href="#">Lembrar a senha</a>
        </div> <!-- /login-extra -->

        <script src="{{ asset ('js/jquery-1.7.2.min.js') }}"></script>
        <script src="{{ asset ('js/bootstrap.js') }}"></script>
       <!--  <script src="<?php// echo base_url("assests/js/signin.js") ?>"></script> -->

    </body>

</html>
