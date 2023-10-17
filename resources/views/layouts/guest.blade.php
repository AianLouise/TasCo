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
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
                color: #303433;
                text-decoration: none;
            }

            span {
                color: #15a0e1;
                font-weight: 500;
            }

            header{
                width: 100%;
                height: 75px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 30px 10%;
            }

            .logo{
                display: flex;
                gap: .5rem;
            }

            .logo img{
                height: 2.5rem;
                width: 2.5rem;
            }

            .logo{
                font-size: 30px;
                font-weight: bold;
                text-transform: uppercase;
                display: flex;
                gap: .5rem;
            }
                
            .login-btn{
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
                grid-template-columns: 1fr 1fr;
            }

            section {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            section.side {
                background: url(./img/mesh.png) no-repeat;
                background-size: 100% 102%;
            }

            .side img {
                width: 40%;
                max-width: 40%;
            }

            .form-container {
                max-width: 450px;
                padding: 24px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .title {
                text-transform: uppercase;
                font-size: 3em;
                font-weight: bold;
                text-align: center;
                letter-spacing: 1px;
                margin-bottom: 10px;
            }

            .login-form {
                width: 100%;
                display: flex;
                flex-direction: column;
            }

            .form-control {
                width: 100%;
                position: relative;
                margin-bottom: 24px;
            }

            input,
            button {
                border: none;
                outline: none;
                border-radius: 10px;
                font-size: 1.1em;
            }

            input {
                width: 100%;
                color: #8b8b8b;
                letter-spacing: 0.5px;
                padding: 14px 64px;
                border: 3px solid #15a0e1;
            }

            input ~ i {
                position: absolute;
                left: 25px;
                top: 50%;
                transform: translateY(-50%);
                color: #8b8b8b;
                transition: color   0.4s;
            }

            input:focus ~ i {
                color: #15a0e1;
            }

            button.submit {
                color: #fff;
                padding: 14px 64px;
                margin: 32px auto;
                letter-spacing: 2px;
                font-weight: 500;
                background-image: linear-gradient(to top, #A0DDFF, #15a0e1);
                cursor: pointer;
                transition: opacity 0.4s;
            }

            button.submit:hover {
                opacity: 0.9;
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

            }
        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
            <div>
                <a href="/">
                    <img src="./images/login.jpg" alt="">
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg" style="margin-left: 50rem">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
