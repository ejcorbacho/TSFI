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


//************* CUERPO PRINCIPAL DEL PROGRAMA *******************//
$( document ).ready(function() {
  habilitarFechas()

  // LISTADO CATEGORIAS
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

    /********************************* FUNCIONES LISTADO ETIQUETAS  ***********************************/

    $('#dropdown_etiquetas')
      .on('click', '#dropdown_button_etiquetas', function() {

          $('#dropdown_list_etiquetas').toggle();

          $('#dropdown_list_etiquetas li').each(function() {

                var text = $(this).text().toLowerCase();
                var match = text.indexOf(search) > -1;
                if(search.length == 0){match = false}
                //match = true;

                //MOSTRAR SIEMPRE LO SELECICONADOS

                if ( $(this).children('input').is(':checked') ){
                  match = true;
                }
                $(this).toggle(match);
            });
      })
      .on('input', '#dropdown_search_etiquetes', function() {
          var target = $(this);
          var search = target.val().toLowerCase();


          $('#dropdown_list_etiquetas li').each(function() {
                var text = $(this).text().toLowerCase();
                var match = text.indexOf(search) > -1;
                if(search.length == 0){match = false}
                //match = true;

                //MOSTRAR SIEMPRE LO SELECICONADOS

                if ( $(this).children('input').is(':checked') ){
                  match = true;
                }


                $(this).toggle(match);
            });
      });




  $('#data_publicacion').datepicker({
    autoclose: true,
     dateFormat: 'dd/mm/yy',
    weekStart:1,
  });

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
        },
        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
          showErrorAlert('Error al guardar!');
        }
    });

});
//************* GUARDADO DE CONTENIDO         ******************//




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

//Date picker
//Date picker


/*********************** FUNCIONES CON FECHAS **************************************/
function habilitarFechas(){

       if($("#visible").is(':checked')) {
           $('#div_fecha_publicacion').css('display', 'block');
       } else {
           $('#div_fecha_publicacion').css('display', 'none');
       }


}
