@extends('layouts.dashboard')

@section('title')
    Servicios
@endsection

@section('content')
    <body>
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li>Dashboard
            </li>
            <li>Usuarios</li>
            <li class="active">Servicios</li>
        </ul>
        <!--breadcrumbs end -->
    </div>

    <!--main content start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a href="{{ url('/signup/3') }}">
                            <i class="fa fa-user"></i>
                            <span>Registrar nuevo usuario servicio</span>
                        </a>
                    </h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ( $services as $service )

                            <tr>
                                <td>{{$service->name}}</td>
                                <td>{{$service->phone}}</td>
                                <td>{{$service->ci}}</td>
                                <td>{{$service->registration_date}}</td>
                                <td>{{$service>last_login}}</td>

                            </tr>

                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!--main content end-->
    </body>
@endsection

@section('document-ready')
    <script>
        $(document).ready(function() {

            //$('#userInfo').html(GetUser() ? GetUser().name + ' <i class="fa fa-angle-down"></i>': "" + ' <i class="fa fa-angle-down"></i>');

            MyUser();

            $('#example').dataTable();
        });

    </script>

@endsection