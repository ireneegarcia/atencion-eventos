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
    <!-- DataTables-->
    <link rel="stylesheet" href="{{asset('/plugins/dataTables/css/dataTables.css')}}">
    <!-- Vector Map  -->
    <link rel="stylesheet" href="{{asset('/plugins/jvectormap/css/jquery-jvectormap-1.2.2.css')}}">
    <!-- ToDos  -->
    <link rel="stylesheet" href="{{asset('/plugins/todo/css/todos.css')}}">
    <!-- Morris  -->
    <link rel="stylesheet" href="{{asset('/plugins/morris/css/morris.css')}}">
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,900,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>
    <!-- Sweet alert -->
    <script src="{{ asset('/plugins/sweetalert/dist/sweetalert.min.js') }}" type="text/javascript"></script>
    <link href="{{ asset('/plugins/sweetalert/dist/sweetalert.css') }}" rel="stylesheet" type="text/css"/>
    <!-- Feature detection -->
    <script src="{{asset('/js/modernizr-2.6.2.min.js')}}"></script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="{{asset('/js/html5shiv.js')}}"></script>
    <script src="{{asset('/js/respond.min.js')}}"></script>
    <![endif]-->
</head>
<body>

<section id="container">
    <header id="header">
        <!--logo start-->
        <div class="brand">

        </div>
        <!--logo end-->
        <div class="toggle-navigation toggle-left">
            <button type="button" class="btn btn-default" id="toggle-left" data-toggle="tooltip" data-placement="right" title="Toggle Navigation">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="user-nav">
            <ul>
                <li class="dropdown messages">
                    <span class="badge badge-danager animated bounceIn" id="new-messages">5</span>
                    <button type="button" class="btn btn-default dropdown-toggle options" id="toggle-mail" data-toggle="dropdown">
                        <i class="fa fa-envelope"></i>
                    </button>
                    <ul class="dropdown-menu alert animated fadeInDown">
                        <li>
                            <h1>You have <strong>5</strong> new messages</h1>
                        </li>
                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="{{asset('/img/avatar.gif')}}" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">James Bagian</span>
                                    <span class="time">30 mins</span>
                                    <div class="message-content">Lorem ipsum dolor sit amet, elit rutrum felis sed erat augue fusce...</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="{{asset('/img/avatar1.gif')}}" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">Jeffrey Ashby</span>
                                    <span class="time">2 hour</span>
                                    <div class="message-content">hendrerit pellentesque, iure tincidunt, faucibus vitae dolor aliquam...</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="{{asset('/img/avatar2.gif')}}" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">John Douey</span>
                                    <span class="time">3 hours</span>
                                    <div class="message-content">Penatibus suspendisse sit pellentesque eu accumsan condimentum nec...</div>
                                </div>
                            </a>
                        </li>

                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="{{asset('/img/avatar3.gif')}}" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">Ellen Baker</span>
                                    <span class="time">7 hours</span>
                                    <div class="message-content">Sem dapibus in, orci bibendum faucibus tellus, justo arcu...</div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div class="profile-photo">
                                    <img src="{{asset('/img/avatar4.gif')}}" alt="" class="img-circle">
                                </div>
                                <div class="message-info">
                                    <span class="sender">Ivan Bella</span>
                                    <span class="time">6 hours</span>
                                    <div class="message-content">Curabitur metus faucibus sapien elit, ante molestie sapien...</div>
                                </div>
                            </a>
                        </li>
                        <li><a href="#">Check all messages <i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>

                </li>
                <li class="profile-photo">
                    <img src="{{asset('/img/avatar.png')}}" alt="" class="img-circle">
                </li>
                <li class="dropdown settings">
                    <a id="userInfo" class="dropdown-toggle" data-toggle="dropdown" href="#">
                         <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu animated fadeInDown">
                        <li>
                            <a href="{{ url('/profile') }}"><i class="fa fa-user"></i> Profile</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-calendar"></i> Calendar</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge badge-danager" id="user-inbox">5</span></a>
                        </li>
                        <li>
                            <a href="#" id="logout" onclick="Logout()"><i class="fa fa-power-off"></i> Logout</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <div class="toggle-navigation toggle-right">
                        <button type="button" class="btn btn-default" id="toggle-right">
                            <i class="fa fa-comment"></i>
                        </button>
                    </div>
                </li>

            </ul>
        </div>
    </header>
    <div class="content" style="padding-top: 80px;">
        <!--sidebar left start-->
        <aside class="sidebar">
            <div id="leftside-navigation" class="nano">
                <ul class="nano-content">
                    <li >
                        <a href="{{ url('/') }}"><i class="fa fa-dashboard"></i><span>Dashboard</span></a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-map-marker"></i><span>Mapas</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>

                            <li><a href="{{ url('/mapgoogle') }}">Google Map</a>
                            </li>
                            <li><a href="{{ url('/mapvector') }}">Vector Map</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-bar-chart-o"></i><span>Estadisticas</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                            <li><a href="tables-basic.html">Basic Tables</a>
                            </li>
                            <li><a href="tables-data.html">Data Tables</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-table"></i><span>Usuarios</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                            <li><a href="{{ url('/clients') }}">Clientes</a>
                            </li>
                            <li><a href="{{ url('/services') }}">Servicios</a>
                            </li>
                            <li><a href="{{ url('/operators') }}">Operadores</a>
                            </li>
                            <li><a href="{{ url('/admin') }}">Administradores</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-envelope"></i><span>Mail</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                            <li><a href="mail-inbox.html">Inbox</a>
                            </li>
                            <li><a href="mail-compose.html">Compose Mail</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-bar-chart-o"></i><span>Charts</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                            <li><a href="charts-chartjs.html">Chartjs</a>
                            </li>
                            <li><a href="charts-morris.html">Morris</a>
                            </li>
                            <li><a href="charts-c3.html">C3 Charts</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-map-marker"></i><span>Maps</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                            <li><a href="map-google.html">Google Map</a>
                            </li>
                            <li><a href="map-vector.html">Vector Map</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="typography.html"><i class="fa fa-text-height"></i><span>Typography</span></a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:void(0);"><i class="fa fa-file"></i><span>Pages</span><i class="arrow fa fa-angle-right pull-right"></i></a>
                        <ul>
                            <li><a href="pages-blank.html">Blank Page</a>
                            </li>
                            <li><a href="pages-login.html">Login</a>
                            </li>
                            <li><a href="pages-sign-up.html">Sign Up</a>
                            </li>
                            <li><a href="pages-calendar.html">Calendar</a>
                            </li>
                            <li><a href="pages-timeline.html">Timeline</a>
                            </li>
                            <li><a href="pages-404.html">404</a>
                            </li>
                            <li><a href="pages-500.html">500</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </aside>
        <!--sidebar left end-->
        <!--main content start-->
        <section class="main-content-wrapper">
            <section id="main-content">
                <!--tiles start-->
                <div class="row">
                    <div class="col-md-12">
                        @section('content')
                        @show
                    </div>
                </div>
            </section>
        </section>
        <!--main content end-->
        <!--sidebar right start-->
    <aside class="sidebarRight">
        <div id="rightside-navigation ">
            <div class="sidebar-heading"><i class="fa fa-user"></i> Contacts</div>
            <div class="sidebar-title">online</div>
            <div class="list-contacts">
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="{{asset('/img/avatar.gif')}}" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>James Bagian</h4>
                        <p>Los Angeles, CA</p>
                    </div>
                    <div class="item-status item-status-online"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="{{asset('/img/avatar1.gif')}}" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Jeffrey Ashby</h4>
                        <p>New York, NY</p>
                    </div>
                    <div class="item-status item-status-online"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="{{asset('/img/avatar2.gif')}}" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>John Douey</h4>
                        <p>Dallas, TX</p>
                    </div>
                    <div class="item-status item-status-online"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="{{asset('/img/avatar3.gif')}}" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Ellen Baker</h4>
                        <p>London</p>
                    </div>
                    <div class="item-status item-status-away"></div>
                </a>
            </div>

            <div class="sidebar-title">offline</div>
            <div class="list-contacts">
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="{{asset('/img/avatar4.gif')}}" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Ivan Bella</h4>
                        <p>Tokyo, Japan</p>
                    </div>
                    <div class="item-status"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="{{asset('/img/avatar5.gif')}}" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Gerald Carr</h4>
                        <p>Seattle, WA</p>
                    </div>
                    <div class="item-status"></div>
                </a>
                <a href="javascript:void(0)" class="list-item">
                    <div class="list-item-image">
                        <img src="{{asset('/img/avatar6.gif')}}" class="img-circle">
                    </div>
                    <div class="list-item-content">
                        <h4>Viktor Gorbatko</h4>
                        <p>Palo Alto, CA</p>
                    </div>
                    <div class="item-status"></div>
                </a>
            </div>
        </div>
    </aside>
    <!--sidebar right end-->
    </div>
