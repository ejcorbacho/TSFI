Dropzone.options.imageInsertionUpload = {
    url: '/tsfi/public/administracio/uploadFile',
    success: function(file, response){
        startGallery();
    },
    dictDefaultMessage: 'Arrossegui aquí les fotos a pujar'
};

Dropzone.options.imageSelectionUpload = {
    url: '/tsfi/public/administracio/uploadFile',
    success: function(file, response){
        startGallery();
    },
    dictDefaultMessage: 'Arrossegui aquí les fotos a pujar'
};