@extends('layout.modal')
@section('tamano')
    modal-sm
@overwrite
@section('titulo')
    <div style="color: blue">
        <h1>Modificar contraseña</h1>
    </div>
@overwrite
@section('id')"ModificarContraseña" @overwrite
@section('contenido')
    <div class="col-md-12">
        <div class="row">
            {!! Form::open(['route'=>'admin.users.cambiarcontrasena','method'=>'POST', 'id'=>'ModificarUsers']) !!}
            {!! Form::hidden('id',Auth::user()->id) !!}
            {!! Form::hidden('password','contraseña') !!}
            @if(!Auth::user()->iniciodesesion==0)
            <div class="form-group form-elem floatl js-floatl">
                <label class="floatl__label">Contraseña antigua</label>
                <input class="floatl__input form-control" name="password" placeholder="Contraseña antigua" type="password">
            </div>
            @endif
            <div class="form-group form-elem floatl js-floatl">
                <label class="floatl__label">Nueva contraseña</label>
                <input class="floatl__input form-control" name="contrasnanueva" placeholder="Nueva contraseña" type="password">
            </div>
            <div class="form-group form-elem floatl js-floatl">
                <label class="floatl__label">Confirmar nueva contraseña</label>
                <input class="floatl__input form-control" name="confirmarcontrasnanueva" placeholder="Confirmar nueva contraseña" type="password">
            </div>
            <button type="submit" class="upload btn btn-success btn-sm pull-right">Modificar</button>
            {!! Form::close() !!}
        </div>

    </div>
@overwrite
