@extends('layouts.dashboard')

@section('title')
    Google Map
@endsection

@section('content')
    <body>
    <div class="col-md-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li>Dashboard
            </li>
            <li>Mapas</li>
            <li class="active">Google Map</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
    <!--main content start-->
    <!--  <section >
          <section >
              <div class="row">
                  <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="#">Dashboard</a>
                        </li>
                        <li>Maps</li>
                        <li class="active">Google Maps</li>
                    </ul>

                    <h1 class="h1">Google Maps</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Markers</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="map-markers" style="height: 300px"></div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Geolocations</h3>
                            <div class="actions pull-right">
                                <i class="fa fa-chevron-down"></i>
                                <i class="fa fa-times"></i>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div id="map-geolocation" style="height: 300px"></div>

                        </div>
                    </div>
                </div>
            </div>

        </section>
    </section>-->
    <!--main content end-->

    </body>
@endsection

@section('document-ready')
    <script>
        $(document).ready(function() {

            $('#userInfo').html(GetUser() ? GetUser().name + ' <i class="fa fa-angle-down"></i>': "" + ' <i class="fa fa-angle-down"></i>');
        });

    </script>

@endsection