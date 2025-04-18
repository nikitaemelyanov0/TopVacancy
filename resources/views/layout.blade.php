<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{secure_asset('assets/css/app.css')}}">
    <link rel="icon" href="favicon.ico">
</head>
<body>
    @guest
        @include('components.guest_header')
    @endguest

    @auth
        @include('components.auth_header')
    @endauth
    
    @yield('content')

    @include('components.footer')
    
    <script src="{{secure_asset('assets/js/app.js')}}"></script>
</body>
</html>
