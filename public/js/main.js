$(function () {
    $( document ).ajaxStart(function() {

    }).ajaxSuccess(function(){

    });

        $('.editar').click(function(e){
            var contentPanelId = jQuery(this).attr("id");
            $('#Editar').modal('show');
                $.ajax({
                    type: "GET",
                    url: 'categories/'+contentPanelId+'/show',
                    success: function( msg ) {
                        $('#Titulo').text("Editar la categoria "+msg.name);
                        $('#id').val(msg.id);
                        $('#nameChange').val(msg.name);
                    }
                });
        });

    var lim = document.querySelectorAll('.js-floatl').length;
    for (var i=0;i<lim;i++){
        new Floatl(document.querySelectorAll('.js-floatl')[i])
    }
    $('#RegistrarUsuarios').submit(function(e){
    }).validate({
        debug: false,
        rules: {
            "primernombre": {
                required: true
            },
            "primerapellido": {
                required: true
            },
            "email": {
                required: true,
                email: true
            },
            "password": {
                required: true,
                minlength: 5,
                maxlength: 15
            },
            "edad": {
                required: true,
                number:true
            }
        },
        highlight: function(element) {
                $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
                $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        submitHandler: function(form){
            form.submit();
        }
    }
    )
    $('.borrar').confirm({
            icon: 'glyphicon glyphicon-trash',
            content: 'Esta acción es irreversible',
            confirmButton: 'Eliminar',
            cancelButton: 'Cancelar.',
            confirmButtonClass: 'btn-info',
            cancelButtonClass: 'btn-danger',
        });
    $('div.alert').delay(5000).slideUp(300);
    $('#Add').click(function(e){
        var jc = $.alert({
            icon: 'fa fa-spinner fa-spin',
            title: 'Toma asiento, estamos procesando tu solicitud!',
            content: 'Esto podría tardar un par de minutos, serás re dirijido automaticamente.'
        });
        $.ajax({
            type: "GET",
            url: 'user/procces'
        }).done(function( data ) {
            window.location="/admin/users";
        });
    });
    $('#desbloquear').click(function(e){
        $("input").prop('disabled', false);
        $('#desbloquear').hide();
        $('#botoneditar').show();
    });
});
var Mostrarmodal = function() {
    $('#ModificarContraseña').modal({
        backdrop: 'static',
        keyboard: false
    })
}


