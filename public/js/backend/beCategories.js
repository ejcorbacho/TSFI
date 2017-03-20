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

});