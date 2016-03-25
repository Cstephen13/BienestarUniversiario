@extends('layout.modal')
@section('titulo')
    <div style="color: blue">
        {{Auth::user()->primernombre." ".Auth::user()->segundonombre. " ". Auth::user()->primerapellido." ".Auth::user()->segundopellido}}
        <button id="desbloquear" class=" btn btn-default btn-lg pull-right">
            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
            Editar
        </button>
    </div>
@overwrite
@section('id')"ModalModificar" @overwrite
@section('contenido')
    <div class="col-md-12">
            <h1>Datos personales</h1>
            <div class="row">
                {!! Form::open(['route'=>'admin.users.update','method'=>'POST', 'id'=>'ModificarUsers']) !!}
                    {!! Form::hidden('id',Auth::user()->id) !!}
                <div class="col-md-6">
                    <div class="form-group form-elem floatl js-floatl">
                        <label class="floatl__label">Primer nombre</label>
                        <input disabled value="{{preg_replace('/[\x00-\x1F\x80-\xFF]/', '', Auth::user()->primernombre)}}" class="floatl__input form-control" name="primernombre" placeholder="Primer nombre" type="text">
                    </div>
                    <div class="form-group form-elem floatl js-floatl">
                        <label class="floatl__label">Primer apellido</label>
                        <input disabled value="{{preg_replace('/[\x00-\x1F\x80-\xFF]/', '', Auth::user()->primerapellido)}}" class="floatl__input form-control" name="primerapellido" placeholder="Primer apellido" type="text">
                    </div>
                    <div class="form-group form-elem floatl js-floatl">
                        <label class="floatl__label">Email</label>
                        <input disabled value="{{preg_replace('/[\x00-\x1F\x80-\xFF]/', '', Auth::user()->email)}}" class="floatl__input form-control" name="email" placeholder="Email" type="email">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group form-elem floatl js-floatl">
                        <label class="floatl__label">Segundo nombre</label>
                        <input disabled value="{{preg_replace('/[\x00-\x1F\x80-\xFF]/', '', Auth::user()->segundonombre)}}" class="floatl__input form-control" name="segundonombre" placeholder="Segundo nombre" type="text">
                    </div>
                    <div class="form-group form-elem floatl js-floatl">
                        <label class="floatl__label">Segundo apellido</label>
                        <input disabled class="floatl__input form-control" value="{{preg_replace('/[\x00-\x1F\x80-\xFF]/', '', Auth::user()->segundoapellido)}}" name="segundoapellido" placeholder="Segundo apellido" type="text">
                    </div>

                </div>
            </div>
            <div class="row">
                <button id="botoneditar" style="display: none"  type="submit" class="upload btn btn-success btn-lg pull-right">Modificar</button>
                {!! Form::close() !!}
            </div>

    </div>
  @overwrite
