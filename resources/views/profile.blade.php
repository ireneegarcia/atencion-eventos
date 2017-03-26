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
                                <input type="text" disabled="disabled" class="form-control username" placeholder="Nombre completo">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <div class="input-group ">
                                <span class="input-group-addon">@</span>
                                <input type="email" disabled="disabled" class="form-control useremail" id="exampleInputEmail1" placeholder="Email">
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
                        <button class="btn btn-primary " data-toggle="modal" data-target="#scrollingModal" >
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
                    <form class="form-horizontal form-border" id="form">

                        <div class="form-group">
                            <label class="control-label">Nombre completo del contacto</label>
                            <input type="text" class="form-control" name="input1" id="input1" required="" placeholder="Nombre completo">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Número de teléfono del contacto</label>
                            <input type="text" class="form-control " name="input11" id="input11" required="" placeholder="Número de teléfono">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Parentezco</label>
                            <select id="relationship_types" class="form-control input-sm">
                                @foreach ( $relationship_types as $relationship_type )

                                    <option value="{{$relationship_type->id}}">

                                        {{$relationship_type->name}}

                                    </option>

                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Prioridad</label>
                            <select id="priority_types" class="form-control input-sm">
                                @foreach ( $priority_types as $priority_type )

                                    <option value="{{$priority_type->level}}">

                                        {{$priority_type->description}}

                                    </option>

                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <button type="button" class="btn btn-primary" onclick="add_contact()">
                                Incluir contacto
                            </button>

                            <!-- Button trigger modal -->
                            <button class="btn btn-primary " data-toggle="modal" data-target="#scrollingModalContact" >
                                Mis contactos
                            </button>
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
                    <h3 class="panel-title">Foto de perfil</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>

                <div class="panel-body">
                    <form class="form-horizontal form-border" id="form">

                        <div class="form-group">
                            <input type="file" id="profileimage">
                        </div>

                        <div class="row">
                            <button type="button" class="btn btn-primary" onclick="save_photo()">
                                Guardar foto de perfil
                            </button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    <!-- Scrolling Modal CONDICIONES -->
    <div class="modal fade" id="scrollingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Usted ha incluido previamente las siguientes condiciones...</h4>
                </div>
                <div class="modal-body modal-scroll">
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
                    <button type="button" class="btn btn-primary">Remover condición</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Scrolling Modal -->

    <!-- Scrolling Modal CONTACTOS -->
    <div class="modal fade" id="scrollingModalContact" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Usted ha incluido previamente los siguientes contactos...</h4>
                </div>
                <div class="modal-body modal-scroll">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Condiciones</label>
                            <div class="col-sm-10">
                                <select id="my_contact" class="form-control input-lg">
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" >Remover contacto</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Scrolling Modal -->

    <script>


        //GUARDAR FOTO DE PERFIL
        function save_photo() {

            var inputFile = document.querySelector('input[type="file"]');
            var formData = new FormData();
            formData.append('photo', inputFile.files[0]);
            formData.append('ci', GetUser().ci);
            fetch(GetBaseURL()+"api/save_photo", {
                method: 'POST',
                body: formData
            }).then(function(data) {
                swal({
                    title: "Listo",
                    text: "Foto guardada exitosamente",
                    type: "success"
                });
            }).catch(function(err) {
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
            });
        }

        //INICIO CONDICIONES
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
                        text: "",
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
                            },
                            success: function(data) {

                                swal({
                                    title: "Listo",
                                    text: "La condición: " + $('#condition_types').val() + " ha sido incluida",
                                    type: "success"
                                });
                            },
                            error: function (data) {
                                swal({
                                    title: "Algo salió mal",
                                    text: "Por favor, intente de nuevo incluir su condición",
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

                    }
                    else
                    {
                        swal("Cancelado", "","error");
                    }
                });
        }
        //FIN CONDICIONES

        //INICIO CONTACTO DE EMERGENCIA

        function my_contact() {

            var jsonObjeto =JSON.parse(GetCookie("user"));
            $.ajax({
                type: "POST",
                url: GetBaseURL()+"api/my_contact",
                data: {
                    account: jsonObjeto.id
                },
                dataType: "json",
                success: function(data) {


                    select = document.getElementById('my_contact');

                    for (i = 0; i < select.options.length; i++) {
                        select.remove(i);
                    }

                    for (var i = 0; i<data.length ; i++){
                        //console.log(data[i].phone);
                        var opt = document.createElement('option');
                        opt.value = data[i].phone;
                        opt.innerHTML = data[i].name +" - "+data[i].phone+" - "+data[i].relationship;
                        select.add( opt );
                    }
                },
                error: function (data) {
                    // console.log(data);
                    swal({
                        title: "Algo salió mal",
                        text: "Por favor, intente de nuevo consultar sus contactos",
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

        }

        function add_contact() {
            var jsonObjeto =JSON.parse(GetCookie("user"));

            if($('#input1').val() == '' || $('#input11').val() == '')
            {
                swal({
                    title: "Algo salió mal",
                    text: "Por favor, verifique el nombre y teléfono de su contacto",
                    type: "error",
                    showCancelButton: false,
                    closeOnConfirm: true,
                    confirmButtonColor: "gray",
                    cancelButtonColor: "red"
                }, function(){
                    //location.reload();
                });
            }
            else
            {
                if($('#input1').val().length < 4 || $('#input11').val().length != 11)
                {
                    swal({
                        title: "Algo salió mal",
                        text: "El nombre debe contener mínimo 3 caracteres, el número debe contener 11 dígitos",
                        type: "error",
                        showCancelButton: false,
                        closeOnConfirm: true,
                        confirmButtonColor: "gray",
                        cancelButtonColor: "red"
                    }, function(){
                    });
                }
                else
                {
                    if( $('#input1').val().length >=5 &&
                        $('#input11').val().length == 11)
                    {

                        swal({   title: "¿Está seguro que desea incluir este contacto?",
                                text: "Nombre completo: "+$('#input1').val(),
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
                                        url: GetBaseURL()+"api/my_contact",
                                        data: {
                                            account: jsonObjeto.id,
                                            name: $('#input1').val(),
                                            phone: $('#input11').val(),
                                            relationship: $('#relationship_types').val(),
                                            priority: $('#priority_types').val()
                                        },
                                        success: function(data) {

                                            swal({
                                                title: "Listo",
                                                text: "El contacto: " + $('#input1').val() + " ha sido incluido",
                                                type: "success"
                                            });
                                        },
                                        error: function (data) {
                                            swal({
                                                title: "Algo salió mal",
                                                text: "Por favor, intente de nuevo incluir su contacto de emergencia",
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

                                }
                                else
                                {
                                    swal("Cancelado", "","error");
                                }
                            });
                    }
                }
            }



        }
        //FIN CONTACTO DE EMERGENCIA

    </script>
    </body>

@endsection
@section('document-ready')
    <script>
        $(document).ready(function() {

            $('#userInfo').html(GetUser() ? GetUser().name + ' <i class="fa fa-angle-down"></i>': "" + ' <i class="fa fa-angle-down"></i>');
            $('.username').val(GetUser() ? GetUser().name : "" );
            $('.useremail').val(GetUser() ? GetUser().email : "" );

            my_condition();
            my_contact();

            $('#form').validate({
                rules: {
                    input1: {
                        required: true,
                        minlength: 3
                    },
                    input11: {
                        required: true,
                        minlength: 11,
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

    </script>

@endsection