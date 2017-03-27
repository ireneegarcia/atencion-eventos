@extends('layouts.dashboard')

@section('title')
    Vector Map
@endsection

@section('content')
    <body>
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li>Dashboard
            </li>
            <li>Mapas</li>
            <li class="active">Vector Map</li>
        </ul>
        <!--breadcrumbs end -->
    </div>

    <!--main content start-->
    <section>
        <section id="main-content">

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-map-marker"></i>
                                Mapa mundial - Oficinas internacionales
                            </h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="world-map" style="height: 300px" class="map"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">
                                <i class="fa fa-map-marker"></i>
                                Mapa de Venezuela - Oficinas nacionales
                            </h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="ve-map" style="height: 300px"></div>
                        </div>
                    </div>
                </div>
            </div>



        </section>
    </section>
    <!--main content end-->


    </body>
@endsection

@section('document-ready')


    <script>

        $(document).ready(function() {

            //$('#userInfo').html(GetUser() ? GetUser().name + ' <i class="fa fa-angle-down"></i>': "" + ' <i class="fa fa-angle-down"></i>');

            MyUser();
        });

    </script>

@endsection