<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://kit.fontawesome.com/c406f80329.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        html,body {
            height:100%;
        }
        #full-pic {
            background: url("{{asset('img/prayer-sm.jpg')}}") no-repeat center center fixed;
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items:center;
            height:100%;
            width:100%;
        }
    </style>
</head>
<body>
<div id="full-pic">
    <div class="text-center">
        <h1 class="display-4">Your Personal Prayer Request Manager</h1>
        <a class="btn btn-dark btn-lg" href="{{ route('login') }}">Login</a>
        <a class="btn btn-dark btn-lg ml-2" href="{{ route('register') }}">Register</a>
    </div>
</div>
</body>
</html>
