$(document).ready(function () {
    $('#taulaDePosts').DataTable({
        "language": {
            "url": urlPrincipal + "js/backend/dataTableCatalan.json"
        },
        "columns": [
            //{"orderable": false},
            {},
            {},
            {"orderable": false}
        ],
        "order": [[0, 'asc']]
    });


    $('.botoEsborrarEntrades').on('click', function (e) {
        var id = $(e.currentTarget).parent().parent('tr').attr('entradaId');
        if (id != null) {
            console.log(id);
            $('#taulaDePosts').attr('postToManage', id);

            $('#modalConfirmacioEliminarEntrada').modal('toggle');
            $('#modalConfirmacioEliminarEntradaContent').empty();
            var html = '<p entradaId="' + id + '">Estas segur de que vols eliminar el usuari amb el mail ' + $('tr[entradaId="' + id + '"]').children('.nomEntrada').text() + '" ?</p>';
            $('#modalConfirmacioEliminarEntradaContent').append(html);

        }
    });
    $('.botoEliminarEntradaIntern').on('click', function (e) {
        var id = $('#taulaDePosts').attr('postToManage');
        console.log(id);
        $.ajax({
            url: urlPrincipal + 'ajax/usuaris/eliminar',
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

});

function getDataOverAJAX(route, data) {
    return $.ajax({
        type: 'GET',
        url: urlPrincipal + 'ajax/' + route,
        data: {data: data}
    });
}
