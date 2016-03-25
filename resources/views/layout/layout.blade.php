<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/float/css/floatl.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/modales/css/jquery-confirm.css')}}">
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans|Oswald|Francois+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    <header>


    <div id="mycarousel" class="carousel slide visible-lg visible-md" data-ride="carousel">
        <div class="carousel-inner">
            <div class="item active">
                <img src="{{asset('images/banner.png')}}" alt="">
                <div class="carousel-caption">
                    <h1>Bienestar universitario sede Yumbo</h1>

                </div>
            </div>
        </div>
    </div>
    <row>
        @include('layout.nav')
    </row>
    </header>

        <div class="container-fluid">
        <div class="row">@include('flash::message')</div>
        <div class="panel panel-default">
            <div class="panel-heading">@yield('paneltitle')</div>
            <div class="panel-body" >
                @yield('content')
                </div>
            </div>
        </div>
        </div>
        @include('layout.modificar')
        @include('layout.contrasena')
    <script src="{{asset('plugins/jquery/jquery-2.2.0.min.js')}}"></script>
    <script src="{{asset('plugins/modales/js/jquery-confirm.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('plugins/bootstrap/js/bootstrap-filestyle.min.js')}}"></script>
    <script src="{{asset('plugins/jquery/jquery.validate.min.js')}}"></script>
    <script src="{{asset('plugins/float/js/floatl.min.js')}}"></script>
    <script src="{{asset('js/main.js')}}"></script>
    @if(Auth::user()->iniciodesesion==0)
        <script>
            Mostrarmodal();
        </script>
    @endif
    @yield('scripts','')
</body>
</html>