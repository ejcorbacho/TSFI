$(document).ready(function () {
    $('#taulaDePosts').DataTable({
        "language": {
            "url": urlPrincipal + "js/backend/dataTableCatalan.json"
        },
        "columns": [
            //{"orderable": false},
            {},
            {},
            {},
            {},
            {"orderable": false},
            {"orderable": false},
            {"orderable": false}
        ],
        "order": [[0, 'asc']]
    });

    $('.twitterIconDataTable').on('click', function (e) {
        //codigo que necesites
        var id = $(e.currentTarget).parent().parent('tr').attr('entradaId');
        console.log($(e.currentTarget).parent().siblings('td.nomEntrada').text());
        $('.inputTwitter').val($(e.currentTarget).parent().siblings('td.nomEntrada').text()+ ', ' + 'llegeix més a: ' + nombreDominioGeneral + urlPrincipal + 'post/' + id  );
        validarTwitter();
        $("#modalPublicacionTwitter").modal('toggle');
        
    });

    $('.botoEsborrarEntrades').on('click', function (e) {
        var id = $(e.currentTarget).parent().parent('tr').attr('entradaId');
        if (id != null) {
            console.log(id);
            $('#taulaDePosts').attr('postToManage', id);

            $('#modalConfirmacioEliminarEntrada').modal('toggle');
            $('#modalConfirmacioEliminarEntradaContent').empty();
            var html = '<p entradaId="' + id + '">Estas segur de que vols eliminar la entrada "' + $('tr[entradaId="' + id + '"]').children('.nomEntrada').text() + '" ?</p>';
            $('#modalConfirmacioEliminarEntradaContent').append(html);
            
        }
    });
    $('.botoEliminarEntradaIntern').on('click', function (e) {
        var id = $('#taulaDePosts').attr('postToManage');
        console.log(id);
        $.ajax({
            url: urlPrincipal + 'ajax/entrades/ocultarEntrada',
            type: 'post',
            dataType: 'json',
            data: ({id: id}),
            success: function (data) {
                console.log(data);
                if (data != 0) {
                    showSuccessAlert(data);
                    $(e).closest('.modal').modal('hide');
                    setTimeout(location.reload.bind(location), 1000);
                }
            },
            error: function (xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        });
    });
    $('.botoPublicarTwitterIntern').on('click', function (e) {
        var text = $('.inputTwitter').val();

        getDataOverAJAX('postToTwitter', text);
        /*
         $.ajax({
         url: urlPrincipal + 'ajax/categories/llistarCategoriaPerTransferencia',
         type: 'post',
         dataType: 'json',
         data: ({id: id}),
         success: function (data) {
         console.log(data);
         },
         error: function (xhr, desc, err) {
         console.log(xhr);
         console.log("Details: " + desc + "\nError:" + err);
         }});
         */
    });
    $('.inputTwitter').on('keyup', function (e) {
        validarTwitter();
    });
});

function getDataOverAJAX(route, data) {
    return $.ajax({
        type: 'GET',
        url: urlPrincipal + 'ajax/' + route,
        data: {data: data},
        success: function (data) {
        showSuccessAlert('Pubicat a twitter correctament!');
        $("#modalPublicacionTwitter").modal('hide');
        },
         error: function (xhr, desc, err) {
         console.log(xhr);
         console.log("Details: " + desc + "\nError:" + err);
         }});
    
}
function validarTwitter() {
    var longitud = $(".inputTwitter").val().length;
    var restant = 140 - longitud;
    $(".charactersLeftTwitter ").empty();
    $(".charactersLeftTwitter ").append("queden " + restant);
}