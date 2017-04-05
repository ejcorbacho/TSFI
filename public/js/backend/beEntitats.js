$(document).ready(function () {


    $("#formulariNovaEntitat").ajaxForm({
        url: urlPrincipal + 'ajax/entitat/guardarEntitat',
        type: 'get',
        success: function (data) {
            console.log(data);
            showSuccessAlert('Nova entitat insertada correctament!');
            $("#formulariNovaEntitat").trigger("reset");
        },
        error: function (xhr, desc, err) {
            console.log(xhr);
            console.log("Details: " + desc + "\nError:" + err);
            showErrorAlert('Error en la inserció de la nova entitat');
        }
    });

});



