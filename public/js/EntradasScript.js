//************* DECLARAR VARIABLES             ******************//
var enviar = false;
var maximoTwitter = 140; /* CARACTERES MAXIMOS DE TWITTER */
var maximoResumen = 450; /* CARACTERES MAXIMOS DE RESUMEN */
var maximoTitulo = 30; /* CARACTERES MAXIMOS DE TITULO */
var maximoSubtitulo = 40; /* CARACTERES MAXIMOS DE SUBTITULO */
var maximoContenido = 30; /* CARACTERES MAXIMOS DE CONTENIDO */


//************* CUERPO PRINCIPAL DEL PROGRAMA *******************//

alert('hola');

cargarListadoCategorias(); // CARGA INICIAL DEL LISTADO DE CATEGORIAS //

//************* LLAMADAS A AJAX               ******************//

function cargarListadoCategorias(){
  alert('llama');
  $.ajax({
          type: "POST",
          url: "/ajax/categories/llistaCategories",
          data: {},
          dataType: "html",
          error: function(){
                    alert("error petición ajax");
          },
          success: function(data){

          }
  });

}

function validarTwitter(){
  var longitud = $("#twitter").val().length;
  $("#notificaciones_twitter ").empty();
  var restant = maximoTwitter - longitud;
  $("#notificaciones_twitter ").append("Queden " + restant);
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
  $("#notificaciones_resumen ").append("Queden " + restant);
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
  $("#notificaciones_titulo ").append("Queden " + restant);
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
  $("#notificaciones_subtitulo ").append("Queden " + restant);
  if (restant >= 0){
    return true;
  } else {
    return false;
  }
}

function validarContenido() {
  var longitud = getStats('editor').chars;
  $("#notificaciones_contenido").empty();
  var restant = maximoContenido - longitud;
  if (restant >= 0){
    return true;
  } else {
    $("#notificaciones_contenido").append("Máxim de contingut superat! (Sobren: " + Math.abs(restant) + " caracters)");
    return false;
  }
}


function validarEnviar(){
  if (validarTwitter() & validarResumen() & validarTitulo() & validarSubtitulo() & validarContenido()) {
    $("#notificaciones_twitter").append("Si");
    $('input[type="submit"]').removeAttr('disabled');
  } else {
    $("#notificaciones_twitter ").append("No");
    $('input[type="submit"]').attr('disabled','disabled');
  }
}
