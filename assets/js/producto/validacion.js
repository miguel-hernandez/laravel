$(document).ready(function () {
  $('#form_producto_creup')[0].reset();
  $("#form_catalogo_creup").validate({
          onclick:false, onfocusout: false, onkeypress:false, onkeydown:false, onkeyup:false,
          rules: {
              itxt_producto_producto: {required: true},
              itxt_producto_descripcion: {required: true}
          },
          messages: {
              itxt_producto_producto: {required: " *El nombre del catálogo es obligatorio"},
              itxt_producto_descripcion: {required: " *La descripción del catálogo es obligatoria"}
          }
      });
});

$("#btn_catalogo_terminar").click(function(e){
   e.preventDefault();
   $("#form_producto_creup").submit();
});

$('#ifile_producto_img').on("change", function(){
  $("#ifile_producto_img_aux").val(this.files.length);
  // console.info(this.files.length);
  // uploadFile();
});
