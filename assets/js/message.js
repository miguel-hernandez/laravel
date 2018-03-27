function Message(){
  _thismessage = this;
}

Message.prototype.notification = function(title,text,type) {
  swal({
    title : title,
    html : text,
    type: type,
    confirmButtonText: 'Aceptar',
    width:'350px'
  });
};

Message.prototype.loading = function(texto) {
  swal({
      title: "<center><div class='loader'></div></center>",
      text: texto,
      width: 300,
      padding: 40,
      showCancelButton: false,
      showConfirmButton: false,
      allowEscapeKey:false,
      allowOutsideClick:false
    });
};
