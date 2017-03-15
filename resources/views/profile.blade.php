@extends('layouts.dashboard')

@section('title')
    Profile
@endsection

@section('content')

    <body>
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="#">Dashboard</a>
            </li>
            <li class="active">Perfil</li>
        </ul>
        <!--breadcrumbs end -->
        <h1 class="h1">Mi perfil</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 id="userInfo" class="panel-title">Información del usuario</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal form-border">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre completo</label>

                            <input type="text" disabled="disabled" class="form-control username" placeholder="Nombre completo">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" disabled="disabled" class="form-control useremail" id="exampleInputEmail1" placeholder="Email">
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
                    <h3 class="panel-title">Condiciones</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal form-border">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Listado de condiciones</label>
                            <select id="condition_types" class="form-control input-lg">
                                @foreach ( $conditions as $condition )

                                    <option value="{{$condition->id}}">

                                        {{$condition->name}}

                                    </option>

                                @endforeach

                            </select>
                        </div>

                    </form>
                    <div class="row">

                        <!-- Button trigger modal -->
                        <button class="btn btn-primary " data-toggle="modal" onclick="add_condition()">
                            Incluir condición
                        </button>

                        <!-- Button trigger modal -->
                        <button class="btn btn-primary " data-toggle="modal" data-target="#formModal" onclick="my_condition()">
                            Mis condiciones
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">Contactos de emergencia</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal form-border">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre completo del contacto</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Introduzca el nombre completo">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Número de teléfono del contacto</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Introduzca el número">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Parentezco</label>
                            <select class="form-control input-sm">
                                <option value="">.input-sm</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Prioridad</label>
                            <select class="form-control input-sm">
                                <option value="">.input-sm</option>
                            </select>
                        </div>
                    </form>
                    <div class="row">
                        <!-- Button trigger modal -->
                        <button class="btn btn-primary " data-toggle="modal" data-target="#scrollingModal">
                            Incluir contacto
                        </button>

                        <!-- Button trigger modal -->
                        <button class="btn btn-primary " data-toggle="modal" data-target="#formModal">
                            Remover contacto
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Form Modal -->
    <div class="modal fade" id="formModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> Usted ha incluido previamente las siguientes condiciones...</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Condiciones</label>
                            <div class="col-sm-10">
                                <select id="my_condition" class="form-control input-lg">
                                </select>
                            </div>
                        </div>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary">Remover</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Form Modal -->

    <!-- Scrolling Modal -->
    <div class="modal fade" id="scrollingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Usted ha incluido previamente las siguientes condiciones...</h4>
                </div>
                <div class="modal-body modal-scroll">
                    <p >

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="add_condition()">Incluir</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Scrolling Modal -->

    <script>

        function my_condition() {

          var jsonObjeto =JSON.parse(GetCookie("user"));
            $.ajax({
                type: "POST",
                url: GetBaseURL()+"api/my_condition",
                data: {
                    account: jsonObjeto.id
                },
                dataType: "json",
                success: function(data) {

                    select = document.getElementById('my_condition');
                    
                    for (i = 0; i < select.options.length; i++) {
                        select.remove(i);
                    }

                    for (var i = 0; i<data.length ; i++){
                        var opt = document.createElement('option');
                        opt.value = data[i].condition;
                        opt.innerHTML = data[i].condition;
                        select.add( opt );
                    }
                },
                error: function (data) {
                    // console.log(data);
                    swal({
                        title: "Algo salió mal",
                        text: "Por favor, intente de nuevo incluir su condición",
                        type: "error",
                        showCancelButton: false,
                        closeOnConfirm: true,
                        confirmButtonColor: "gray",
                        cancelButtonColor: "red"
                    }, function(){
                        location.reload();
                    });
                }
            });

        }

        function add_condition(){
            var jsonObjeto =JSON.parse(GetCookie("user"));
            console.log(jsonObjeto.id);
            console.log($('#condition_types').val());
            swal({   title: "¿Está seguro que desea incluir esta condición?",
                    text: "Luego de incluirla podrá comprobar en la opción Mis Condiciones",
                    type: "info",
                    showCancelButton: true,
                    //confirmButtonColor: "blue",
                    cancelButtonColor: "red",
                    confirmButtonText: "Incluir",
                    cancelButtonText: "Cancelar",
                    closeOnConfirm: false,
                    closeOnCancel: false },
                function(isConfirm)
                {
                    if (isConfirm)
                    {
                        $.ajax({
                            method: 'POST',
                            url: GetBaseURL()+"api/add_condition",
                            data: {
                                account: jsonObjeto.id,
                                condition: $('#condition_types').val()
                            }
                        });
                        swal({   title: "¡Listo!...Esta condición ha sido incluida",   text: "Espere un momento mientras se actualiza",   timer: 2000,   showConfirmButton: false }
                            , function(){
                                location.reload();
                            });

                    }
                    else
                    {
                        swal("Cancelado", "","error");
                    }
                });
         }

    </script>
    </body>

@endsection
@section('document-ready')
    <script>
        $(document).ready(function() {



            $('#userInfo').html(GetUser() ? GetUser().name + ' <i class="fa fa-angle-down"></i>': "" + ' <i class="fa fa-angle-down"></i>');
            $('.username').val(GetUser() ? GetUser().name : "" );
            $('.useremail').val(GetUser() ? GetUser().email : "" );


        });

    </script>

@endsection