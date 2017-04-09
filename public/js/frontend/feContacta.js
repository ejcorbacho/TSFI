//************* DECLARAR VARIABLES             ******************//
var enviar = false;
var maximoTitulo = 60; /* CARACTERES MAXIMOS DE TITULO */
var maximoContenido = 0; /* CARACTERES MAXIMOS DE CONTENIDO */
var maximoNom = 50;
var maximoEmail = 50;
var hayEmail;
var hayNom;
var hayContenido;
var hayTitulo;
var vacio;


//************* CUERPO PRINCIPAL DEL PROGRAMA *******************//
$( document ).ready(function() {

    /********************************* FUNCIONES BOTON GUARDAR  ***********************************/


});


//************* GUARDADO DE CONTENIDO         ******************//


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
    var caracteresNom = validarNom();               /* VALIDA SI LA CANTIDAD DE CARACTERES QUE HAY EN EL NOMBRE */
    var caracteresEmail = validarEmail();           /* VALIDA SI LA CANTIDAD DE CARACTERES QUE HAY EN EL EMAIL */
    validarContenido();                             /* VALIDA SI HAY CARACTERES EN LA CAJA DE CONTENIDO */


    var maximosRespetados = false;                  /* VALIDA SI LOS MAXIIMOS DE CARACTERES HAN SIDO RESPETADOS */
    if(caracteresTitulo && caracteresNom && caracteresEmail) { maximosRespetados = true; }

    var camposObligatorios =  validarCamposObligatorios(); /* VALIDA SI TODOS LOS CAMPOS OBLIGATORIOS ESTAN CUMPLIMENTADOS */

    /* TRATAMIENTO PARA PERMITIR O NO EL GUARDADO */
    if (maximosRespetados && camposObligatorios) {
      $('button[type="submit"]').removeAttr('disabled');
    } else {
      $('button[type="submit"]').attr('disabled','disabled');
    }

}

function validarCamposObligatorios(){
  if(hayTitulo && hayContenido && hayNom && hayEmail){
    return true;
  } else {
    return false;
  }
}
