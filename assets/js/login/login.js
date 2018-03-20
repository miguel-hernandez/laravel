$(function() {
  // $("#fa_nocheck").show();
 	// $("#fa_sicheck").hide();
 	// $("#check_login_mantenerconectado").hide();

  // $("#check_login_mantenerconectado").click( function(){
  //    if( $(this).is(':checked') ){
  // 		 	 $("#fa_nocheck").hide();
  // 			 $("#fa_sicheck").show();
  // 	 }
  // 	 else{
  // 		 $("#fa_nocheck").show();
  // 		 $("#fa_sicheck").hide();
  // 	 }
  // });


    $("#form_login").validate({
      onclick:false, onfocusout: false, onkeypress:false, onkeydown:false, onkeyup:false,
      rules: {
        itxt_login_username: {required: true},
        itxt_login_clave: {required: true}
      },
      messages: {
        itxt_login_username: {required: "Campo requerido"},
        itxt_login_clave: {required: "Campo requerido"}
      }
    });

    $("#btn_login").click(function(e){
      e.preventDefault();
      $("#form_login").submit();
    });


});
