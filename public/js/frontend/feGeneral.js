

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

    var d = new Date();
    d.setTime(d.getTime() + (60*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();

    $('.changeCookieTodos').on('click', function (e) {
        document.cookie = "CookiePublico=todos;" + expires + "; path=/cms";
        location.reload();
    });
    $('.changeCookieAlumnos').on('click', function (e) {
        document.cookie = "CookiePublico=alumnos;" + expires + "; path=/cms";
        location.reload();
    });
    $('.changeCookieProfesores').on('click', function (e) {
        document.cookie = "CookiePublico=profesores;" + expires + "; path=/cms";
        location.reload();
    });
    

});
//Mensaje de cookies:
$(document).ready(function () {
    console.log(getCookie('cookieMessage'));
    if (getCookie("cookieMessage")=="1") {
        var d = new Date();
        d.setTime(d.getTime() + (120*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = "cookieMessage=1;" + expires + "; path=/cms";
        $('.cookiesMessage').show();
    }

    $('#acceptCookies').on('click', function (e) {
        var d = new Date();
        d.setTime(d.getTime() + (120*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = "cookieMessage=0;" + expires + "; path=/cms";
        $('.cookiesMessage').hide();
    });

    

});
function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}
//Buscador-----------
$(document).ready(function () {
    
    $('#caja_buscador').on('keyup', function (e) {
        if ($('#caja_buscador').val()!='') {
        $.ajax({
         url: urlPrincipal + 'ajax/searchByTag',
         type: 'get',
         dataType: 'json',
         data: ({data: $('#caja_buscador').val()}),
         success: function (busqueda) {
            console.log(busqueda);
            var html='';
            if(busqueda.total > 0){
                //console.log('hola');
                for(var i=0; busqueda.total > i ;i++){
                    //console.log('bu');
                    html = html + '<a href="'+urlPrincipal+'post/'+ busqueda.data[i].id +'">';
                    html= html +'<div class="resultadoDeBusqueda">';
                    html = html + '<h5 style="position:absolute">' + busqueda.data[i].titulo + ' • <span>' + busqueda.data[i].data_publicacion + '</span></h5>';
                    html = html + '<ul class="tags tagsBuscador" style="width: 100%;">';
                    try {
                        for(var c=0; busqueda.data[i].tags.length > c ;c++){
                            html = html + '<li><a href="'+urlPrincipal+'post/'+ busqueda.data[i].id +'" class="tag tagBuscador">' + busqueda.data[i].tags[c].nombre + '</a></li>';
                        }
                    } catch (error) {
                        console.log('no hay tags');
                    }
                    
                    html = html + '</ul>';
                    html = html + '</div>';
                    html = html + '</a>';
                    html = html + '<hr class="hrBuscador">';
                }
                $('.resultadosDeBusqueda').html(html);
            }else{
                html= html +'<div class="resultadoDeBusqueda">';
                html = html + '<h5 style="position:absolute">No hem trobat res que coincideixi amb els paràmetres de cerca especificats... :( </h5>';
                html = html + '</div>';
                html = html + '<hr class="hrBuscador">';
                $('.resultadosDeBusqueda').html(html);
            }

         },
         error: function (xhr, desc, err) {
         console.log(xhr);
         console.log("Details: " + desc + "\nError:" + err);
        }});
        }else{
             $('.resultadosDeBusqueda').html('');
        }
    });
//BUSCADOR MOBIL
$('#inputBuscador_responsive').on('keyup', function (e) {
    
    if ($('#inputBuscador_responsive').val()!='') {
        $.ajax({
         url: urlPrincipal + 'ajax/searchByTag',
         type: 'get',
         dataType: 'json',
         data: ({data: $('#inputBuscador_responsive').val()}),
         success: function (busqueda) {
            console.log(busqueda);
            var html='';
            if(busqueda.total > 0){
                //console.log('hola');
                for(var i=0; busqueda.total > i ;i++){
                    //console.log('bu');
                    html = html + '<a href="'+urlPrincipal+'post/'+ busqueda.data[i].id +'">';
                    html= html +'<div class="resultadoDeBusquedaMobil">';
                    html = html + '<h5>' + busqueda.data[i].titulo + ' • <span>' + busqueda.data[i].data_publicacion + '</span></h5>';
                    html = html + '<ul class="tags tagsBuscador" style="width: 100%;">';
                    try {
                        for(var c=0; busqueda.data[i].tags.length > c ;c++){
                            html = html + '<li><a href="'+urlPrincipal+'post/'+ busqueda.data[i].id +'" class="tag tagBuscador">' + busqueda.data[i].tags[c].nombre + '</a></li>';
                        }
                    } catch (error) {
                        console.log('no hay tags');
                    }
                    
                    html = html + '</ul>';
                    html = html + '</div>';
                    html = html + '</a>';
                    html = html + '<hr class="hrBuscador">';
                }
                $('.resultadosDeBusquedaMobil').html(html);
            }else{
                html= html +'<div class="resultadoDeBusquedaMobil">';
                html = html + '<h5 >No hem trobat res que coincideixi amb els paràmetres de cerca especificats... :( </h5>';
                html = html + '</div>';
                html = html + '<hr class="hrBuscador">';
                $('.resultadosDeBusquedaMobil').html(html);
            }

         },
         error: function (xhr, desc, err) {
         console.log(xhr);
         console.log("Details: " + desc + "\nError:" + err);
        }});
    }else{
        $('.resultadosDeBusquedaMobil').html('');
    }
});



    
});
function searchByTag( route, data) {
    return $.ajax({
        type: 'GET',
        url: urlPrincipal + 'ajax/' + route,
        data: {data: data}
    });
}
function mostrarResultados(){

}
