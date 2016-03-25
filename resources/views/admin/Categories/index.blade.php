@extends('layout.layout')
@section('title','Crer Categoria')
@section('paneltitle')
     <h3 class="panel-title pull-left">
         Categoriasn
     </h3>
     <div class="clearfix"></div>
@endsection
@section('content')
    <div class="col-md-8 col-xs-12">
        @foreach($categories as $category)
            <div class="col-md-3 col-xs-6">
                <div class="wrapper">
                    {{$category->name}}
                    <div class="tooltip">
                        <div class="text-center">
                        <a href="{{route('admin.categories.destroy',$category->id)}}" data-title="Eliminara {{$category->name}}" class="borrar"><span class="glyphicon glyphicon-trash"></span></a>
                        <button id="{{$category->id}}" class="editar"><a><span class="glyphicon glyphicon-pencil"></span></a></button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


    <div class="col-md-4 col-xs-12">
    <div class="panel panel-default">
        <div class="panel-heading">Agregar nueva categoria</div>
        <div class="panel-body">

        {!! Form::open(['route'=>'admin.categories.store','method'=>'POST'])!!}
        <div class="form-group">
            {!! Form::label('name','Nombre') !!}
            {!! Form::text('name',null,['class'=>'form-control','required']) !!}
        </div>
        <div class="form-group">
               <div class="col-md-9"></div>
                {!! Form::submit('Registrar', ['class'=>'btn btn-primary'] ) !!}
         </div>
    {!! Form::close()!!}
        </div>
    </div>
    </div>
    @include('admin.Categories.parts.modal')
@endsection