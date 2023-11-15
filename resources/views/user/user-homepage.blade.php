<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to TasCo</title>

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">
        @vite(['resources/css/style2.css', 'resources/js/app.js'])

        <style>
            
            .max-w-7xl{
                max-width: 80rem; /* 1280px */
            }

            .inset-0{
                inset: 0px;
            }

            .space-x-2{
                margin-left: 0.625rem; /* 10px */
            }

            .space-y-6{
                margin-top: 1.5rem; /* 24px */
            }
            .grid-cols-2{
                grid-template-columns: repeat(2, minmax(0, 1fr));
            }

            .pt-36{
                padding-top: 9rem; /* 144px */
            }

            .text-4xl{
                font-size: 2.25rem; /* 36px */
                line-height: 2.5rem; /* 40px */
            }
            .z-10{
                z-index: 10;    
            }

            .mt-6{
                margin-top: 1.5rem; /* 24px */
            }
            .m-auto{
                margin-top: auto;
            }
        </style>


    </head>
    
    <body>
        <header>
            <nav class="absolute z-10 w-full border-b ">
                <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
                    <div class="relative flex flex-wrap items-center justify-between gap-6 py-3 md:gap-0 md:py-4">
                        <div class="relative z-20 flex w-full justify-between md:px-0 lg:w-max">
                            <a href="#" aria-label="logo" class="flex items-center space-x-2">                               
                                <span class="text-2xl font-bold">TasCo</span>
                            </a>
                        </div>                                      
                    </div>
                </div>
            </nav>
        </header>

        <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
            <div class="relative pt-36 ml-auto">
                <div class="lg:w-2/3 text-center mx-auto">
                    <h1 class="text-gray-900 font-bold text-5xl md:text-6xl xl:text-7xl">Welcome to <span class="text-blue-500">Tasco.</span></h1>
                    <p class="mt-8 text-gray-700">Discover a new level of convenience and reliability with Tasco, your trusted local service management partner. At Tasco, we take pride in offering a wide range of services to meet your needs. Our team of skilled professionals is committed to providing exceptional service with a personal touch, ensuring your satisfaction every step of the way.</p>
                </div>      
            </div>
        </div>
    


    <div class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
    <div class="relative">
      <div class="mt-6 m-auto space-y-6 md:w-8/12 lg:w-7/12">
        <h1 class="text-center text-4xl font-bold text-gray-800  md:text-5xl">Browse</h1>
        <p class="text-center text-xl text-gray-600 dark:text-gray-300">
          See what the community offers
        </p>
        
      </div>
    </div>
</div>


    </body>
</html>
