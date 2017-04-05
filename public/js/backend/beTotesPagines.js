$(document).ready(function () {
    $('#taulaDePagines').DataTable({
        "language": {
            "url": urlPrincipal + "js/backend/dataTableCatalan.json"
        },
        "columns": [
            //{"orderable": false},
            {},
            {"orderable": false},
            {"orderable": false}
        ],
        "order": [[0, 'asc']]
    });
    

    $('.botoEsborrarPagines').on('click', function (e) {
        var id = $(e.currentTarget).parent().parent('tr').attr('paginaId');
        if (id != null) {
            console.log(id);
            $('#taulaDePagines').attr('paginaAEditar', id);

            $('#modalConfirmacioEliminarPagina').modal('toggle');
            $('#modalConfirmacioEliminarPaginaContent').empty();
            var html = '<p paginaId="' + id + '">Estas segur de que vols eliminar la entrada "' + $('tr[paginaId="' + id + '"]').children('.nomPagina').text() + '" ?</p>';
            $('#modalConfirmacioEliminarPaginaContent').append(html);
            
        }
    });
    $('.botoEliminarPaginaIntern').on('click', function (e) {
        var id = $('#taulaDePagines').attr('paginaAEditar');
        console.log(id);
        $.ajax({
            url: urlPrincipal + 'ajax/pagines/eliminar',
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
});

function getDataOverAJAX(route, data) {
    return $.ajax({
        type: 'GET',
        url: urlPrincipal + 'ajax/' + route,
        data: {data: data}
    });
}