</section>

<!--Global JS-->
<script src="{{asset('/js/jquery-1.10.2.min.js')}}"></script>
<script src="{{asset('/plugins/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/plugins/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('/plugins/nanoScroller/jquery.nanoscroller.min.js')}}"></script>

<!--Datatable-->
<script src="{{asset('/plugins/dataTables/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('/plugins/dataTables/js/dataTables.bootstrap.js')}}"></script>

<!--Modals-->
<script src="{{asset('/js/application.js')}}"></script>
<script src="{{asset('/js/helper.js')}}"></script>

<!--Logout-->
<script>

    function Logout() {
        DeleteCookie("user");
        DeleteCookie("token");
        RedirectionTo(GetBaseURL()+"login");
    }

</script>

@section('document-ready')
@show

<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-46627904-1', 'authenticgoods.co');
    ga('send', 'pageview');


</script>
<!--Load these page level functions-->

<!--Page Level JS-->
<script src="{{asset('/plugins/countTo/jquery.countTo.js')}}"></script>
<script src="{{asset('/plugins/weather/js/skycons.js')}}"></script>
<!-- FlotCharts  -->
<script src="{{asset('/plugins/flot/js/jquery.flot.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.flot.resize.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.flot.canvas.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.flot.image.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.flot.categories.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.flot.crosshair.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.flot.errorbars.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.flot.fillbetween.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.flot.navigate.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.flot.pie.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.flot.selection.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.flot.stack.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.flot.symbol.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.flot.threshold.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.colorhelpers.min.js')}}"></script>
<script src="{{asset('/plugins/flot/js/jquery.flot.time.min.js')}}"></script>
<!--<script src="{{asset('/plugins/flot/js/jquery.flot.example.js')}}"></script>-->
<!-- Morris  -->
<script src="{{asset('/plugins/morris/js/morris.min.js')}}"></script>
<script src="{{asset('/plugins/morris/js/raphael.2.1.0.min.js')}}"></script>

