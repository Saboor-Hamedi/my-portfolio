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
       <header class="bg-white shadow">
       <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
           <h1 class="text-3xl font-bold tracking-tight text-gray-900">{{$heading}}</h1>
       </div>
   </header>
    {{ $slot }}
</body>

</html>
