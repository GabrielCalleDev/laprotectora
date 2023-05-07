<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Protectora de animales en Barcelona">
    <link rel="icon" href="{{ Vite::asset('resources/img/dog.png') }}" type="image/x-icon">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ isset($title)? $title . ' | Protectora de animales' : 'Protectora de animales' }}</title>
    <!-- Styles and scripts of the application -->
    @vite('resources/scss/app.scss')
    <!-- Livewire styles -->
    @livewireStyles
    <!-- Stack styles -->
    @stack('styles')
</head>
<body class="font-poppins">
    <!-- Header -->
    @if(Request::routeIs('home'))
        @include('layouts.header-home')
    @else
        @include('layouts.header')
    @endif
    
    <!-- Main content -->
    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- Application scripts -->
    @vite('resources/js/app.js')
    <!-- Livewire Scripts -->
    @livewireScripts
    <!-- Stack scripts -->
    @stack('scripts')
</body>

</html>