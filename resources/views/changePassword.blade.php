@extends('layouts.dashboard')

@section('title')
    Cambio de clave
@endsection

@section('content')
    <body>
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a>
            </li>
            <li class="active">Cambio de clave</li>
        </ul>
        <!--breadcrumbs end -->
        <h1 class="h1">Cambio de clave</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Información del usuario</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>



                <div class="panel-body">
                    <form class="form-horizontal form-border">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre completo</label>
                            <div class="input-group ">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input id="username" type="text" disabled="disabled" class="form-control username" placeholder="Nombre completo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <div class="input-group ">
                                <span class="input-group-addon">@</span>
                                <input type="email" disabled="disabled" class="form-control useremail" id="email" placeholder="Email">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Cambio de clave</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>


                <div class="panel-body">
                    <form role="form" id="form">
                        <div class="form-group">
                            <label class="control-label">
                                <i class="fa fa-lock"></i>
                                Introduzca su clave actual
                            </label>
                            <input type="password" class="form-control "  name="input7" id="input7" required="" placeholder="Password">
                            <br/>
                            <label class="control-label">
                                <i class="fa fa-lock"></i>
                                Introduzca su nueva clave
                            </label>
                            <input type="password" class="form-control " required=""  name="input8" id="input8" placeholder="Re-Type Password">
                        </div>
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" >
                            Cambiar clave
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </body>
@endsection

@section('document-ready')
    <script>
        $(document).ready(function() {

            $('#userInfo').html(GetUser() ? GetUser().name + ' <i class="fa fa-angle-down"></i>': "" + ' <i class="fa fa-angle-down"></i>');

            var jsonObjeto =JSON.parse(GetCookie("user"));

            $('#username').val(jsonObjeto.name);
            $('#email').val(jsonObjeto.email);

            $('#form').validate({
                rules: {
                    input7: {
                        required: true,
                        minlength: 5
                    },
                    input8: {
                        required: true,
                        minlength: 5
                    }
                },
                highlight: function(element) {
                    $(element).closest('.form-group').removeClass('success').addClass('error');
                },
                success: function(element) {
                    element.text('OK!').addClass('valid')
                        .closest('.form-group').removeClass('error').addClass('success');
                }
            });
        });

    </script>

@endsection