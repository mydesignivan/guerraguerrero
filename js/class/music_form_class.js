$(document).ready(function(){
    $('#form1').submit(function(){
        if( !$('#txtName').val() ){
            alert("Por favor, debe ingresar el campo nombre.");
            $('#txtName').focus();
            return false;
        }
        if( !$('#id').val() ){
            if( !$('#txtFileName').val() ){
                alert("Por favor, debe ingresar la ruta del mp3.");
                $('#txtFileName').focus();
                return false;
            }
            var ext = $('#txtFileName').val().replace(/^([\W\w]*)\./gi, '').toLowerCase();

            if( !(ext && /^(mp3)$/.test(ext)) ){
                alert('Error: Solo se permiten archivos de musica mp3');
                return false;
            }
        }

        return true;
    });
});