Dropzone.options.imageInsertionUpload = {
    url:  urlPrincipal + 'administracio/uploadFile',
    success: function(file, response){
        startGallery();
    },
    dictDefaultMessage: 'Arrossegui aquí les fotos a pujar'
};

Dropzone.options.imageSelectionUpload = {
    url:  urlPrincipal + 'administracio/uploadFile',
    success: function(file, response){
        startGallery();
    },
    dictDefaultMessage: 'Arrossegui aquí les fotos a pujar'
};

Dropzone.options.resourceSelectionUpload = {
    url:  urlPrincipal + 'administracio/uploadFile',
    success: function(file, response){
        startResourceList();
    },
    dictDefaultMessage: 'Arrossegui aquí els recursos a pujar'
};