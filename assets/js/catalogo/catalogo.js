$(function() {
  obj_message = new Message();
  obj_catalogo = new Catalogo();

  obj_catalogo.read(0);
});

function get_gridpaginador(offset){
  obj_catalogo.read(offset);
}

$("#btn_catalogo_update").click(function(e){
  e.preventDefault();
  var arr_row = that_catalogo.obj_grid.get_row_selected();
  if(arr_row.length==0 || arr_row[0]['idcatalogo'] == undefined){
    obj_message.notification("","Seleccione un catálogo","error");
  }else{
    obj_catalogo.update(arr_row[0]['idcatalogo']);
  }
});

$("#btn_catalogo_read").click(function(e){
  e.preventDefault();
  obj_catalogo.read(0);
});


$("#btn_catalogo_delete").click(function(e){
  e.preventDefault();
  var arr_row = that_catalogo.obj_grid.get_row_selected();
  if(arr_row.length==0 || arr_row[0]['idcatalogo'] == undefined){
    obj_message.notification("","Seleccione un registro","error");
  }else{
    swal({
      title : "",
      html : "¿Eliminar "+arr_row[0]['catalogo']+"?",
      type : "question",
      confirmButtonText: "Confirmar",
      cancelButtonText: "Cancelar",
      showCancelButton: true,
      buttonsStyling: true,
      reverseButtons:true, // primero pone cancelar y luego confirmar
      allowOutsideClick:false,
      allowEscapeKey:false
    }).then(function () {
      obj_catalogo.delete(arr_row[0]['idcatalogo']);
    }, function (dismiss) {
      // nada...
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
  that_catalogo.obj_grid = new Grid("grid_catalogos");
  that_catalogo.form = "form_catalogo"; // El form de búsqueda en el index catálogo
}


Catalogo.prototype.read = function(offset) {
  that_catalogo.obj_grid.get_gridpaginador(offset, "catalogo.read", that_catalogo.form);
};

Catalogo.prototype.update = function(idcatalogo) {
  var form = document.createElement("form");
  form.name = "form_catalogo_update";
  form.id = "form_catalogo_update";
  form.method = "GET";
  form.target = "_self";

  form.action = "catalogo/update/"+idcatalogo;

  document.body.appendChild(form);
  form.submit();
};

Catalogo.prototype.delete = function(idcatalogo) {
  var form = document.createElement("form");
  form.name = "form_catalogo_delete";
  form.id = "form_catalogo_delete";
  form.method = "GET";
  form.target = "_self";

  form.action = "catalogo/delete/"+idcatalogo;

  document.body.appendChild(form);
  form.submit();
};
