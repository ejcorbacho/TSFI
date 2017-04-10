

// $(document).ready(function () {

//     $.ajax({
//         url: urlPrincipal + 'ajax/entitat/TresEntitats',
//         type: 'get',
//         success: function (data) {
//             console.log(data);
//             mostrarEntitats(data);
//         },
//         error: function (xhr, desc, err) {
//             console.log(xhr);
//             console.log("Details: " + desc + "\nError:" + err);
//         }});
//     $.ajax({
//         url: urlPrincipal + 'ajax/entitat/EntitatsFooter',
//         type: 'get',
//         success: function (data) {
//             console.log(data);
//             mostrarEntitatsFooter(data);
//         },
//         error: function (xhr, desc, err) {
//             console.log(xhr);
//             console.log("Details: " + desc + "\nError:" + err);
//         }});




// });

// function mostrarEntitats(data) {
//     if(data.length>0){
//         var div = document.getElementById('entitatsColaboradores');
//         var html;
//         console.log(data.length);
//         div.innerHTML = '<h2>Entitats Colaboradores</h2>';
//         for (var index = 0; index < data.length; index++) {
//             html = div.innerHTML;
//             div.innerHTML = html + '<a href="' + data[index].url + '"><div class="sidebarLink"><img src="' + data[index].fotoentidad + '"></div></a>';
//         }
//     }
// }

// function mostrarEntitatsFooter(data) {

//     var ContingutEntitatFooter = $('#items_menu_cms');

//     for (var index = 0; index < data.length; index++) {
//         if(data[index].son_colaboradoras == 1){
//         var HTML = '<a id="items_footer_a" href="'+ data[index].url+'">' + data[index].nombre + '</a>';
//         $("#items_menu_cms").append(HTML);
//         }

//     }

// }



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