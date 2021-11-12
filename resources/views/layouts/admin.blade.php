<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="csrf-token" content="_token">

    <title>{{ config('app.name') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ asset('js/jquery.js') }}" type="text/javascript"></script>
    @stack('after-styles')
</head>

<body class="hold-transition login-page">
    @yield('content')
    @stack('before-scripts')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/jquery.form.min.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('plugins/jsvalidation/jsvalidation.js')}}"></script>
    <script src="{{ asset('js/AdminLTE.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/myfunction.js') }}" type="text/javascript"></script>
    @stack('after-scripts')
    @yield('pagescript')
</body>

</html>
