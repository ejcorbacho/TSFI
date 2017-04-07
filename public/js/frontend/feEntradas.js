//************* DECLARAR VARIABLES             ******************//
var enviar = false;
var maximoResumen = 500; /* CARACTERES MAXIMOS DE RESUMEN */
var maximoTitulo = 60; /* CARACTERES MAXIMOS DE TITULO */
var maximoSubtitulo = 120; /* CARACTERES MAXIMOS DE SUBTITULO */
var maximoContenido = 0; /* CARACTERES MAXIMOS DE CONTENIDO */
var haySubtitulo;
var hayContenido;
var hayTitulo;
var hayResumen;
var vacio;


//************* CUERPO PRINCIPAL DEL PROGRAMA *******************//
$( document ).ready(function() {

    /********************************* FUNCIONES BOTON GUARDAR  ***********************************/
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $("#formulario_entrada").ajaxForm({
        url: urlPrincipal + 'ajax/feentradas/guardarEntrada',
        type: 'post',
        data:  {captcha: $('#g-recaptcha-response').val()},
        success: function(data) {

          alert(data);

        },
        error: function(xhr, desc, err) {

          alert('Error al guardar!');
        }
    });

});


//************* GUARDADO DE CONTENIDO         ******************//



function validarResumen() {
  var longitud = $("#resum").val().length;
  $("#notificaciones_resumen ").empty();
  var restant = maximoResumen - longitud;
  $("#notificaciones_resumen ").append("queden " + restant);
  if(longitud > 0){
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
  if(longitud > 0){
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
  if(longitud > 0){
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
  var longitud = getStats('contingut').chars;
  if(longitud > 0){
    hayContenido = true;
  } else {
    hayContenido = false;
  }

}


function validarFormulario(){

    var caracteresTitulo = validarTitulo();         /* VALIDA SI LA CANTIDAD DE CARACTERES QUE HAY EN EL TITULO */
    var caracteresSubtitulo = validarSubtitulo();   /* VALIDA SI LA CANTIDAD DE CARACTERES QUE HAY EN EL SUBTITULO */
    var caracteresResumen = validarResumen();       /* VALIDA SI LA CANTIDAD DE CARACTERES QUE HAY EN EL RESUMEN */
    validarContenido();                             /* VALIDA SI HAY CARACTERES EN LA CAJA DE CONTENIDO */


    var maximosRespetados = false;                  /* VALIDA SI LOS MAXIIMOS DE CARACTERES HAN SIDO RESPETADOS */
    if(caracteresTitulo && caracteresSubtitulo && caracteresResumen) { maximosRespetados = true; }

    var camposObligatorios =  validarCamposObligatorios(); /* VALIDA SI TODOS LOS CAMPOS OBLIGATORIOS ESTAN CUMPLIMENTADOS */

    /* TRATAMIENTO PARA PERMITIR O NO EL GUARDADO */
    if (maximosRespetados && camposObligatorios) {
      $('button[type="submit"]').removeAttr('disabled');
    } else {
      $('button[type="submit"]').attr('disabled','disabled');
    }

}

function validarCamposObligatorios(){
  if(hayTitulo && haySubtitulo && hayResumen && hayContenido){
    return true;
  } else {
    return false;
  }
}
