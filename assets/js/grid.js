function Grid(iddiv,columnas,arr_datos, pagina_actual, total_rows){
  _thisgrid = this;
  _thisgrid.theme = "table-primary";
  _thisgrid.str_thead = "";

  _thisgrid.iddiv = iddiv;
  _thisgrid.columns = columnas;
  _thisgrid.columns_length = 0;
  _thisgrid.arr_datos = arr_datos;
  _thisgrid.arr_row_selected = [];

  _thisgrid.valores_xpagina = 10;
  _thisgrid.pagina_actual = pagina_actual;
  _thisgrid.total_rows = total_rows;
}

Grid.prototype.load = function() {
  _thisgrid.get_thead(function(str_thead){
    _thisgrid.get_tbody(str_thead, function(str_tbody){

      if(_thisgrid.total_rows > _thisgrid.valores_xpagina){
        _thisgrid.get_paginador(str_tbody, function(str_table){
          $("#"+_thisgrid.iddiv).empty();
          $("#"+_thisgrid.iddiv).append(str_table);
        });
      }else{
        $("#"+_thisgrid.iddiv).empty();
        $("#"+_thisgrid.iddiv).append(str_tbody);
      }

    });
  });

  //
  $(document).on("click", "#"+_thisgrid.iddiv+" tbody tr", function(e) {
    _thisgrid.init();
    $(this).css( {"background-color": "#D0EDF2"} );

    var arr_aux = [];
    $(this).children("td").each(function (){
      arr_aux[this.id] = $(this).attr('data');
    });

    _thisgrid.arr_row_selected[0] = arr_aux;
  });

};

Grid.prototype.get_thead = function(callback) {
  var html_thead = "";
  html_thead += "<div class='table-responsive'>";
  html_thead += "<table class='table table-condensed table-hover table-bordered'>";
  // html_thead += "<table class='table  table-hover  table-sm'>";
  html_thead += "<thead>";
  html_thead += "<tr class="+_thisgrid.theme+">";
  var objeto_columnas = _thisgrid.columns;
  for (var item in objeto_columnas) {
      // console.info(item);
      var tipo = objeto_columnas[item]["type"];
      var label = objeto_columnas[item]["header"];
      switch (tipo) {
        case "hidden":
          html_thead += "<th id='"+item+"' hidden>";
          html_thead +=label;
          html_thead += "</th>";
        break;
        case "text":
          html_thead += "<th id='"+item+"'>";
          html_thead += label;
          html_thead += "</th>";
        break;
      }
    _thisgrid.columns_length++;
  }// for objeto_columnas

  html_thead += "</tr>";
  html_thead += "</thead>";
  return callback(html_thead);
  // _thisgrid.str_thead = html_thead;
 // return _thisgrid.str_thead;
};

Grid.prototype.get_tbody = function(str_thead,callback) {
  var html_tbody = str_thead;
  html_tbody += "<tbody>";

  var objeto_columnas = _thisgrid.columns;
  var objeto_datos = _thisgrid.arr_datos;

  if(objeto_datos.length > 0){
    for (var i = 0; i<objeto_datos.length; i++) {
      html_tbody += "<tr>";
        for (var item in objeto_columnas) {
          var tipo = objeto_columnas[item]["type"];
          switch (tipo) {
            case "hidden":
                html_tbody += "<td id='"+item+"' data='"+objeto_datos[i][item]+"' hidden>";
                html_tbody += objeto_datos[i][item];
                html_tbody += "</td>";
            break;
            case "text":
                html_tbody += "<td id='"+item+"' data='"+objeto_datos[i][item]+"'>";
                html_tbody += objeto_datos[i][item];
                html_tbody += "</td>";
            break;
          }
        }// end for columns
      html_tbody += "</tr>";
    }
  }
  else{
    html_tbody += "<tr>";
    html_tbody += "<td colspan='"+_thisgrid.columns_length+"'>No hay datos para mostrar</td>";
    html_tbody += "</tr>";
  }

  html_tbody += "</tbody>";

  html_tbody += "</table>";
  html_tbody += "</div>";
  return callback(html_tbody);

  // return html_tbody;
};

Grid.prototype.get_row_selected = function() {
  return _thisgrid.arr_row_selected;
};

Grid.prototype.init = function() {
  _thisgrid.arr_row_selected = [];
  $("#"+_thisgrid.iddiv+ " tbody tr").each(function () {
    $(this).css( {"background-color": "white"} );
  });
};

//creamos los enlaces de nuestra paginaciÃ³n
Grid.prototype.get_paginador = function(str_tbody, callback) {
    var total_datos = _thisgrid.total_rows;
    var funcion = "get_gridpaginador" ;
    var str_paginador = str_tbody;

     //página actual
     var actual_pag = _thisgrid.pagina_actual;

     //limite por pÃ¡gina
     var limit = _thisgrid.valores_xpagina;
     //total de enlaces que existen
     var totalPag = Math.floor(total_datos/limit);
     // console.info(totalPag);

     //links delante y detrás que queremos mostrar
     var pagVisibles = 2;

     if(actual_pag <= pagVisibles){
         var primera_pag = 1;
     }else{
         var primera_pag = actual_pag - pagVisibles;
     }

     if(actual_pag + pagVisibles <= totalPag){
         var ultima_pag = actual_pag + pagVisibles;
     }else{
         var ultima_pag = totalPag;
     }

     str_paginador += "<nav><ul class='pagination pagination-sm justify-content-center' style='margin-top:3px !important; '>";
     str_paginador += (actual_pag > 1) ?
                                        "<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick="+funcion+"(0)>Primera</li></a>"
                                        :
                                        "<li class='page-item disabled'> <a class='page-link' href='javascript:void(0)'>Primera</li></a>";
     str_paginador += (actual_pag > 1) ?
                                        "<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick="+funcion+"("+((actual_pag-2)*limit)+") ><span aria-hidden='true'>&laquo;</span> </li></a>"
                                        :
                                        "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'><span aria-hidden='true'>&laquo;</span></li></a>";

     for(var i=primera_pag; i<ultima_pag+1; i++){
         var z = i;
         str_paginador += (i == actual_pag) ?
                                        "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>"+i+"</li></a>"
                                        :
                                        "<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick="+funcion+"("+((z-1)*limit)+")>"+i+"</li></a>";
     }

     str_paginador += (actual_pag < totalPag) ?
                                        "<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick="+funcion+"("+(actual_pag*limit)+")> <span aria-hidden='true'>&raquo;</span></li></a>"
                                          :
                                          "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'><span aria-hidden='true'>&raquo;</span></li></a>";

     str_paginador += (actual_pag < totalPag) ?
                                        "<li class='page-item'><a class='page-link' href='javascript:void(0)' onclick="+funcion+"("+((totalPag*limit))+")>Última</li></a>"
                                        :
                                        "<li class='page-item disabled'><a class='page-link' href='javascript:void(0)'>Última</li></a>";

     str_paginador += "</ul></nav>";
     return callback(str_paginador);
 }// get_paginador()
