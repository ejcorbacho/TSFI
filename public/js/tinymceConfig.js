tinyMCE.init({
    selector: '#contingut',
    height: 500,
    theme: 'modern',
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools codesample toc'
    ],
    toolbar1: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
    //toolbar2: 'print preview media | forecolor backcolor emoticons | codesample',
    toolbar2: 'print preview media | forecolor backcolor emoticons',
    image_advtab: true,
    templates: [
        { title: 'Test template 1', content: 'Test 1' },
        { title: 'Test template 2', content: 'Test 2' }
    ],
    content_css: [
        '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
        '//www.tinymce.com/css/codepen.min.css',
        '/TSFI/public/css/backend/resources.css'
    ],
    language: getLang(),
    setup: function(ed) {
        ed.on('keyup', function(e) {
            validarFormulario();
        });
        ed.on('Init', function(e) {
            validarFormulario();
        });
        ed.on('init', function(e) {
            validarContenido();
        });
    }
});

function getEditorContent() {
    console.log(tinyMCE.get('editor').getContent());
}

function getLang() {
    if (navigator.languages != undefined) {
        var lang = navigator.languages[0];
        if (lang.indexOf('-') != -1) {
            return lang.split('-')[0];
        } else {
          return lang;
        }
    } else
        return navigator.language;
}

function getStats(id) {
    var body = tinymce.get(id).getBody();
    var text = tinymce.trim(body.innerText || body.textContent);

    return {
        chars: text.length,
        words: text.split(/[\w\u2019\'-]+/).length
    };
}
