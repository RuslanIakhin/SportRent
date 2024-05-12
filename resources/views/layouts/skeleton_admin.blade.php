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
    
    @include('partials.header_admin')
    
    <div id="admin-container">
        {{-- <div class="container"> --}}
            @yield('body')
            <p class="position-absolute bottom-0 small_text">2023 ©SportRent. Все права защищены!</p>
        {{-- </div> --}}
    </div>
    
    <script src="{{ asset('/js/jquery-3.7.0.min.js') }}"></script>
    <script src="{{ asset('/js/main.js') }}"></script>
    {{-- <script src="/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script> --}}
    <script src="{{ asset('/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js') }}" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>