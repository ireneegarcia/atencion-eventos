@extends('layouts.dashboard')

@section('title')
    ¿Olvido su clave?
@endsection

@section('content')
<body>
</body>
@endsection
@section('document-ready')
    <script>
        $(document).ready(function() {

            $('#userInfo').html(GetUser() ? GetUser().name + ' <i class="fa fa-angle-down"></i>': "" + ' <i class="fa fa-angle-down"></i>');
        });
    </script>

@endsection