//************* DECLARAR VARIABLES             ******************//
var enviar = false;
var maximoTitulo = 60; /* CARACTERES MAXIMOS DE TITULO */
var maximoSubtitulo = 120; /* CARACTERES MAXIMOS DE SUBTITULO */
var maximoContenido = 0; /* CARACTERES MAXIMOS DE CONTENIDO */
var haySubtitulo;
var hayContenido;
var hayTitulo;
var vacio;
var notificarEntrada = true;


//************* CUERPO PRINCIPAL DEL PROGRAMA *******************//
$( document ).ready(function() {

    /********************************* FUNCIONES BOTON GUARDAR  ***********************************/
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    $("#formulario_entrada").ajaxForm({
        url: urlPrincipal + 'ajax/paginas/guardarPagina',
        type: 'post',
        success: function(data) {
          console.log(data);
          $('#idBD' ).val(data); /* GUARDAMOS LA ID DE LA BD EN EL FORMULARIO */
          showSuccessAlert('Desat!');

        },
        error: function(xhr, desc, err) {
          showErrorAlert('Error al guardar!');
        }
    });

});



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
    validarContenido();                             /* VALIDA SI HAY CARACTERES EN LA CAJA DE CONTENIDO */

    var maximosRespetados = false;                  /* VALIDA SI LOS MAXIIMOS DE CARACTERES HAN SIDO RESPETADOS */
    if(caracteresTitulo && caracteresSubtitulo) { maximosRespetados = true; }

    var camposObligatorios =  validarCamposObligatorios(); /* VALIDA SI TODOS LOS CAMPOS OBLIGATORIOS ESTAN CUMPLIMENTADOS */

    /* TRATAMIENTO PARA PERMITIR O NO EL GUARDADO */
    if (camposObligatorios && maximosRespetados) {
      $('button[type="submit"]').removeAttr('disabled');
    } else {
      $('button[type="submit"]').attr('disabled','disabled');
    }

}

function validarCamposObligatorios(){
  if(hayTitulo && haySubtitulo && hayContenido){
    return true;
  } else {
    return false;
  }
}
