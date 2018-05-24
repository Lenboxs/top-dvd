<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield( 'title', 'Top DVD' )</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="{{ asset('fonts/EricaOne-Regular.ttf') }}" rel="stylesheet">
</head>
<body>
    <div id="app">

		@includeif( 'section.nav' )

        @yield( 'template' )
    </div>

    <!-- Scripts -->
    <script src="{{ asset( 'js/app.js' ) }}"></script>
</body>
</html>
