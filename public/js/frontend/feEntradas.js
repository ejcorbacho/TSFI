//************* DECLARAR VARIABLES             ******************//
var enviar = false;
var maximoResumen = 200; /* CARACTERES MAXIMOS DE RESUMEN */
var maximoTitulo = 60; /* CARACTERES MAXIMOS DE TITULO */
var maximoSubtitulo = 120; /* CARACTERES MAXIMOS DE SUBTITULO */
var maximoContenido = 0; /* CARACTERES MAXIMOS DE CONTENIDO */
var maximoNom = 50;
var maximoEmail = 50;
var hayEmail;
var hayNom;
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

function enviarFormularioCaptcha(){
  var captcha =  $('#g-recaptcha-response').val();
  if(captcha == ''){
    showErrorAlert('Verifica que no ets un robot!');
    return false;
  } else {
    return true;
  }
}


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

function validarNom() {
  var longitud = $("#nom").val().length;
  $("#notificaciones_nom").empty();
  var restant = maximoNom - longitud;
  $("#notificaciones_nom ").append("queden " + restant);
  if(longitud > 0){
    hayNom = true;
  } else {
    hayNom = false;
  }
  if (restant >= 0){
    return true;
  } else {
    return false;
  }
}

function validarEmail() {
  var longitud = $("#email").val().length;
  $("#notificaciones_email").empty();
  var restant = maximoEmail - longitud;

  //comprovar si realmente es un email
  emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

  if(!emailRegex.test($("#email").val())){
    $("#notificaciones_email").append("Introdueix un email vàlid!");
    hayEmail = false;
  } else {
    $("#notificaciones_email").append("queden " + restant);
    hayEmail = true;
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
    var caracteresNom = validarNom();               /* VALIDA SI LA CANTIDAD DE CARACTERES QUE HAY EN EL NOMBRE */
    var caracteresEmail = validarEmail();           /* VALIDA SI LA CANTIDAD DE CARACTERES QUE HAY EN EL EMAIL */
    validarContenido();                             /* VALIDA SI HAY CARACTERES EN LA CAJA DE CONTENIDO */


    var maximosRespetados = false;                  /* VALIDA SI LOS MAXIIMOS DE CARACTERES HAN SIDO RESPETADOS */
    if(caracteresTitulo && caracteresSubtitulo && caracteresResumen && caracteresNom && caracteresEmail) { maximosRespetados = true; }

    var camposObligatorios =  validarCamposObligatorios(); /* VALIDA SI TODOS LOS CAMPOS OBLIGATORIOS ESTAN CUMPLIMENTADOS */

    /* TRATAMIENTO PARA PERMITIR O NO EL GUARDADO */
    if (maximosRespetados && camposObligatorios) {
      $('button[type="submit"]').removeAttr('disabled');
    } else {
      $('button[type="submit"]').attr('disabled','disabled');
    }

}

function validarCamposObligatorios(){
  if(hayTitulo && haySubtitulo && hayResumen && hayContenido && hayNom && hayEmail){
    return true;
  } else {
    return false;
  }
}
