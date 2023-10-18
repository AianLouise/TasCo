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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
            
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
            ::-webkit-scroll{
                display: none;
            }
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Poppins', sans-serif;
                color: #303433;
                text-decoration: none;
            }

            /*-----Animation----*/
            @keyframes Bounce{
                0%{
                    transform: translateY(800px);    
                  
                }

                30%{
                    transform:  translateY(-20px);
                
                }

                50%{
                    transform: translateY(10px);
                  
                }

                80%{
                    transform: translateY(5px)
                   
                }

                100% {
                    transform: translateX(0);
                   
                }
            }

            .LoginLogo{
                animation: Bounce 1s;
            }

            .RegisterLogo{
                animation: Bounce 1s; 
            }

            @keyframes Slide{
                from{
                    transform: translateX(200px);    
                    opacity: 50%;
                }

                to{
                    transform: translateX(0);
                    opacity: 100%;
                }
            }

            .loginform{
                animation: Slide .4s ease-in;
            }

        ::placeholder{
            opacity: 100%;
            transition: 0.5s ease-in-out;
        }

        :focus::placeholder
        {
            letter-spacing: 0.2em;
            opacity: 0%;
        }


            /* ---------------------------- */


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
                /* grid-template-columns: 1fr 1fr; */
            }

            section {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            section.side {
                position: absolute;
                background: url(./img/mesh.png) no-repeat;
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

            .i-1{
                width: 100%;
                color: #8b8b8b;
                letter-spacing: 0.5px;
                padding: 14px 64px;
            }

            .custom-padding {
                padding-left: 20px; /* Adjust the padding value as needed */
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
                left: 20px;
                top: 50%;
                transform: translateY(-50%);
                color: #8b8b8b;
                transition: color   0.4s;
            }

            input:focus ~ i {
                color: #6698f9;
            }

            button.submit {
                color: #fff;
                padding: 14px 64px;
                margin: auto;
                margin-top: 1rem;
                letter-spacing: 2px;
                font-weight: 500;
                background-image: linear-gradient(to top, #506ca0, #4a6efa);
                cursor: pointer;
                transition: opacity 0.4s;
                transition: all 0.3s ease; /* Add a smooth transition effect */
            }

            button.submit:hover {
                transform: scale(1.01); /* Increase the size by 10% */
                box-shadow: 0 0 20px rgba(63, 63, 192, 0.5); /* Add a glowing effect */
                opacity: 0.8;
            }

            .slot{
                margin-left: 40rem
            }

            .login{
                width: 100%;
                color: #8b8b8b;
                letter-spacing: 0.5px;
                padding: 14px 64px;
                border: 3px solid #15a0e1;

                border: none;
                outline: none;
                border-radius: 10px;
                font-size: 1.1em;
                text-align: center
            }

            .add-pad{
                padding-left: 3rem;
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
                .slot{
                    margin-left: 0rem
                }
            }

            .welcomebtn{
                position: sticky;
                justify-content: center;
                margin-top: 1em;
                margin-left: 36em; 
                font-style: bold;
                transition: 0.5s ease-in-out;

            }

            .welcomebtn:hover{
            color: #6698f9;
            background: white;
            border: 1px solid #6698f9;
            letter-spacing: 0.1em;
            z-index: 2;
            }

        </style>
    </head>
    <body class="font-sans text-gray-900 antialiased bg-gray-100">

        <section class="side">
            @if (request()->is('register'))
            <img class="RegisterLogo" src="{{ URL('images/register.jpg') }}" alt="Register Logo">
            @else
                <img class="LoginLogo" src="{{ URL('images/login.jpg') }}" alt="Login Logo">
            @endif
        </section>

        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            {{-- {{print_r(URL(""))}} --}}
            <div class="loginform slot w-full sm:max-w-lg  px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
                {{ $slot }}
            </div>

            <div>
                <button class="welcomebtn loginform px-5 py-4 bg-blue text-white text-lg shadow-md sm:rounded-lg">
                    <a href="{{ route('welcome') }}" style="text-decoration: none; color: inherit;">Back</a>
                </button>                
            </div>  
        </div>
    </body>
</html>
