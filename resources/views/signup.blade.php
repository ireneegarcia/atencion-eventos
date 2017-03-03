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
                            <p >Already a member? <a href="pages-login.html"><strong>Sign In</strong></a></p>
                            <form role="form">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Name</label>
                                    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Email</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Enter your email">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Retype Password</label>
                                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Retype your password">
                                </div>

                                <a href="index.html" class="btn btn-primary btn-block">Sign Up</a>
                            </form>

                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!--Global JS-->
        <script src="assets/js/jquery-1.10.2.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/waypoints/waypoints.min.js"></script>
        <script src="assets/plugins/nanoScroller/jquery.nanoscroller.min.js"></script>
        <script src="assets/js/application.js"></script>
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
            })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

            ga('create', 'UA-46627904-1', 'authenticgoods.co');
            ga('send', 'pageview');

        </script>

    </body>

@endsection