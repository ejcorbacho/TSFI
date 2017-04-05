Dropzone.options.imageInsertionUpload = {
    url: '/TSFI/public/administracio/uploadFile',
    success: function(file, response){
        startGallery();
    },
    dictDefaultMessage: 'Arrossegui aquí les fotos a pujar'
};

Dropzone.options.imageSelectionUpload = {
    url: '/TSFI/public/administracio/uploadFile',
    success: function(file, response){
        startGallery();
    },
    dictDefaultMessage: 'Arrossegui aquí les fotos a pujar'
};

Dropzone.options.resourceSelectionUpload = {
    url: '/TSFI/public/administracio/uploadFile',
    success: function(file, response){
        startResourceList();
    },
    dictDefaultMessage: 'Arrossegui aquí els recursos a pujar'
};