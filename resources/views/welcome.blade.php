<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        <style>
            .bg-hero {
                background-image: url('{{ asset('images/hero-bg.png') }}');
                height: 100vh;
            }
        </style>
    </head>
    <body class="antialiased">

        <main class = "relative ">
            <header class="padding-x absolute z-10 w-full">
                <nav class="sticky border-b border-slate-gray flex justify-between items-center max-container">
                  <div class="w-20 py-5 font-bold text-3xl">
                    <a href="/">
                      LOGO
                    </a>
                  </div>
                    
                <div class='flex gap-2 text-lg leading-normal font-medium font-montserrat max-lg:hidden wide:mr-24'>
                  <a href="{{ route('login') }}">Log In</a>
                  <span>|</span>
                  <a href="{{ route('register') }}">Register</a>
                </div>
                </nav>
            </header>
            <section class="xl:padding-1 bg-hero bg-cover wide:padding-r padding-b">
                <section id="home" class="w-full flex xl:flex-row flex-col justify-center min-h-screen gap-10 max-container">
                  <div class="relative xl:w-7/5 flex flex-col justify-center items-start w-full max-xl:padding-x px-9 pt-18">
                  
                  <h1 class="mt-10 font-poppins text-5xl max-sm:text-[72px] max-sm:leading-[82px] font-bold">
                    <span class="xl:whitespace-nowrap relative z-10 pr-10">Find Local Services </span>
                    <br />
                    with <span class="relative text-blue inline-block mt-3 z-10 pr-10">[App Name]</span>
                  </h1>
                  
                  <p class="font-poppins text-slate-gray text-lg leading-8 mt-6 mb-14 sm-w-sm">[App Name] is your all-in-one destination for the services you require within your community.</p>
                  
                  <form>
                  <div class="relative flex">
                    <input type="text" name="search" placeholder="Search for job" class="flex flex-1 bg-white rounded-md justify-center items-center gap-2 px-5 py-4 border-none  font-poppins  text-lg"/>
                    <button class="flex justify-center items-center gap-2 px-7 ml-1 py-4 border font-poppins font-semibold text-lg leading-none bg-blue rounded-md text-white border-blue">
                      Search
                  </button>
                  </div>
                  </form>
                </div>
                  <div class="relative flex justify-center items-center xl:min-h-screen mal-xl:py-40">
                    <img 
                      src={{ URL('images/laptop.png') }}
                      alt="laptop"
                      width={800}
                      height={800}
                      class="object-contain relative z-10"
                    />
                  </div>
                
              </section>
            </section>
            
          </main>
        
        
    </body>
</html>
