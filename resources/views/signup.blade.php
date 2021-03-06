@extends('layouts.dashboard')

@section('title')
    Sign up
@endsection

@section('content')
    <body>
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a>
            </li>
            <li class="active">Usuarios</li>
        </ul>
        <!--breadcrumbs end -->
        <h1 class="h1">Sign up</h1>
    </div>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        Información del usuario
                    </h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" id="form">
                        <div class="form-group">
                            <label class="control-label">
                                <i class="fa fa-user"></i>
                                Nombre completo del contacto
                            </label>
                            <input type="text" class="form-control" name="input1" id="input1" required="" placeholder="Nombre completo">
                        </div>
                        <div class="form-group">
                            <label class="control-label">
                                <i class="fa fa-user"></i>
                                Cédula
                            </label>

                            <div>
                                <select id="tipo_cedula" class="form-control col-sm-2" >
                                    <option value="V-">V-</option>
                                    <option value="E-">E-</option>
                                </select>

                                <div class="col-sm-11">
                                    <input type="text" class="form-control" name="input15" id="input15" required="" placeholder="V-99999999">
                                </div>
                            </div>
                        </div>

                        <div id="form-email" class="form-group">
                            <label class="control-label">
                                <i class="fa fa-envelope"></i>
                                Email
                            </label>
                            <input type="email" class="form-control " required="" name="input9" id="input9" placeholder="Enter a valid e-mail">
                        </div>
                        <div class="form-group">
                            <label class="control-label">
                                <i class="fa fa-phone"></i>
                                Número de teléfono
                            </label>
                            <input type="text" class="form-control " name="input11" id="input11" required="" placeholder="Número de teléfono">
                        </div>
                        <div class="form-group">
                            <label class="control-label">
                                <i class="fa fa-lock"></i>
                                Password
                            </label>
                            <input type="password" class="form-control " name="input7" id="input7" required="" placeholder="Password">
                            <br/>
                            <input type="password" class="form-control " required="" name="input8" id="input8" placeholder="Re-Type Password">
                        </div>
                        <div class="form-group">
                            <label class="control-label">
                                <i class="fa fa-users"></i>
                                Rol
                            </label>
                            <input type="text" id="role" value ="{{$role}}" class="form-control" disabled="disabled" placeholder="Rol del usuarios">
                        </div>


                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" onclick="registrer()">
                            Registrar
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

        var opc;
        function registrer() {
            /*console.log($('#input9').val());
             console.log($('#input7').val());
             console.log($('#input1').val());
             console.log($('#input11').val());
             console.log($('#input15').val());
             console.log($('#exampleInputFile').val());*/
            var cedula = $('#tipo_cedula').val() + $('#input15').val();
            console.log(cedula);
            $.ajax({
                type: "POST",
                url: GetBaseURL()+"api/register",
                data: {
                    email: $('#input9').val(),
                    password: $('#input7').val(),
                    name: $('#input1').val(),
                    phone: $('#input11').val(),
                    ci: cedula,
                    role: opc
                },
                dataType: "json",
                success: function(data) {

                    swal({
                        title: "Listo",
                        text: "Usuario registrado exitosamente",
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
                    });
                }
            });
        }

        $(document).ready(function() {

            //$('#userInfo').html(GetUser() ? GetUser().name + ' <i class="fa fa-angle-down"></i>': "" + ' <i class="fa fa-angle-down"></i>');

            MyUser();

            $('#form').validate({
                rules: {

                    input1: {
                        required: true,
                        minlength: 3
                    },
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
                    },
                    input11: {
                        required: true,
                        minlength: 11,
                        digits: true
                    },
                    input15: {
                        required: true,
                        minlength: 5,
                        digits: true
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


        opc = $('#role').val();

        if(opc == 1)
        {
            $('#role').val("Admin");
            //console.log("Admin");
        }
        if(opc == 2)
        {
            $('#role').val("Cliente");
            //console.log("Client");
        }
        if(opc == 3)
        {
            $('#role').val("Service");
            // console.log("Service");
        }
        if(opc == 4)
        {
            $('#role').val("Operador");
            // console.log("Operador");
        }

        /*   switch(opc) {
         case 2:
         console.log("Admin");
         break;
         case 1:
         console.log("Client");
         break;
         case 3:
         console.log("Service");
         break;
         case 4:
         console.log("Operador");
         break;
         default:
         console.log("error");
         }*/

    </script>
@endsection