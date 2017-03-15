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

});