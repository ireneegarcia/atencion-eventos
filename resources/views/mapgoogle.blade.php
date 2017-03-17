@extends('layouts.dashboard')

@section('title')
    Google Map
@endsection

@section('content')

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

@endsection

@section('document-ready')
    <script>
        $(document).ready(function() {

            $('#userInfo').html(GetUser() ? GetUser().name + ' <i class="fa fa-angle-down"></i>': "" + ' <i class="fa fa-angle-down"></i>');
        });

    </script>

@endsection