<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    @vite(['resources/css/style2.css', 'resources/js/app.js'])
    <style>
        /* ... Your existing styles ... */

        /* Add Tailwind CSS classes here */

        /* Margins for responsive design */
        @media (max-width: 780px) {
            body {
                @apply flex justify-center items-center bg-blue-200;
                /* Adjust background color */
            }

            .side {
                @apply hidden;
            }

            .slot {
                @apply w-full md:w-auto ml-0 mr-0 md:ml-6 rounded-lg;
                /* Adjust the rounded corners and spacing */
            }
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased">

    <div class="min-h-screen flex flex-col md:flex-row justify-center items-center pt-6 sm:pt-0">

        <section class="side mr-40 hidden sm:block">
            @if (request()->is('register'))
                <img class="RegisterLogo w-96 h-96" src="{{ URL('images/register.jpg') }}" alt="Register Logo">
            @else
                <img class="LoginLogo w-96 h-96" src="{{ URL('images/login.jpg') }}" alt="Login Logo">
            @endif
        </section>
    
        <div class="loginform slot w-full sm:max-w-lg px-2 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    
    </div>
    
    

</body>

</html>
