@extends('layout.modal')
@section('titulo')
    <div style="color: blue">
        {{session('user')->primernombre." ".session('user')->segundonombre. " ". session('user')->primerapellido." ".session('user')->segundoapellido}}
        <a href="{{route('admin.users.show',$user->id)}}" class="btn btn-info">Cancelar</a>
    </div>
@overwrite
@section('id')"ModalModificarUser" @overwrite
@section('contenido')

    <div class="col-md-12">
            <h1>Datos personales</h1>
                {!! Form::open(['route'=>'admin.users.update','method'=>'POST', 'id'=>'ModificarUsers']) !!}
                    {!! Form::hidden('id',session('user')->id)!!}
                <div class="col-md-6">
                    <div class="form-group form-elem floatl js-floatl">
                        <label class="floatl__label">Primer nombre</label>
                        <input value="{{session('user')->primernombre}}" class="floatl__input form-control" name="primernombre" placeholder="Primer nombre" type="text">
                    </div>
                    <div class="form-group form-elem floatl js-floatl">
                        <label class="floatl__label">Primer apellido</label>
                        <input value="{{session('user')->primerapellido}}" class="floatl__input form-control" name="primerapellido" placeholder="Primer apellido" type="text">
                    </div>
                    <div class="form-group form-elem floatl js-floatl">
                        <label class="floatl__label">Email</label>
                        <input value="{{session('user')->email}}" class="floatl__input form-control" name="email" placeholder="Email" type="email">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group form-elem floatl js-floatl">
                        <label class="floatl__label">Segundo nombre</label>
                        <input value="{{session('user')->segundonombre}}" class="floatl__input form-control" name="segundonombre" placeholder="Segundo nombre" type="text">
                    </div>
                    <div class="form-group form-elem floatl js-floatl">
                        <label class="floatl__label">Segundo apellido</label>
                        <input class="floatl__input form-control" value="{{session('user')->segundoapellido}}" name="segundoapellido" placeholder="Segundo apellido" type="text">
                    </div>

                </div>
            </div>
            <div class="row">
                <button type="submit" class="upload btn btn-success btn-lg pull-right">Modificar</button>
                {!! Form::close() !!}
            </div>

    </div>
  @overwrite
