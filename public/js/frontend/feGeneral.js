

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

    $('#changeCookieTodos').on('click', function (e) {
        document.cookie = "CookiePublico=todos;" + expires + "; path=/cms";
        location.reload();
    });
    $('#changeCookieAlumnos').on('click', function (e) {
        document.cookie = "CookiePublico=alumnos;" + expires + "; path=/cms";
        location.reload();
    });
    $('#changeCookieProfesores').on('click', function (e) {
        document.cookie = "CookiePublico=profesores;" + expires + "; path=/cms";
        location.reload();
    });
    

});

//Buscador-----------
$(document).ready(function () {
    
    $('#caja_buscador').on('keyup', function (e) {
        $.ajax({
         url: urlPrincipal + 'ajax/searchByTag',
         type: 'get',
         dataType: 'json',
         data: ({data: $('#caja_buscador').val()}),
         success: function (busqueda) {
            console.log(busqueda);
            var html='';
            if(busqueda.total > 0){
                console.log('hola');
                for(var i=0; busqueda.total > i ;i++){
                    console.log('bu');
                    html= html +'<div class="resultadoDeBusqueda">';
                    html = html + '<h5 style="position:absolute">' + busqueda.data[i].titulo + '</h5>';
                    html = html + '<ul class="tags tagsBuscador" style="width: 100%;">';
                    for(var c=0; busqueda.data[i].tags.length > c ;c++){
                        html = html + '<li><a href="#" class="tag tagBuscador">' + busqueda.data[i].tags[c].nombre + '</a></li>';
                    }
                    html = html + '</ul>';
                    html = html + '</div>';
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
        




        // var busqueda = getDataOverAJAX('searchByTag',$('#caja_buscador').val());
        // console.log(busqueda);
        // if(busqueda.total > 0){

        // }


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