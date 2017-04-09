
/*
$(document).ready(function () {

    $.ajax({
        url: urlPrincipal + 'ajax/entitat/TresEntitats',
        type: 'get',
        success: function (data) {
            console.log(data);
            mostrarEntitats(data);
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }});
    $.ajax({
        url: urlPrincipal + 'ajax/entitat/EntitatsFooter',
        type: 'get',
        success: function (data) {
            console.log(data);
            mostrarEntitatsFooter(data);
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
        }});




});

function mostrarEntitats(data) {

    document.getElementsByClassName("sidebarLink");
    var ContingutEntitat = document.getElementsByClassName("sidebarLink");
    // entidades = JSON.parse(data);

    for (var index = 0; index < ContingutEntitat.length; index++) {
        var element = ContingutEntitat[index];
        element.innerHTML = '<img src="' + data[index].fotoentidad + '">';
        //  element.innerHTML=data[index].nombre;
    }

}

function mostrarEntitatsFooter(data) {

    var ContingutEntitatFooter = $('#items_menu_cms');

    for (var index = 0; index < data.length; index++) {
        if(data[index].son_colaboradoras == 1){
        var HTML = '<a id="items_footer_a" href="'+ data[index].url+'">' + data[index].nombre + '</a>';
        $("#items_menu_cms").append(HTML);
        }

    }

}


*/
$(document).ready(function () {
    $('#changeCookieTodos').on('click', function (e) {
        document.cookie = "CookiePublico=todos";
    });
    $('#changeCookieAlumnos').on('click', function (e) {
        document.cookie = "CookiePublico=alumnos";
    });
    $('#changeCookieProfesores').on('click', function (e) {
        document.cookie = "CookiePublico=profesores";
    });
});