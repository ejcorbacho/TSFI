$(function () {
    var map;
    function initMap() {
        var locationArray = data.localizacion.split(',');
        var location = {lat: parseFloat(locationArray[0]), lng: parseFloat(locationArray[1])};

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: location
        });
        var marker = new google.maps.Marker({
            position: location,
            map: map,
            title: data.titulo
        });
    }

    if (data.localizacion != null) {
        google.maps.event.addDomListener(window, 'load', initMap);

        google.maps.event.addDomListener(window, "resize", function () {
            var center = map.getCenter();
            google.maps.event.trigger(map, "resize");
            map.setCenter(center);
        });
    }
});