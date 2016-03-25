<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Restablecer contraseña</title>
    <link rel="stylesheet" href="{{asset('plugins/login/css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/bootstrap/css/bootstrap.css')}}">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat:400,700'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="{{asset('plugins/login/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/float/css/floatl.min.css')}}">



</head>

<body>


<div class="container">
    <div class="info">
        <h1>Bienestar universitario Univalle</h1>
    </div>
    @include('flash::message')
</div>
<div class="form">
    <div class="thumbnail"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/hat.svg"/></div>

    {!! Form::open(['route'=>'resetpassword','method' =>'POST','class'=>'login-form']) !!}
    {!! Form::hidden('token',$token,null) !!}
    <div class="form-group form-elem floatl js-floatl">
        <label class="floatl__label">Correo electronico</label>
        <input class="floatl__input form-control" value="{{old('email')}}" name="email" placeholder="Correo electronico" type="text">
    </div>
    <div class="form-group form-elem floatl js-floatl">
        <label class="floatl__label">Nueva contraseña</label>
        <input class="floatl__input form-control" name="password" placeholder="Contraseña" type="password">
    </div>
    <div class="form-group form-elem floatl js-floatl">
        <label class="floatl__label">Confirmar contraseña</label>
        <input class="floatl__input form-control" name="password_confirmation" placeholder="Confirmar contraseña" type="password">
    </div>
    @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <button type="submit">Restablecer</button>
    {!! Form::close() !!}
</div>

<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

<script src="{{asset('plugins/login/js/index.js')}}"></script>
<script src="{{asset('plugins/jquery/jquery-2.2.0.min.js')}}"></script>
<script src="{{asset('plugins/float/js/floatl.min.js')}}"></script>
<script src="{{asset('plugins/bootstrap/js/bootstrap.min.js')}}"></script>




</body>
</html>
