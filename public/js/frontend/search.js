

function getDataOverAJAX( route, data) {
    return $.ajax({
        type: 'GET',
        url: '/TSFI/public/ajax/' + route,
        data: {data: data}
    });
}