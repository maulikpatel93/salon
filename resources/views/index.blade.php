<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="{{ asset('css/react-bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('react/css/font-awsome.css') }}" rel="stylesheet">
        {{-- <link href="{{ asset('react/css/style.css') }}" rel="stylesheet"> --}}
        <link href="{{ asset('react/css/custom.css') }}" rel="stylesheet">
    </head>
    <body>
        <div id="root"></div>
        <script src="{{ mix('src/main.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.js') }}" type="text/javascript"></script>
    </body>
</html>
