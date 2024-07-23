<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>{{ $title ?? 'Porfolio' }}</title> <!-- Fonts -->
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="{{ asset('css/tag.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/jquery.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/toggle.css') }}">


</head>

<body class="h-full">
    <x-navbar></x-navbar>

    {{ $slot }}

    <script src="{{ asset('js/dark-mode.js') }}"></script>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/tag.js') }}"></script>
   
    <script>
        $('input[name="tag"]').amsifySuggestags();
    </script>

</body>

</html>
