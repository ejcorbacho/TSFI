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
  cargarListadoCategorias(); // CARGA INICIAL DEL LISTADO DE CATEGORIAS //
  validarEnviar();           // ES FA LA VALIDACIÓ INICAL DE CONTINGUTS //
  habilitarFechas()
    // bind 'myForm' and provide a simple callback function

  $('#data_publicacion').datepicker({
    autoclose: true,
    dateFormat:'yy-mm-dd',
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


//************* LLAMADAS A AJAX               ******************//
function cargarListadoCategorias(){
  $.ajax({
          type: "GET",
          url: url + 'ajax/categories/llistaCategories',
          data: {},
          dataType: "html",
          error: function(){
              showSuccessAlert('Error al carregar components de la pàgina');
          },
          success: function(data){
              var dataParse = JSON.parse(data);

              for (var x=0; x < dataParse.length; x++){
                $("#selectcategorias").append("<option value='" + dataParse[x].id + "'>" + dataParse[x].nombre + "</option>");
              }

             //$('#select_categorias').searchableOptionList();
          }
  });

}


function guardarCategoria(){
  var nombre_categoria = $("#nombrecategoria").val();

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $.ajax({
          type: "POST",
          url: url + 'ajax/categories/guardarCategoria',
          data: { nombre: nombre_categoria},
          dataType: "html",
          error: function(){
              showErrorAlert('Error al guardar al categoria');
          },
          success: function(){

              showSuccessAlert('Categoria afegida!');

              cargarListadoCategorias();


          }
  });

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
  var longitud = $("#contingut").val().length;
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
