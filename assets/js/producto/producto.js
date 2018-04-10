$(function() {
  obj_message = new Message();
  obj_producto = new Producto();

  obj_producto.read(0);
});

function get_gridpaginador(offset){
  obj_producto.read(offset);
}



$("#btn_producto_update").click(function(e){
  e.preventDefault();
  var arr_row = that_producto.obj_grid.get_row_selected();
  if(arr_row.length==0 || arr_row[0]['idproducto'] == undefined){
    obj_message.notification("","Seleccione un producto","error");
  }else{
    obj_producto.update(arr_row[0]['idproducto']);
  }
});

$("#btn_producto_read").click(function(e){
  e.preventDefault();
  obj_producto.read(0);
});


$("#btn_producto_delete").click(function(e){
  e.preventDefault();
  var arr_row = that_producto.obj_grid.get_row_selected();
  if(arr_row.length==0 || arr_row[0]['idproducto'] == undefined){
    obj_message.notification("","Seleccione un registro","error");
  }else{
    swal({
      title : "",
      html : "¿Eliminar "+arr_row[0]['producto']+"?",
      type : "question",
      confirmButtonText: "Confirmar",
      cancelButtonText: "Cancelar",
      showCancelButton: true,
      buttonsStyling: true,
      reverseButtons:true, // primero pone cancelar y luego confirmar
      allowOutsideClick:false,
      allowEscapeKey:false
    }).then(function () {
      obj_producto.delete(arr_row[0]['idproducto']);
    }, function (dismiss) {
      // nada...
    });
  }
});

$("#modal_catalogo_btn_cerrar").click(function(e){
  e.preventDefault();
  $("#"+obj_producto.idmodal).modal("hide");
  $('#form_catalogo_create')[0].reset();
});


function Producto(){
  that_producto = this;
  that_producto.obj_grid = new Grid("grid_productos");
  that_producto.form = "form_producto"; // El form de búsqueda en el index catálogo
}


Producto.prototype.read = function(offset) {
  that_producto.obj_grid.get_gridpaginador(offset, "producto.read", that_producto.form);
};

Producto.prototype.update = function(idproducto) {
  var form = document.createElement("form");
  form.name = "form_producto_update";
  form.id = "form_producto_update";
  form.method = "GET";
  form.target = "_self";

  form.action = "producto/update/"+idproducto;

  document.body.appendChild(form);
  form.submit();
};

Producto.prototype.delete = function(idproducto) {
  var form = document.createElement("form");
  form.name = "form_producto_delete";
  form.id = "form_producto_delete";
  form.method = "GET";
  form.target = "_self";

  form.action = "producto/delete/"+idproducto;

  document.body.appendChild(form);
  form.submit();
};
