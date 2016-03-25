@extends('layout.layout')
@section('title','Usuarios')
@section('paneltitle')
    <h3 class="panel-title pull-left">
        Administración de usuarios
    </h3>
    @if(!empty($roles))
    <button class="btn btn-info pull-right" data-toggle="modal" data-target="#ModalRoles">Roles</button>
    @endif
    <div class="clearfix"></div>
@endsection
@section('content')


    @if(!empty($roles))
            {!! Form::open(['route'=>'admin.users.index','method'=>'GET','class'=>'navbar-form navbar-left','role'=>'search']) !!}
            <div class="form-group">
                {!! Form::text('codigo',null,['class'=>'form-control','placeholder'=>'Nombre de usuario']) !!}
            </div>
            <div class="form-group">
               <labe for="inactivo"> Mostrar solo inactivos </labe>
                {!! Form::checkbox('inactivo', 'true') !!}
            </div>
            <button type="submit" class="btn btn-default">Buscar</button>
            {!! Form::close() !!}


        <button type="button" class="btn btn-primary btn-lg pull-right" data-toggle="modal" data-target="#ModalRegistro">Registrar un nuevo usuario</button>

    @else
        <button id="Add" type="button" class="btn btn-primary btn-lg pull-right">Agregar {{count($users)}} usuarios al sistema</button>
    @endif
    <table class="table table-responsive">
        <thead>
        <tr>
            <th>Nombres y apellidos</th>
            <th>Codigo</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        </thead>
        @if(!empty($roles))
        <tbody>
        @foreach($users as $user)
            @if(Auth::user()->id!=$user->id)
            @if($user->estado==0)
                <tr class="danger">
            @else
                <tr>
            @endif
                    <td>{{$user->primernombre." ". $user->segundonombre." ".$user->primerapellido." ".$user->segundoapellido}}</td>
                    <td>{{$user->codigo}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <div class="btn-group-xs">
                    @if($user->estado==0)
                        <a href="{{route('admin.users.state',$user->id)}}" class="btn btn-default"><i class="fa fa-unlock-alt"></i></a>
                    @else
                        <a href="{{route('admin.users.state',$user->id)}}" class="btn btn-warning"><i class="fa fa-lock"></i></a>
                    @endif
                    <a href="{{route('admin.users.destroy',$user->id)}}" data-title="Eliminará a {{$user->primernombre}}" class="btn btn-danger delete borrar"><span class="glyphicon glyphicon-remove"></span></a>
                    <a href="{{route('admin.users.show',$user->id)}}" class="btn btn-success"><span class="glyphicon glyphicon-pencil"></span></a>
                        </div>
                    </td>
                </tr>
            @endif
        @endforeach
        </tbody>
        @else
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->primernombre." ". $user->segundonombre." ".$user->primerapellido." ".$user->segundoapellido}}</td>
                    <td>{{$user->codigo}}</td>
                    <td>{{$user->email}}</td>
                    <td>@if(empty($user->id))
                            {{$user->password}}
                        @else
                            Contraseña ya guardada
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        @endif
    </table>
    @if(!empty($roles))
    {!! $users->render() !!}
    @endif
@stop
@if(!empty($roles))
    @include('admin.users.parts.roles')
    @include('admin.users.parts.registermodal')

@endif
@section('scripts')
    @if(session()->has('user'))
        @include('admin.users.parts.modificar')
        <script>
            $('#ModalModificarUser').modal({
                backdrop: 'static',
                keyboard: false
            });
        </script>
    @endif
@endsection