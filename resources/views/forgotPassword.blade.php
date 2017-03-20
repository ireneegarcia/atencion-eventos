<!-- Stored in resources/views/login.blade.php -->

@extends('layouts.header')

@section('title')
    ¿Olvido su clave?
@endsection

@section('content')
    <body>
    <section id="login-container">

        <div class="row">
            <div class="col-md-3" id="login-wrapper">
                <div class="panel panel-primary animated flipInY">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            CAMBIAR CLAVE
                        </h3>
                    </div>
                    <div class="panel-body">
                        <p> Ingresa al menos uno de los siguientes datos</p>
                        <form class="form-horizontal" role="form" action="{{ url('/login') }}" method="post">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" id="email" placeholder="correo@gmail.com">
                                    <i class="fa fa-envelope"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="password" placeholder="V-99999999">
                                    <i class="fa fa-user"></i>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <a href="{{ url('/login') }}" class="help-block">Iniciar sesión</a>
                                    <!-- Button trigger modal -->
                                    <button type="button"  id="btnPassword" class="btn btn-primary btn-block" >
                                        Enviar nueva contraseña
                                    </button>
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


        $( "#btnPassword" ).click(function() {
           console.log($('#email').val());
           console.log($('#password').val());
            $.ajax({
                type: "POST",
                url: GetBaseURL()+"api/forgot_password",
                data: {
                    email: $('#email').val(),
                    ci: $('#password').val()
                },
                dataType: "json",
                success: function(data) {

                    swal({
                        title: "Listo",
                        text: "Se ha enviado una nueva contraseña a su correo",
                        type: "success"
                    });
                },
                error: function (data) {
                    console.log(data);
                    swal({
                        title: "Algo salió mal",
                        text: data.responseJSON.error,
                        type: "error",
                        showCancelButton: false,
                        closeOnConfirm: true,
                        confirmButtonColor: "gray",
                        cancelButtonColor: "red"
                    }, function(){
                        //  location.reload();
                    });
                }
            });
        });

    </script>

    </body>

@endsection