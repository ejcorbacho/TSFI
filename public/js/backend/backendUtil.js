

function showErrorAlert(msg){
    document.getElementById('topErrorMessage').innerHTML = msg;
    $("#topErrorMessage").slideDown(200).delay(2000).fadeOut("slow");
}
function showSuccessAlert(msg){
    document.getElementById('topSuccessMessage').innerHTML = msg;
    $("#topSuccessMessage").slideDown(200).delay(2000).fadeOut("slow");
}
