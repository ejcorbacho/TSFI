<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>{{ trans('http.404.title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        * {
            line-height: 1.2;
            margin: 0;
        }
        html {
            color: #888;
            display: table;
            font-family: sans-serif;
            height: 100%;
            text-align: center;
            width: 100%;
        }
        body {
            display: table-cell;
            vertical-align: middle;
            margin: 2em auto;
        }
        h1 {
            color: #555;
            font-size: 80px;
            font-weight: 400;
        }
        p {
            margin: 0 auto;
            padding-top:10px;
            width: 200px;
            font-size: 140px;
        }
        .textp {
            margin: 0 auto;
            color: #555;
            padding-top:10px;
            width: 500px;
            font-size: 20px;
        }
        @media only screen and (max-width: 280px) {
            body, p {
                width: 95%;
            }
            h1 {
                font-size: 1.5em;
                margin: 0 0 0.3em;
            }
        }
    </style>
</head>
<body>
<h1>{{ trans('Ups!') }}</h1>
<p>{{ trans('404') }}</p>
<p class="textp">La pàgina sol·licitada no es pot trobar en el nostre servidor!</p>
<script src="{{asset('js/globales.js')}}"></script>
<script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>
<script>
    $(document).ready(function () {
        window.setTimeout( function(){
            window.location = urlPrincipal;
        }, 3000 );
    });
</script>
</body>
</html