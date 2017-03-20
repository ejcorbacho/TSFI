$(document).ready(function() { 

$.ajax({
            url: '/TSFI/public/ajax/entitat/TresEntitats',
            type: 'get',
            success: function(data) {
            console.log(data);
            mostrarEntitats(data);
            },
            error: function(xhr, desc, err) {
              console.log(xhr);
              console.log("Details: " + desc + "\nError:" + err);
            }});
});

function mostrarEntitats (data) { 

    document.getElementsByClassName("sidebarLink");
    var ContingutEntitat = document.getElementsByClassName("sidebarLink");
    console.log("hola");
   // entidades = JSON.parse(data);
    
for (var index = 0; index < ContingutEntitat.length; index++) {
    var element = ContingutEntitat[index];
    element.innerHTML= '<img src="'+ data[index].url +'">';
  //  element.innerHTML=data[index].nombre;
}


};