Dropzone.options.dropzoneUpload = {
    url: '/TSFI/public/administracio/uploadFile',
    success: function(file, response){
        startGallery();
    }
};
