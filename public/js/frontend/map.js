$( document ).ready( function () {
    var locationArray = data.localizacion.split(',');
    var location = {lat: parseFloat(locationArray[0]), lng: parseFloat(locationArray[1])};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: location
    });
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
});