<!-- Vector Map  -->

<script src="{{asset('/plugins/jvectormap/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('/plugins/jvectormap/js/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('/plugins/jvectormap/js/jquery-jvectormap-europe-mill-en.js')}}"></script>
<script src="{{asset('/plugins/jvectormap/js/jquery-jvectormap-ca-lcc-en.js')}}"></script>
<script src="{{asset('/plugins/jvectormap/js/jquery-jvectormap-it-mill-en.js')}}"></script>
<script src="{{asset('/plugins/jvectormap/js/jquery-jvectormap-us-aea-en.js')}}"></script>
<script src="{{asset('/plugins/jvectormap/js/jquery-jvectormap-us-il-chicago-mill-en.js')}}"></script>
<script src="{{asset('/plugins/jvectormap/js/jquery-jvectormap-us-ny-newyork-mill-en.js')}}"></script>
<script src="{{asset('/plugins/jvectormap/js/jquery-jvectormap-uk-mill-en.js')}}"></script>
<script src="{{asset('/plugins/jvectormap/js/jquery-jvectormap-ve-mill.js')}}"></script>
<script src="{{asset('/plugins/jvectormap/js/jquery-jvectormap-demo.js')}}"></script>
<!-- ToDo List  -->
<script src="{{asset('/plugins/todo/js/todos.js')}}"></script>

<!--Validation Profile-->
<script src="{{asset('/plugins/icheck/js/icheck.min.js')}}"></script>
<script src="{{asset('/plugins/validation/js/jquery.validate.min.js')}}"></script>
<script src="{{asset('/plugins/validation/js/jquery.validate.min.js')}}"></script>

</body>
</html>