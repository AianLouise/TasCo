<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Page title -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- External stylesheets and scripts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">
    @vite(['resources/css/style2.css', 'resources/js/app.js'])

    <!-- Local stylesheet -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        ::-webkit-scroll {
            display: none;
        }

        /*-----Animation----*/
        @keyframes Bounce {
            0% {
                transform: translateY(800px);

            }

            30% {
                transform: translateY(-20px);

            }

            50% {
                transform: translateY(10px);

            }

            80% {
                transform: translateY(5px)
            }

            100% {
                transform: translateX(0);

            }
        }

        .LoginLogo {
            animation: Bounce 1s;
        }

        .RegisterLogo {
            animation: Bounce 1s;
        }

        @keyframes Slide {
            from {
                transform: translateX(200px);
                opacity: 50%;
            }

            to {
                transform: translateX(0);
                opacity: 100%;
            }
        }

        .loginform {
            animation: Slide .4s ease-in;
        }

        ::placeholder {
            opacity: 100%;
            transition: 0.5s ease-in-out;
        }

        :focus::placeholder {
            letter-spacing: 0.2em;
            opacity: 0%;
        }


        /* ---------------------------- */


        span {
            color: #15a0e1;
            font-weight: 500;
        }

        header {
            width: 100%;
            height: 75px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 30px 10%;
        }

        .logo {
            display: flex;
            gap: .5rem;
        }

        .logo img {
            height: 2.5rem;
            width: 2.5rem;
        }

        .logo {
            font-size: 30px;
            font-weight: bold;
            text-transform: uppercase;
            display: flex;
            gap: .5rem;
        }

        .login-btn {
            position: relative;
            padding: 4px 20px;
            color: #15a0e1;
            margin: 32px auto;
            background-color: none;
            font-weight: 500;
            border: 2PX solid #15a0e1;
        }

        .login-btn:hover {
            color: #624CAB;
            border: 2px solid #624CAB;
        }

        body {
            min-height: 100vh;
            width: 100%;
            display: grid;
            /* grid-template-columns: 1fr 1fr; */
        }

        section {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        section.side {
            position: absolute;
            background-size: 100% 102%;
            margin-left: 17em;
            margin-top: 13rem
        }

        .side img {
            width: 25rem;
            max-width: 150rem;
        }

        .form-container {
            max-width: 450px;
            padding: 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .login-form {
            width: 100%;
            display: flex;
            flex-direction: column;
        }


        /* icon color */
        input~i {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: #8b8b8b;
            transition: color red 0.4s;
        }

        /* icon color when clicked */
        input:focus~i {
            color: #4299e1
        }


        .slot {
            margin-left: 40rem
        }

        /* ----  Responsiveness   ----  */
        @media (max-width: 780px) {

            body {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .side {
                display: none;
            }

            .slot {
                margin-left: 0rem
            }
        }

        /* Put inside style file */

        .bg-transparent {
            background-color: transparent;
        }

        .px-16 {
            padding-left: 4rem;
            /* 64px */
            padding-right: 4rem;
            /* 64px */
        }

        .mt-5 {
            margin-top: 1.25rem;
            /* 20px */
        }

        .pl-12 {
            padding-left: 3rem;
        }

        .mb-5 {
            margin-bottom: 1.25rem;
            /* 20px */
        }

        .text-5xl {
            font-size: 3rem;
            /* 48px */
            line-height: 1;
        }

        .title {
            letter-spacing: 1px;
        }
    </style>
</head>

<body class="font-sans text-gray-900 antialiased">

    <!-- Side section with logo -->
    <section class="side">
        @if (request()->is('register'))
            <img class="RegisterLogo" src="{{ URL('images/register.jpg') }}" alt="Register Logo">
        @else
            <img class="LoginLogo" src="{{ URL('images/login.jpg') }}" alt="Login Logo">
        @endif
    </section>

    <!-- Main content container -->
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">

        <!-- Login form container -->
        <div class="loginform slot w-full sm:max-w-lg px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>

    </div>

</body>

</html>
