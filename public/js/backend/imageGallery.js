$(document).ready(function() {
    startGallery    ();

    $("#insertImages").click( function () {
        var images = "";
        $( "div.insertion ul.image_picker_selector li div.selected" ).each(function() {
            images += $( this ).html();
            $( this ).toggleClass('selected');
        });
        var regEx = new RegExp('>', 'g');
        images = images.replace(regEx, 'width="200">');

        tinymce.get("contingut").execCommand('mceInsertContent', false, images);
        $('#imageInsertionModal').modal('hide');
    });

    $("#setImage").click( function () {
        var image = "";
        $( "div.selection ul.image_picker_selector li div.selected" ).each(function() {
            image = $( this ).html();
            $( this ).toggleClass('selected');
        });
        var regEx = new RegExp('>', 'g');
        image = image.replace(regEx, 'width="200">');

        $('#mainImage').html(image);
        $('#mainImageInput').val($("#imageSelectionSelector").data('picker').select[0].selectedOptions[0].value);
        $('#imageSelectionModal').modal('hide');
    });
});

function startGallery() {
    getDataOverAJAX( 'getImageList' ).then(
        function( data ) {
            fillImageGallery( '#imageInsertionSelector', data );
            fillImageGallery( '#imageSelectionSelector', data );
        }, function ( error ) {
            console.log( error );
        }
    );
}

function fillImageGallery( id, data ) {
    $( id ).empty();
    data.forEach( function( image ) {
        $( id ).append('<option data-img-src="' + image.url + '" data-img-alt="' + image.alt + '" value="' + image.id + '">' + image.alt + '</option>');
    });
    $( id ).imagepicker();
}

function getDataOverAJAX(route, data) {
    return $.ajax({
        type: 'GET',
        url: '/TSFI/public/ajax/uploads/' + route,
        data: {data: data}
    });
}
