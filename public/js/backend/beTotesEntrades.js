$(document).ready(function() {
    
    $('#taulaDePosts').DataTable({
        "language": {
            "url": "/TSFI/public/js/backend/dataTableCatalan.json"
        },
        "columns": [
            { "orderable": false },
            { },
            { },
            { },
            { },
            { "orderable": false }
        ],
        "order": [[1, 'asc']]
    });
    
    
    
    
});