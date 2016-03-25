<div class="modal fade" id="Editar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            {!! Form::open(['route'=>'admin.categories.edit','method'=>'POST']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="Titulo"></h4>
            </div>
            <div class="modal-body">
                    {!! Form::hidden('id', null, array('id'=>'id')) !!}
                <div class="form-group">
                    {!! Form::label('Nombre') !!}
                    <input class="form-control" name="name" type="text" id="nameChange">
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Enviar</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>