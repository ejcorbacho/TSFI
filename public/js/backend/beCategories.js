$(document).ready(function() { 


    $("#formulariNovaCategoria").ajaxForm({
        url: '/TSFI/public/ajax/categories/guardarCategoria',
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
//    $("#formulariEditarCategoria").ajaxForm({
//        url: '/TSFI/public/ajax/categories/actualitzarCategoria',
//        type: 'post',
//        success: function(data) {
//        console.log(data);
//        showSuccessAlert('Categoria editada correctament!');
//        //$("#formulariEditarCategoria").trigger("reset");
//        },
//        error: function(xhr, desc, err) {
//          console.log(xhr);
//          console.log("Details: " + desc + "\nError:" + err);
//          showErrorAlert('Error en la edició de la nova categoria');
//        }
//    });

    $("#formulariEditarCategoria :input").change(function() {
       $("#formulariEditarCategoria").data("changed",true);
    });
    
    $("#formulariEditarCategoria").submit(function(e) {
        e.preventDefault();
        if ($("#formulariEditarCategoria").data("changed")) {
            $.ajax({
            url: '/TSFI/public/ajax/categories/actualitzarCategoria',
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
              showErrorAlert('Error en la edició de la nova categoria');
            }});
        }else {
            showWarningAlert("No has canviat res!");
        }
    });
    $('#taulaDeCategories').DataTable({
        "language": {
            "url": "/TSFI/public/js/backend/dataTableCatalan.json"
        },
        "order": [[1, 'asc']]
    });
    $('#botoEsborrarCategories').on('click',function(e){
        var id = $('input[name=categoryRadio]:checked', '#taulaDeCategories').val();
        e.preventDefault();
        console.log(id);
        $.ajax({
            url: '/TSFI/public/ajax/categories/llistarPostsDeCategoria',
            type: 'post',
            dataType:'json',
            data: ({id:id}),
            success: function(data) {
                console.log(data);
                showSuccessAlert(data);
                if (data!=0) {
                    $('#modalEliminacioCategoria').modal('toggle');
                    $('#modalEliminacioCategoriaContent').append(data);
                }
            },
            error: function(xhr, desc, err) {
              console.log(xhr);
              console.log("Details: " + desc + "\nError:" + err);
              showErrorAlert('Error');
        }});
        
        
        
        
//        for (var i = 0; i < elements.length; i++) {
//            console.log(elements[i].parentNode.parentNode.getAttribute('categoryId'));
//            $.ajax({
//            url: '/TSFI/public/ajax/categories/eliminarCategoria',
//            type: 'post',
//            dataType:'json',
//            
//            data: elements[i].parentNode.parentNode.getAttribute('categoryId'),
//            success: function(data) {
//            console.log(data);
//            showSuccessAlert('Categoria eliminada correctament!');
//            location.reload();
//            },
//            error: function(xhr, desc, err) {
//              console.log(xhr);
//              console.log("Details: " + desc + "\nError:" + err);
//              showErrorAlert('Error en la eliminació de la nova categoria');
//            }});
//        
//        }
    });
});