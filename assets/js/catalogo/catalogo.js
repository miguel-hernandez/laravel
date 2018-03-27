$(function() {
  obj_message = new Message();
  obj_catalogo = new Catalogo();
  // obj_master = new View();

  obj_catalogo.read(0);
});

function get_gridpaginador(offset){
  obj_catalogo.read(offset);
}

$("#btn_catalogo_update").click(function(e){
    e.preventDefault();
    var arr_row = obj_grid.get_row_selected();
    if(arr_row.length==0 || arr_row[0]['idcatalogo'] == undefined){
        obj_message.notification("","Seleccione un catálogo","error");
    }else{
        console.info(arr_row[0]); // el row con los datos está en la posición 0
        /*
        $("#modal_catalogo_title").empty();
        $("#modal_catalogo_title").append("Editar catálogo");
        obj_catalogo.update(arr_row[0]['id']);
        */
    }
});

$("#btn_catalogo_create").click(function(e){
    e.preventDefault();
    $("#modal_catalogo_title").empty();
    $("#modal_catalogo_title").append("Catálogo nuevo");
    obj_catalogo.create();
});

$("#btn_catalogo_read").click(function(e){
    e.preventDefault();
    obj_catalogo.read(0);
});


$("#btn_catalogo_delete").click(function(e){
    e.preventDefault();
    var arr_row = obj_grid.get_row_selected();
    var columnas = obj_grid.columns;
    if(arr_row.length==0){
        obj_message.notification("","Seleccione un registro","error");
    }else{
        swal({
             title : "",
             html : "Si elimina este catálogo también serán eliminados los productos y servicios que  pertenecen "+
                          "a  "+arr_row[0]['catalogo']+" ¿Eliminar?",
             type : "question",
             confirmButtonText: "Confirmar",
             cancelButtonText: "Cancelar",
             showCancelButton: true,
             buttonsStyling: true,
             reverseButtons:true, // primero pone cancelar y luego confirmar
             allowOutsideClick:false,
             allowEscapeKey:false
        }).then(function () {
            obj_catalogo.delete(arr_row[0]['id']);
        }, function (dismiss) {
           // alert("Cancelar");
        });

    }
});

$("#modal_catalogo_btn_cerrar").click(function(e){
    e.preventDefault();
    $("#"+obj_catalogo.idmodal).modal("hide");
    $('#form_catalogo_create')[0].reset();
});


function Catalogo(){
    that_catalogo = this;
    that_catalogo.idmodal = "modal_catalogo";
    that_catalogo.controlador = "Catalogo";

    this.read = function(offset){
        var nombre = $("#intxt_catalogo_nombre").val();
          $.ajax({
            async: true,
            url:   'catalogo/read',
            method: 'POST',
            data: {"nombre":nombre, "offset":offset},
            headers: {
                          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
            beforeSend: function( xhr ) {
              obj_message.loading("Descargando datos");
            }
          })
          .done(function( data ) {
            swal.close();
            var result = data.result;
            // var arr_datos = result.result;
            // var arr_columnas = result.columnas;
            // var pagina_actual = result.pagina_actual;
            // var total_rows = result.num_rows;
            obj_grid = new Grid(
                "grid_catalogos", // el id del div HTML
                result.arr_columnas, // El array de columnas, serán los encabezados
                result.arr_datos, // E array de los datos para llenar el grid, los índices deben corresponder a los nombres de las columnas
                result.pagina_actual,
                result.num_rows
            );
            obj_grid.load();
          })
          .fail(function(e) {
            console.error("Error in read()"); console.table(e);
          });
    }// read()

    this.create = function(){
      obj_master.get_create("catalogo", // nombre de la carpeta con la vista
                            "create", // nombre del archivo de la vista
                            that_catalogo.controlador, // controlador
                            that_catalogo.idmodal, //  el id del modal
                            CREATE); //  opción CRUD
    }/// create()

    this.update = function(idcatalogo){
      obj_master.get_update("catalogo", // nombre de la carpeta con la vista
                            "create", // nombre del archivo de la vista
                            that_catalogo.controlador, // controlador
                            that_catalogo.idmodal, //  el id del modal
                            UPDATE, //  opción CRUD
                            idcatalogo); //  id del registro
    }/// update()

    this.delete = function(idcatalogo){
      var form = document.createElement("form");
      var element1 = document.createElement("input");

      form.name = "form_catalogo_delete";
      form.id = "form_catalogo_delete";
      form.method = "POST";
      form.target = "_self";

      form.action = base_url+that_catalogo.controlador+"/delete";

      element1.type="hidden";
      element1.value=idcatalogo;
      element1.name="idcatalogo";
      form.appendChild(element1);

      document.body.appendChild(form);
      form.submit();
    }/// delete()

}// Catalogo
