//************* DECLARAR VARIABLES             ******************//
var url = "/TSFI/public/";
var enviar = false;
var maximoTwitter = 140; /* CARACTERES MAXIMOS DE TWITTER */
var maximoResumen = 450; /* CARACTERES MAXIMOS DE RESUMEN */
var maximoTitulo = 30; /* CARACTERES MAXIMOS DE TITULO */
var maximoSubtitulo = 40; /* CARACTERES MAXIMOS DE SUBTITULO */
var maximoContenido = 30; /* CARACTERES MAXIMOS DE CONTENIDO */
var haySubtitulo;
var hayContenido;
var hayTitulo;
var hayTwitter;
var hayResumen;
var vacio;
var notificarEntrada = true;
var etiquetasNuevas = new Array();
var contadorEtiquetas = 0;


//************* CUERPO PRINCIPAL DEL PROGRAMA *******************//
$( document ).ready(function() {
  habilitarFechas()

  /********************************* LISTADO CATEGORIAS *******************************/
  $('#dropdown_categorias')
  	.on('click', '#dropdown_button_categorias', function() {
      	$('#dropdown_list_categorias').toggle();
  	})
  	.on('input', '#dropdown_search_categorias', function() {
      	var target = $(this);
      	var search = target.val().toLowerCase();

      	if (!search) {
              $('#dropdown_categorias li').show();
              return false;
          }

      	$('#dropdown_categorias li').each(function() {
          	var text = $(this).text().toLowerCase();
              var match = text.indexOf(search) > -1;
              $(this).toggle(match);
          });
  	});

    /********************************* LISTADO ETIQUETAS *******************************/
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {function(){alert('hola');}},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $('#selector_etiquetas').chosen(config[selector]);
    }

    /********************************* FUNCIONES LISTADO ENTITATS  ***********************************/

    $('#dropdown_entitats')
    	.on('click', '#dropdown_button_entitats', function() {
        	$('#dropdown_list_entitats').toggle();
    	})
    	.on('input', '#dropdown_search_entitats', function() {
        	var target = $(this);
        	var search = target.val().toLowerCase();

        	if (!search) {
                $('#dropdown_entitats li').show();
                return false;
            }

        	$('#dropdown_entitats li').each(function() {
            	var text = $(this).text().toLowerCase();
                var match = text.indexOf(search) > -1;
                $(this).toggle(match);
            });
    	});

    /********************************* FUNCIONES DATEPICKER  ***********************************/

      $('#data_publicacion').datepicker({
        autoclose: true,
         dateFormat: 'dd/mm/yy',
        weekStart:1
      });


      $('#evento').daterangepicker({
        autoclose: true,
      weekStart:1
    });

    /********************************* FUNCIONES BOTON GUARDAR  ***********************************/
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $("#formulario_entrada").ajaxForm({
        url: url + '/ajax/entradas/guardarEntrada',
        type: 'post',
        success: function(data) {
          $('#idBD' ).val(data); /* GUARDAMOS LA ID DE LA BD EN EL FORMULARIO */

          showSuccessAlert(data);
          recargarEtiquetas();
        },
        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
          showErrorAlert('Error al guardar!');
        }
    });

});
//************* GUARDADO DE CONTENIDO         ******************//

function guardarNuevaEtiqueta(){
  var contenido = $('#selector_etiquetas_chosen input[type="text"]').val();
  var lon = contenido.length;
  if(lon > 1){
    if(contenido.substring(lon-1, lon) == ';'){

      var etiqueta = contenido.substring(0, lon-1);
      etiquetasNuevas[contadorEtiquetas] = etiqueta;
      contadorEtiquetas = contadorEtiquetas +1;
      var etiquetasNuevas_json = JSON.stringify(etiquetasNuevas);
      $('#etiquetasNuevas').val(etiquetasNuevas_json);
      $('#selector_etiquetas_chosen .chosen-choices').prepend('<li class="search-choice"><span>' + etiqueta + '</span><a id="' + contadorEtiquetas + '" class="eliminar search-choice-close" ></a></li>');
      $('#selector_etiquetas_chosen input[type="text"]').val('');
      console.log(etiqueta);
    }
  }
}


