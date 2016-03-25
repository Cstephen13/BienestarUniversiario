@extends('layout.modal')
@section('titulo')Registrar usuarios @overwrite
@section('id')"ModalRegistro" @overwrite
@section('contenido')

                <div class="col-md-8">

                    <div>
                        <h1>Registro</h1>
                        {!! Form::open(['route'=>'admin.users.save','method'=>'POST', 'id'=>'RegistrarUsuarios']) !!}
                            <div class="row">
                                <div class="col-md-6">
                                <div class="form-group form-elem floatl js-floatl">
                                    <label class="floatl__label">Primer nombre</label>
                                    <input class="floatl__input form-control" name="primernombre" placeholder="Primer nombre" type="text">
                                </div>
                                <div class="form-group form-elem floatl js-floatl">
                                    <label class="floatl__label">Primer apellido</label>
                                    <input class="floatl__input form-control" name="primerapellido" placeholder="Primer apellido" type="text">
                                </div>
                                <div class="form-group form-elem floatl js-floatl">
                                    <label class="floatl__label">Email</label>
                                    <input class="floatl__input form-control" name="email" placeholder="Email" type="email">
                                </div>
                                    <div class="form-group form-elem floatl js-floatl">
                                        <label class="floatl__label">Password</label>
                                        <input class="floatl__input form-control" name="password" placeholder="Password" type="password">
                                    </div>
                                <div class="form-group">
                                    <select name="rol_id" class="form-control" id="rol">
                                        <option value="" disabled selected>Rol en el sistema</option>
                                        @foreach($roles as $rol)
                                            <option value="{{$rol->id}}">{{$rol->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group form-elem floatl js-floatl">
                                    <label class="floatl__label">Segundo nombre</label>
                                    <input class="floatl__input form-control" name="segundonombre" placeholder="Segundo nombre" type="text">
                                </div>
                                <div class="form-group form-elem floatl js-floatl">
                                    <label class="floatl__label">Segundo apellido</label>
                                    <input class="floatl__input form-control" name="segundoapellido" placeholder="Segundo apellido" type="text">
                                </div>
                                <div class="form-group form-elem floatl js-floatl">
                                    <label class="floatl__label">Codigo o identificación</label>
                                    <input class="floatl__input form-control" name="codigo" placeholder="Codigo o identificación" type="text">
                                </div>
                                <div class="form-group form-elem floatl js-floatl">
                                    <label class="floatl__label">Confirmación del password</label>
                                    <input class="floatl__input form-control" name="passwordcon" placeholder="Confirmación del password" type="password">
                                </div>

                            </div>
                            </div>
                            <button  type="submit" class="upload btn btn-primary btn-lg">Enviar</button>
                        {!! Form::close() !!}
                    </div>

                </div>
                <div class="col-md-4">
                <h1 data-toggle="collapse" style="cursor: pointer" class="" data-target="#RegistrarPorArchivo">Registrar por archivo</h1>
                <div id="RegistrarPorArchivo" class="collapse">
                    {!! Form::open(['route'=>'admin.users.store','method'=>'POST','files' => 'true']) !!}
                <div class="form-group">
                    <input class="filestyle" type="file" accept=".txt" name="file" id="file" data-buttonText="Escoger archivo">
                </div>
                <button type="submit" class="upload btn btn-primary">Enviar</button>
                    {!! Form::close() !!}
                </div>
                </div>
@overwrite
