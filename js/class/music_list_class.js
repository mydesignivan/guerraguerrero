var Music = new (function(){

    /* PUBLIC METHODS
     **************************************************************************/
    this.initializer = function(){
        $(document).ready(function(){
            var list = $('#sortable');
            if( list.length>0 ){

                list.sortable({
                    stop : function(){
                        _working = true;
                        list.sortable( "option", "disabled", true );

                        var initorder = $(this).find('tr:first').attr('id').substr(2);

                        var arr = $(this).sortable("toArray");

                        var callback = function(){
                            list.sortable( "option", "disabled", false );
                        };

                        _save_order(arr, initorder, callback);
                    },
                    handle : '.handle'
                }).disableSelection();
            }
        });

    };

    this.del_sel = function(){
        var list = $("#tblList tbody input:checked");
        if( list.length==0 ){
            alert("Debe seleccionar un item.");
            return false;
        }

        var data = get_data(list);

        if( confirm("¿Está seguro de eliminar el/los mp3 seleccionado(s)?\n\n"+data.names.join(", ")) ){
            location.href = baseURI+'panel/musica/delete/'+data.id.join("/");
        }
        return false;
    };

    this.del = function(id){
        if( confirm("¿Está seguro de eliminar el mp3?")){
              location.href = baseURI+'panel/musica/delete/'+id;
        }
        return false;
    };


    /* PRIVATE PROPERTIES
     **************************************************************************/
    var _working = false;
    
    /* PRIVATE METHODS
     **************************************************************************/
    var _save_order = function(arr, initorder, callback){
        $.post(baseURI+'panel/musica/ajax_order/', {rows : JSON.encode(arr), initorder : initorder}, function(data){
            _working = false;
            if( data!="success" ) alert('ERROR AJAX:\n\n'+data);
            else {
                if( typeof(callback)=="function" ) callback();
            }
        });
    };

})();
