<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">
        @vite(['resources/css/style2.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">

        <section class="side flex flex-col">
            @if (request()->is('register'))
                <img class="RegisterLogo" src="{{ URL('images/register.jpg') }}" alt="Register Logo">
            @else
                <img class="LoginLogo object-cover sm:h-72 md:h-96" src="{{ URL('images/login.jpg') }}" alt="Login Logo">
            @endif
        </section>

        <div class="min-h-screen bg-blue-50 flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            {{-- {{print_r(URL(""))}} --}}
            <div class="loginform slot w-full sm:max-w-lg px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>  
        </div>
    </body>
</html>
