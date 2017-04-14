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

    $("#formulariEditarEntitat :input").change(function() {
        $("#formulariEditarEntitat").data("changed",true);
    });

    $("#formulariEditarEntitat").submit(function(e) {
        e.preventDefault();
        if ($("#formulariEditarEntitat").data("changed")) {
            $.ajax({
                url: urlPrincipal + 'ajax/entitat/actualitzarEntitat',
                type: 'post',
                data: $("#formulariEditarEntitat").serialize(),
                success: function(data) {
                    console.log(data);
                    showSuccessAlert('Entitat editada correctament!');
                    $("#formulariEditarEntitat").data("changed",false);
                },
                error: function(xhr, desc, err) {
                    console.log(xhr);
                    console.log("Details: " + desc + "\nError:" + err);
                    showErrorAlert("Error en la edició de l'entitat");
                }});
        }else {
            showWarningAlert("No has canviat res!");
        }
    });

});



