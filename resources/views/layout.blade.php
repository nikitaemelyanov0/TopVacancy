<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources\css\app.css')
    <link rel="icon" href="favicon.ico">
</head>
<body>

    @include('components.guest_header')

    @yield('content')

    @include('components.footer')
    
</body>
</html>