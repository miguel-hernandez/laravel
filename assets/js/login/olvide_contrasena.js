$(function() {
    $("#form_olvidaste_contrasena").validate({
      onclick:false, onfocusout: false, onkeypress:false, onkeydown:false, onkeyup:false,
      rules: {
        txt_olvidaste_contrasena_email: {required: true,email: true}
      },
      messages: {
        txt_olvidaste_contrasena_email: {required: "Campo requerido", email: "Escriba un email valido"}
      }
    });

});

$("#btn_olvidaste_contrasena_enviar").click(function(e){
  e.preventDefault();
  $("#form_olvidaste_contrasena").submit();
});
