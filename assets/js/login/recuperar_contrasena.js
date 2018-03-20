$(function() {
      $.validator.addMethod("equal_contrasenas", function(value, element, arg){
        var clave = $("#itxt_recuperar_contrasena_contrasena").val();
        console.info(clave);
        console.info(value);
        return clave == value;
      });

      $.validator.addMethod("segura_contrasena", function(value, element, arg){
        var re = new Regularexpression();
        return re.password(value);
      });

    $("#form_recuperar_contrasena").validate({
      onclick:false, onfocusout: false, onkeypress:false, onkeydown:false, onkeyup:false,
      rules: {
        itxt_recuperar_contrasena_email: {required: true,email: true},
        itxt_recuperar_contrasena_codigo: {required: true},
        itxt_recuperar_contrasena_contrasena: {required: true, segura_contrasena:true},
        itxt_recuperar_contrasena_contrasenaconfirmar: {required: true,equal_contrasenas: '', segura_contrasena:true}
      },
      messages: {
        itxt_recuperar_contrasena_email: {required: "Campo requerido", email: "Escriba un email valido"},
        itxt_recuperar_contrasena_codigo: {required: "Campo requerido"},
        itxt_recuperar_contrasena_contrasena: {required: "Campo requerido", segura_contrasena: "La contraseña debe contener al menos 8 caracteres que incluyan una letra minúscula, una letra mayúscula y un número"},
        itxt_recuperar_contrasena_contrasenaconfirmar: {required: "Campo requerido",equal_contrasenas: "Las contraseñas no coinciden", segura_contrasena: "La contraseña debe contener al menos 8 caracteres que incluyan una letra minúscula, una letra mayúscula y un número"}

      }
    });

});

$("#btn_recuperar_contrasena_cambiar").click(function(e){
  e.preventDefault();
  $("#form_recuperar_contrasena").submit();
});
