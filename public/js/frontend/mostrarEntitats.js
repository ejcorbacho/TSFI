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
});

function mostrarEntitats(data) {
    if(data.length>0){
        var div = document.getElementById('entitatsColaboradores');
        var html;
        console.log(data.length);
        div.innerHTML = '<h2>Entitats Col·laboradores</h2>';
        for (var index = 0; index < data.length; index++) {
            html = div.innerHTML;
            div.innerHTML = html + '<a href="' + data[index].url + '"><div style="height:85px;" class="sidebarPost"><img class="sidebarPostImg" src="' + data[index].fotoentidad + '"></div></a>';
        }
    }
}


