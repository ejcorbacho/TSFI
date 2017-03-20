Dropzone.options.dropzoneUpload = {
    url: '/tsfi/public/administracio/uploadFile',
    success: function(file, response){
        console.log(response);
    }
};
