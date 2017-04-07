$( document ).ready( function () {
    var locationArray = data.location.split(',');
    var location = {lat: locationArray[0], lng: locationArray[1]};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: location
    });
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
});
