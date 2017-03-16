@extends('layouts.header')

@section('title')
    Sign up
@endsection

@section('content')
    <body>
    <section id="login-container">

        <div class="row">
            <div class="col-md-3" id="login-wrapper">
                <div class="panel panel-primary animated flipInY">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Sign Up
                        </h3>
                    </div>
                    <div class="panel-body">

                        <form role="form" id="form">
                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input type="text" class="form-control" required="" name="input5" id="input5" placeholder="Min value is 5">
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input type="email" class="form-control " required="" name="input9" id="input9" placeholder="Enter a valid e-mail">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input type="password" class="form-control " name="input7" id="input7" required="" placeholder="Password">
                                <br/>
                                <input type="password" class="form-control " required="" name="input8" id="input8" placeholder="Re-Type Password">
                            </div>

                            <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block" class="btn btn-primary">Registrar</button>
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
    <!--Validation Profile-->
    <script src="{{asset('/plugins/icheck/js/icheck.min.js')}}"></script>
    <script src="{{asset('/plugins/validation/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/plugins/validation/js/jquery.validate.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#form').validate({
                rules: {

                    input5: {
                        required: true,
                        min: 5
                    },
                    input7: {
                        required: true,
                        minlength: 5
                    },
                    input8: {
                        required: true,
                        minlength: 5,
                        equalTo: "#input7"
                    },
                    input9: {
                        required: true,
                        email: true
                    }
                },
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('success').addClass('error');
                }
                /*success: function(element) {
                    element.text('OK!').addClass('valid')
                        .closest('.form-group').removeClass('error').addClass('success');
                }*/
            });


        });

        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-46627904-1', 'authenticgoods.co');
        ga('send', 'pageview');

    </script>

    </body>

@endsection