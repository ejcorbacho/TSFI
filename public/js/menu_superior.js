$(document).ready(function(){
  var vez=0;
  $("#boton_bucador").bind("click", function(){

    $("#componentes_buscador").animate({
        width: "toggle",
        opacity: "toggle"
    });
    if (vez==0){
      $("#componentes_buscador").css("display", "block");
      vez = 1;
    }
  });

var menu_mostrado = 0;
  $("#boton_menu").bind("click", function(){
    if (menu_mostrado==0){
      $("#contenido_menu_responsive").fadeIn(500);
      $("#boton_desplegar_menu").removeClass("fa-bars");
      $("#boton_desplegar_menu").addClass("fa-times");
      $('#caja_buscador').focus();

      menu_mostrado = 1;
    } else {
      $("#contenido_menu_responsive").fadeOut(500);
      $("#boton_desplegar_menu").addClass("fa-bars");
      $("#boton_desplegar_menu").removeClass("fa-times");
      menu_mostrado = 0;
    }
  });
});