function validarTwitter(){
  var longitud = $("#twitter").val().length;
  $("#notificaciones_twitter ").empty();
  var restant = maximoTwitter - longitud;
  $("#notificaciones_twitter ").append("queden " + restant);
  if(restant != maximoTwitter){
    hayTwitter = true;
  } else {
    hayTwitter = false;
  }
  if (restant >= 0){
    return true;
  } else {
    return false;
  }
}

function validarResumen() {
  var longitud = $("#resum").val().length;
  $("#notificaciones_resumen ").empty();
  var restant = maximoResumen - longitud;
  $("#notificaciones_resumen ").append("queden " + restant);
  if(restant != maximoResumen){
    hayResumen = true;
  } else {
    hayResumen = false;
  }
  if (restant >= 0){
    return true;
  } else {
    return false;
  }
}

function validarTitulo() {
  var longitud = $("#titulo").val().length;
  $("#notificaciones_titulo ").empty();
  var restant = maximoTitulo - longitud;
  $("#notificaciones_titulo ").append("queden " + restant);
  if(restant != maximoTitulo){
    hayTitulo = true;
  } else {
    hayTitulo = false;
  }
  if (restant >= 0){
    return true;
  } else {
    return false;
  }
}

function validarSubtitulo() {
  var longitud = $("#subtitulo").val().length;
  $("#notificaciones_subtitulo ").empty();
  var restant = maximoSubtitulo - longitud;
  $("#notificaciones_subtitulo ").append("queden " + restant);
  if(restant != maximoSubtitulo){
    haySubtitulo = true;
  } else {
    haySubtitulo = false;
  }
  if (restant >= 0){
    return true;
  } else {
    return false;
  }
}

function validarContenido() {
  var longitud = 1;
  //getStats('contingut').chars;
  $("#notificaciones_contenido").empty();
  var restant = maximoContenido - longitud;
  if(restant != maximoContenido){
    hayContenido = true;
  } else {
    hayContenido = false;
  }
  if (restant >= 0){
    return true;
  } else {
    $("#notificaciones_contenido").append("Máxim de contingut superat! (Sobren: " + Math.abs(restant) + " caracters)");
    return false;
  }
}

function validarTodoVacio(){
  if(haySubtitulo || hayContenido || hayTitulo || hayTwitter || hayResumen){
    return true;
  } else {
    if(notificarEntrada){
      showSuccessAlert('Cal informar algún camp per poder guardar!');
      notificarEntrada = false;
    }

    return false;
  }
}

function validarEnviar(){
  if (validarTwitter() & validarResumen() & validarTitulo() & validarSubtitulo() & validarContenido() & validarTodoVacio()) {
    //$("#notificaciones_twitter").append("Si");
    $('button[type="submit"]').removeAttr('disabled');
  } else {
    //$("#notificaciones_twitter ").append("No");
    $('button[type="submit"]').attr('disabled','disabled');
  }
}



/*********************** FUNCIONES CON FECHAS **************************************/
function habilitarFechas(){

       if($("#visible").is(':checked')) {
           $('#div_fecha_publicacion').css('display', 'block');
       } else {
           $('#div_fecha_publicacion').css('display', 'none');
       }


}

/*************************** ETIQUETAS *******************************/
function recargarEtiquetas(){

  for(var i= 0; i < etiquetasNuevas.length; i++){
    alert(etiquetasNuevas[i]);
    var newOption = $('<option selected value="1">' + etiquetasNuevas[i] + '</option>');
    $('#selector_etiquetas').append(newOption);
  }

  $('#selector_etiquetas').trigger("chosen:updated");
  etiquetasNuevas = [];
  var etiquetasNuevas_json = JSON.stringify(etiquetasNuevas);
  $('#etiquetasNuevas').val(etiquetasNuevas_json);
}
