$(document).ready(function() {
    startGallery();

    $("#insertImages").click( function () {
        var images = "";
        $( "ul.image_picker_selector li div.selected" ).each(function() {
            images += $( this ).html();
            $( this ).toggleClass('selected');
        });
        var regEx = new RegExp('>', 'g');
        images = images.replace(regEx, 'width="200">');

        tinymce.get("contingut").execCommand('mceInsertContent', false, images);
        $('#imageModal').modal('hide');
    });
});

function startGallery() {
    getDataOverAJAX( 'getImageList' ).then(
        function( data ) {
            fillImageGallery( data );
        }, function ( error ) {
            console.log( error );
        }
    );
}

function fillImageGallery( data ) {
    $("#imageSelector").empty();
    data.forEach( function( image ) {
        $("#imageSelector").append('<option data-img-src="' + image.url + '" data-img-alt="' + image.alt + '" value="' + image.id + '">' + image.alt + '</option>');
    });
    $("#imageSelector").imagepicker();
}

function getDataOverAJAX(route, data) {
    return $.ajax({
        type: 'GET',
        url: '/tsfi/public/ajax/uploads/' + route,
        data: {data: data}
    });
}
