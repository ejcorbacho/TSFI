var data = {};
var paginationElements = 9;
var selected = [];

$(document).ready(function() {
    startGallery();
    $("#insertImages").click( function () {
        var images = "";
        /*
        $( "div.insertion ul.image_picker_selector li div.selected" ).each(function() {
            images += $( this ).html();
            $( this ).toggleClass('selected');
        });*/
        selected.forEach( function ( image ) {
            images += image;
        });
        var regEx = new RegExp('>', 'g');
        images = images.replace(regEx, 'width="200">');

        tinymce.get("contingut").execCommand('mceInsertContent', false, images);
        $('#imageInsertionModal').modal('hide');
        selected = [];
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
        function( imageData ) {
            data = imageData;
            initPagination( '#imageInsertionGallery', data.length );
            initPagination( '#imageSelectionGallery', data.length );
            paginate( '#imageInsertionSelector', 0 );
            paginate( '#imageSelectionSelector', 0 );
        }, function ( error ) {
            console.log( error );
        }
    );
}

function paginate ( selector, start ) {
    $( selector ).empty();
    start *= paginationElements;
    var i = start;
    while ( i < start+paginationElements && i < data.length) {
        var image = data[i];
        $( selector ).append('<option data-img-src="' + image.url + '" data-img-alt="' + image.alt + '" value="' + image.id + '">' + image.alt + '</option>');
        ++i;
    }
    $( selector ).imagepicker({
        clicked: function( select, option ) {
            if ( $(this)[0].id.indexOf("nsertion") >= 0 ) {
                var clickedOption = option.currentTarget.innerHTML;
                if (!selected.includes(clickedOption)) {
                    selected.push(clickedOption);
                } else {
                    selected.pop(clickedOption);
                }
            }
        }
    });
}

function initPagination ( selector, total ) {
    $( selector ).bootpag({
        total: Math.ceil(total/paginationElements),
        maxVisible: 5,
        leaps: true,
        firstLastUse: true,
        first: '←',
        last: '→',
        wrapClass: 'pagination',
        activeClass: 'active',
        disabledClass: 'disabled',
        nextClass: 'next',
        prevClass: 'prev',
        lastClass: 'last',
        firstClass: 'first'
    }).on( "page", function ( event, num ) {
        var selector = "#" + $( this )[0].id.replace( "Gallery", "Selector" );
        paginate( selector, num-1 );
    });
}

function getDataOverAJAX(route, data) {
    return $.ajax({
        type: 'GET',
        url: '/TSFI/public/ajax/uploads/' + route,
        data: {data: data}
    });
}
