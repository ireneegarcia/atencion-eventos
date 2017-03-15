@extends('layouts.dashboard')

@section('title')
    Dashboard
@endsection

@section('content')
    <body>
    <div class="row">
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-tile detail tile-red">
                <div class="content">
                    <h1 class="text-left timer" data-from="0" data-to="180" data-speed="2500"> </h1>
                    <p>Clientes</p>
                </div>
                <div class="icon"><i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-tile detail tile-turquoise">
                <div class="content">
                    <h1 class="text-left timer" data-from="0" data-to="56" data-speed="2500"> </h1>
                    <p>Servicios</p>
                </div>
                <div class="icon"><i class="fa fa-truck"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-tile detail tile-blue">
                <div class="content">
                    <h1 class="text-left timer" data-from="0" data-to="32" data-speed="2500"> </h1>
                    <p>Casos por atender</p>
                </div>
                <div class="icon"><i class="fa fa-eye"></i>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="dashboard-tile detail tile-purple">
                <div class="content">
                    <h1 class="text-left timer" data-to="105" data-speed="2500"> </h1>
                    <p>Casos atendidos</p>
                </div>
                <div class="icon"><i class="fa fa-bar-chart-o"></i>
                </div>
            </div>
        </div>
    </div>

    <!--ToDo start-->
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Lista de cosas por hacer</h3>
                    <div class="actions pull-right">
                        <i class="fa fa-chevron-down"></i>
                        <i class="fa fa-times"></i>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <input id="new-todo" type="text" class="form-control"  placeholder="¿Qué se necesita hacer?">
                                <section id='main'>
                                    <ul id='todo-list'>
                                        <!-- Antigüa lista de to do por usuario-->
                                        @foreach ($todos as $todo)
                                            <li>
                                                <div class="view">
                                                    <input id="item_todo" value="{{$todo->id}}" class="toggle" type="checkbox">
                                                    <label   data="">{{$todo->item}}</label>
                                                    <a  class="destroy" ></a>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </section>

                            </div>
                            <div class="form-group">
                                <button id="todo-enter" class="btn btn-primary pull-right">Añadir</button>
                                <div id='todo-count'></div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
    <!--ToDo end-->
    <script>

    </script>
    </body>

@endsection
@section('document-ready')
    <script>
        $(document).ready(function() {

            $('#popover-left,#popover-top,#popover-bottom,#popover-right').popover();
            $('#tooltip-left,#tooltip-top,#tooltip-bottom,#tooltip-right').tooltip();

            $('#userInfo').html(GetUser() ? GetUser().name + ' <i class="fa fa-angle-down"></i>': "" + ' <i class="fa fa-angle-down"></i>');
            app.timer();
            app.map();
            /* app.weather();
             app.morrisPie();*/
        });
    </script>

@endsection