<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-gray-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title ?? 'Porfolio' }}</title>
    <!-- Fonts -->
    @vite('resources/css/app.css')
</head>

<body class="h-full">
    <x-navbar></x-navbar>
    {{ $slot }}

    <x-footer></x-footer>
</body>

</html>
