$(document).ready(function () {

    $('#taulaDePosts').DataTable({
        "language": {
            "url": "/TSFI/public/js/backend/dataTableCatalan.json"
        },
        "columns": [
            {"orderable": false},
            {},
            {},
            {},
            {},
            {"orderable": false},
            {"orderable": false}
        ],
        "order": [[1, 'asc']]
    });
    $('.twitterIconDataTable').on('click', function (e) {
        //codigo que necesites
        $("#modalPublicacionTwitter").modal('toggle');

    });
    $('.botoPublicarTwitterIntern').on('click', function (e) {
        var id = $('input[name=categoryRadio]:checked').val();
        console.log(id);
        $.ajax({
            url: '/TSFI/public/ajax/categories/llistarCategoriaPerTransferencia',
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
    });



});