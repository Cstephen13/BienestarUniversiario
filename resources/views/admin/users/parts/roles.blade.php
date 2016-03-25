@extends('layout.modal')
@section('titulo')
    Roles
@overwrite
@section('id')
    "ModalRoles"
@overwrite
@section('contenido')
            <button data-toggle="collapse" class="btn btn-default" data-target="#RegistrarNuevoRol">Registrar nuevo</button>
            <br>
            <br>
            <div id="RegistrarNuevoRol" class="collapse">
                <div class="container-fluid">
                    {!! Form::open(['route'=>'admin.roles.add','method'=>'POST','files' => 'true']) !!}
                    <div class="row">
                    <div class="col-lg-8">
                        <input type="text" name="name" class="form-control" placeholder="Nombre">
                    </div>
                    </div>
                    <br>
                    <div class="form-inline">
                        <input type="checkbox" name="registrarusuarios" value="1"> Registrar usuarios
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Enviar</button>
                {!! Form::close() !!}
                </div>
                </div>
            <table class="table table-responsive">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Modulo de usuarios</th>
                    <th>Modulo de categorias y articulos</th>
                    <th>Modulo de prestamos</th>
                </tr>
                </thead>
                <tbody>
                @foreach($roles as $rol)
                    <tr>
                    <th>
                    {{$rol->name}}
                    </th>
                    <th>
                        @if($rol->registrarusuarios)
                            <div class="text-center"><span class="glyphicon glyphicon-ok-circle  text-success" aria-hidden="true"></span></div>
                        @else
                            <div class="text-center"><span class="glyphicon glyphicon-remove-circle text-danger text-center" aria-hidden="true"></span></div>
                        @endif
                    </th>
                    </tr>
                @endforeach
                </tbody>
            </table>
@endsection
