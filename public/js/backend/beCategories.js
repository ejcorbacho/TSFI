$(document).ready(function() { 


    $("#formulariNovaCategoria").ajaxForm({
        url: urlPrincipal + 'ajax/categories/guardarCategoria',
        type: 'get',
        success: function(data) {
        console.log(data);
        showSuccessAlert('Nova categoria insertada correctament!');
        $("#formulariNovaCategoria").trigger("reset");
        },
        error: function(xhr, desc, err) {
          console.log(xhr);
          console.log("Details: " + desc + "\nError:" + err);
          showErrorAlert('Error en la inserció de la nova categoria');
        }
    });
    $("#formulariEditarCategoria :input").change(function() {
       $("#formulariEditarCategoria").data("changed",true);
    });
    
    $("#formulariEditarCategoria").submit(function(e) {
        e.preventDefault();
        if ($("#formulariEditarCategoria").data("changed")) {
            $.ajax({
            url: urlPrincipal + 'ajax/categories/actualitzarCategoria',
            type: 'post',
            data: $("#formulariEditarCategoria").serialize(),
            success: function(data) {
            console.log(data);
            showSuccessAlert('Categoria editada correctament!');
            $("#formulariEditarCategoria").data("changed",false);
            },
            error: function(xhr, desc, err) {
              console.log(xhr);
              console.log("Details: " + desc + "\nError:" + err);
              showErrorAlert('Error en la edició de la categoria');
            }});
        }else {
            showWarningAlert("No has canviat res!");
        }
    });
    $('#taulaDeCategories').DataTable({
        "language": {
            "url": urlPrincipal + "js/backend/dataTableCatalan.json"
        },
        "columns": [
            { },
            { "orderable": false },
            { "orderable": false }
        ],
        
        "order": [[0, 'asc']]
    });
    $('.botoEsborrarCategories').on('click', function (e) {
        
        var id = $(e.currentTarget).parent().parent('tr').attr('categoryId');
        if (id != null) {
            console.log(id);
            $('#taulaDeCategories').attr('categoryToManage',id);
            $.ajax({
                url: urlPrincipal + 'ajax/categories/llistarPostsDeCategoria',
                type: 'post',
                dataType: 'json',
                data: ({id: id}),
                success: function (data) {
                    console.log(data);
                    if (data != 0) {
                        $('#modalEliminacioCategoriaContent').empty();
                        $('#modalEliminacioCategoria').modal('toggle');
                        var html = '<table class="table table-hover table-striped" style="overflow: scroll;max-height: 200px">' +
                                '<thead>' +
                                '<tr>' +
                                '<th>ID de Post</th>' +
                                '<th>Titol del post</th>' +
                                '</tr>' +
                                '</thead>' +
                                '<tbody>';
                        for (var i = 0; i < data.length; i++) {
                            html = html + '<tr class="filaDeDadesCategoria" categoryId=>' +
                                    '<td class="idEntrada">' + data[i].id + '</td>' +
                                    '<td class="titolEntrada">' + data[i].titulo + '</td>' +
                                    '</tr>';
                        }
                        html = html + '</tbody>' +
                                '</table>';
                        $('#modalEliminacioCategoriaContent').append(html);
                        $('#modalEliminacioCategoriaContent').append('<p>Si elimines aquesta categoria, es perdrà la relació que té amb les entrades. Pots moure les entrades a una altre categoria o elimar la categoria. Que vols Fer?</p>');

                    } else {
                        enviarPeticioPerEliminar();
                    }
                },
                error: function (xhr, desc, err) {
                    console.log(xhr);
                    console.log("Details: " + desc + "\nError:" + err);
                }});
        }
    });

    $('#botoMourePostsCategoria').on('click', function (e) {
        var id = $('#taulaDeCategories').attr('categoryToManage');
        console.log($('tr[categoryId="' + id + '"]').children('.nomCategoria').text());
        console.log(id);
        $.ajax({
            url: urlPrincipal + 'ajax/categories/llistarCategoriaPerTransferencia',
            type: 'post',
            dataType: 'json',
            data: ({id: id}),
            success: function (data) {
                console.log(data);
                if (data != 0) {
                    $('#modalEliminacioCategoria').modal('hide');
                    $('#modalMoureEntradesCategoria').modal('toggle');
                    $('#modalMoureEntradesCategoriaContent').empty();
                    var html = '<select form-control="select" id="CategoriaDesti" name="categoriaDesti" class="" data-live-search="true">';
                    for (var i = 0; i < data.length; i++) {
                        html = html + '<option value="' + data[i].id + '">' + data[i].nombre + '</option>';
                    }
                    html = html + '</select>';
                    $('#modalMoureEntradesCategoriaContent').append(html);
                } else {

                }
            },
            error: function (xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }});
    });

    $('#botoMourePostsCategoriaAra').on('click', function (e) {
        var id = $('#taulaDeCategories').attr('categoryToManage');
        var id_destino = $('#CategoriaDesti').val();
//        e.preventDefault();
        console.log(id);
        console.log(id_destino);
        $.ajax({
            url: urlPrincipal + 'ajax/categories/transferirCategoria',
            type: 'post',
            dataType: 'json',
            data: ({id: id, id_desti: id_destino}),
            success: function (data) {
                console.log(data);
                if (data != 0) {
                    showSuccessAlert(data);
                    $('#modalMoureEntradesCategoria').modal('hide');
                    setTimeout(location.reload.bind(location), 1000);
                }
            },
            error: function (xhr, desc, err) {
                console.log(xhr);
                console.log("Details: " + desc + "\nError:" + err);
            }
        });
    });
    $('.botoEliminarCategoriaIntern').on('click', function (e) {
        var id = $('#taulaDeCategories').attr('categoryToManage');
//        e.preventDefault();
        console.log(id);
        $.ajax({
            url: urlPrincipal + 'ajax/categories/eliminarCategoria',
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
function OcultarCategoria(id){
    $.ajax({
            url: urlPrincipal + 'ajax/categories/ocultarCategoria',
            type: 'post',
            dataType:'json',
            data: ({id:id}),
            success: function(data) {
                console.log(data);
                showSuccessAlert(data);
            },
            error: function(xhr, desc, err) {
              console.log(xhr);
              console.log("Details: " + desc + "\nError:" + err);
              showErrorAlert('Error');
          }
      });
}
function enviarPeticioPerEliminar() {
    var id = $('#taulaDeCategories').attr('categoryToManage');

    $('#modalConfirmacioEliminacioCategoria').modal('toggle');
    $('#modalConfirmacioEliminacioCategoriaContent').empty();
    var html = '<p categoryId="'+ id +'">Estas segur de que vols eliminar la categoria "'+$('tr[categoryId="' + id + '"]').children('.nomCategoria').text()+'" ?</p>';
    $('#modalConfirmacioEliminacioCategoriaContent').append(html);
}