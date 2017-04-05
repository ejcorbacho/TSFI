

function getDataOverAJAX( route, data) {
    return $.ajax({
        type: 'GET',
        url: urlPrincipal + 'ajax/' + route,
        data: {data: data}
    });
}