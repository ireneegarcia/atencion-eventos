<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Your title here') </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('/img/favicon.ico')}}" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{asset('/plugins/bootstrap/css/bootstrap.min.css')}}">
    <!-- Fonts from Font Awsome -->
    <link rel="stylesheet" href="{{asset('/css/font-awesome.min.css')}}">
    <!-- CSS Animate -->
    <link rel="stylesheet" href="{{asset('/css/animate.css')}}">
    <!-- Custom styles for this theme -->
    <link rel="stylesheet" href="{{asset('/css/main.css')}}">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- Feature detection -->
    <script src="{{asset('/js/modernizr-2.6.2.min.js')}}"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('/js/html5shiv.js')}}"></script>
    <script src="{{asset('/js/respond.min.js')}}"></script>
    <![endif]-->
    <style>
        html {
            background: url({{asset('/img/fondo.jpg')}}) no-repeat top left fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            overflow-y:hidden;
        }
        #pre-load-web {width:100%;position:absolute;background:#92def8;left:0px;top:0px;z-index:100000}
        /*aqui centramos la imagen si coloco margin left -30 es por que la imagen mide 60 */
        #pre-load-web #imagen-load{left:50%;margin-left:-30px;position:absolute}
        @media screen and (max-height:550px){html {overflow-y:visible;} .row{margin-right: -15px;}}
    </style>

    <script type="text/javascript">
        function GetBaseURL() {
            return "{{asset("")}}"
        }
    </script>
    
</head>
<body>
@section('content')
@show

</body>
</html>