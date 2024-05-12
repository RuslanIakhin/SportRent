<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>@yield('title')</title>

    <link rel="icon" href="{{ asset('/img/logo/logo_mobile.png') }}">
    <link href="{{ asset('/css/brandcolor.min.css') }}" rel="stylesheet" crossorigin="anonymous">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
</head>
<body>

    @include('partials.header')

    @yield('body')

    @include('partials.footer')

    
    <script src="{{ asset('/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('/js/jquery.maskedinput.min.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
    {{-- <script src="/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>