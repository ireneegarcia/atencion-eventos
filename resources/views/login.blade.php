<!-- Stored in resources/views/login.blade.php -->

@extends('layouts.header')

@section('title')
    Log in
@endsection

@section('content')
    <body>
    <section id="login-container">

        <div class="row">
            <div class="col-md-3" id="login-wrapper">
                <div class="panel panel-primary animated flipInY">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            INICIAR SESIÓN
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p> Ingresa los datos para acceder a tu cuenta</p>
                        <form class="form-horizontal" role="form" action="{{ url('/login') }}" method="post">
                            <input type="hidden" id="firebase_token" name="_token" value="jjjjjkk">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" id="email" placeholder="Email" value="irenegarcia103@gmail.com">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" placeholder="Password" value="1234567">
                                    <i class="fa fa-lock"></i>
                                    <a href="javascript:void(0)" class="help-block">¿Olvidó su clave?</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <a id="btnSignIn" class="btn btn-primary btn-block">Acceder</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!--Global JS-->
    <script src="{{asset('/js/jquery-1.10.2.min.js')}}"></script>
    <script src="{{asset('/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/plugins/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('/plugins/nanoScroller/jquery.nanoscroller.min.js')}}"></script>
    <script src="{{asset('/js/application.js')}}"></script>
    <script src="{{asset('/js/helper.js')}}"></script>
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-46627904-1', 'authenticgoods.co');
        ga('send', 'pageview');


        $( document ).ready(function() {

            $( "#btnSignIn" ).click(function() {
                $.ajax({
                    type: "POST",
                    url: GetBaseURL()+"/api/login",
                    data: {
                        email: $("#email").val(),
                        password: $("#password").val(),
                        firebase_token: " "
                    },
                    dataType: "json",
                    success: function(data) {
                        CookiesSave("token",  data.account.token);
                        delete data.account.token;
                        CookiesSave("user",  data.account);
                        RedirecticnTo(GetBaseURL()+"/dashboard");
                    },
                    error: function (data) {
                        console.log(data);
                    }
                });
            });

        });

        // AJA
    </script>
    </body>

@endsection