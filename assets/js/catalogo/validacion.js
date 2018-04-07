$(document).ready(function () {
  $('#form_catalogo_creup')[0].reset();
  $("#form_catalogo_creup").validate({
          onclick:false, onfocusout: false, onkeypress:false, onkeydown:false, onkeyup:false,
          rules: {
              itxt_catalogo_nombre: {required: true},
              itxt_catalogo_descripcion: {required: true}
          },
          messages: {
              itxt_catalogo_nombre: {required: " *El nombre del catálogo es obligatorio"},
              itxt_catalogo_descripcion: {required: " *La descripción del catálogo es obligatoria"}
          }
      });
});

$("#btn_catalogo_terminar").click(function(e){
   e.preventDefault();
   $("#form_catalogo_creup").submit();
});
