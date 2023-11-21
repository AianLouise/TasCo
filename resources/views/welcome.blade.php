<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Welcome to TasCo</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">
        @vite(['resources/css/style2.css', 'resources/js/app.js'])

        <style>

            /*
            .bg-hero {
                background-image: url('{{ asset('images/hero-bg.png') }}');
                height: 100vh;
            }
            */ 
            
            /* Animation for Search Bar */

            .searchbox span{
            position: absolute;
            left: 0%;
            padding: 10px 15px;
            pointer-events: none;
            color: #8b8b8b;
            transition: 0.5s;
            }

            .searchbox input:valid~span ,
            .searchbox input:focus~span
            {
              color: #6698f9;
              transform: translateX(10px) translateY(-10px);
              font-size: 0.8em;
              padding: 0 10px;
              background: white;
              border: 1px solid #6698f9;
              border-radius: 10px;
              letter-spacing: 0.2em;
            }

            /* Application Name Animation */

            .AppName::before{
              content: "TasCo";
              position: relative;
              color: rgb(37 99 235);;
              transition: 0.5s ease-in-out;
            }

            .AppName:hover::before{
              color: rgb(37 99 235);
              letter-spacing: 0.2em;
            }

            /* Animation for Interface */

            @keyframes Popdown{
              from{
                transform: translateY(-50px)
              }
              
              to{
                transform: translateY(0px)
              }

            }

            @keyframes Popup{
              0%{
                transform: translateY(200px)
              }
              
              50%{
                transform: translateY(-20px)
              }

              100%{
                transform: translateY(0px)
              }

            }

            .DashTop{
                animation: Popdown 1s;
            }

            .ImageComp{
              animation: Popup 1s;
            }
            
            .ImageComp img{
              display: block;
              width: 100%;
              transition: 0.5s ease-in-out;
            }

            .ImageComp img:hover{
              transform: scale(1.3);
              z-index: 2;
            }

            @keyframes PopLeft{
              from{
                transform: translateX(-200px);
              }
              to{
                transform:  translateX(0px);
              }
            }

          .ContentLeft1{
            animation: PopLeft 1s;
          }

          .ContentLeft2{
            animation: PopLeft 1s;
          }

          .Srchbtn{
            background: #6698f9;
            color: white;
            transition: 0.3s ease-in-out;
          }

          .Srchbtn:hover{
            color: #6698f9;
            background: white;
            border: 1px solid #6698f9;
            letter-spacing: 0.1em;
          }

          .mt-60{
            margin-top: 15rem; /* 240px */
          }

          .mt-52{
            margin-top: 13rem; /* 240px */
          }

          .mt-32{
            margin-top: 8rem; /* 128px */
          }

          .px-32{
            padding-left: 8rem; /* 128px */
            padding-right: 8rem; /* 128px */
          }
        </style>
    </head>
    
    <body class="antialiased">
    
    <section>
    <div class="shadow-lg">
        <div class="max-w-6xl px-4 mx-auto">
            <nav class="flex items-center justify-between py-4">
                  
                @auth
                    @if(Auth::user()->role === 'admin')
                        <script>
                            window.location.href = "{{ route('admin.dashboard') }}";
                        </script>
                    @elseif(Auth::user()->role === 'worker')
                        <script>
                            window.location.href = "{{ route('worker.dashboard') }}";
                        </script>
                    @elseif(Auth::user()->role === 'user')
                        <script>
                            window.location.href = "{{ route('user.dashboard') }}";
                        </script>
                    @endif
                @endauth
            
                <!-- Start: Logo -->
                <a href="" class="text-3xl font-bold leading-none">TasCo</a>
                <!-- End: Logo -->
                
                <div class="flex justify-between lg:space-x-2">
                    
                      @auth
                          <!-- No need to display anything here since redirection is done above -->
                      @else
                          <a href="{{ route('login') }}" class="inline-block text-gray-900 hover:text-blue-500 text-sm font-medium">Log In</a>
                          <span class="text-sm font-medium px-1 text-black">/</span>
                      @endauth
                      <a href="{{ route('register') }}" class="inline-block text-gray-900 hover:text-blue-500 text-sm font-medium ">Register</a>
                  
                </div>

              </div>
            </nav>
        </div>
    </div>

    <!-- Start: Hero Section-->

          <div class="relative overflow-hidden min-h-screen bg-blue-50">
            <div class="max-w-6xl mx-auto">
              <div class="relative pb-8 sm:pb-16 md:pb-20 lg:max-w-2xl lg:full lg:pb-28 xl:pb-32">
                <div class="px-4 mx-auto mt-10 max-w-7xl sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-4 xl:mt-28">
                  <div class="max-w-lg mx-auto mb-8 text-center lg:max-w-md lg:mx-0 lg:text-left">

                    <h1 class="mt-16 sm:mt-16 text-6xl sm:text-5xl max-sm:text-[72px] max-sm:leading-[82px] font-bold">
                      <span class="FindLocal xl:whitespace-nowrap relative  z-10 pr-10">Find Local Services </span>
                      <br />
                      with <span class="AppName inline-block sm:mt-3 z-10"></span>
                    </h1>
                    <p
                        class="mt-6 tracking-wide text-gray-600 dark:text-gray-400 sm:mt-5 sm:text-md sm:max-w-xl sm:mx-auto md:mt-5">
                        TasCo is your all-in-one destination for the services you require within your community.
                    </p>

                    <div class="flex flex-wrap mb-6 -mx-2 "></div>
                      <form>
                                    <div class="ContentLeft2 searchbox relative flex">
                                      
                                        <input type="text" name="search" class="flex flex-1 bg-white rounded-md justify-center items-center border-blue-500 gap-2 px-5 py-4 sm:w-96 sm:py-3 w-full border text-lg">
                                        <span>Search for Services</span>              
                                        
                                        <button class="absolute text-white end-2.5 bottom-2.5 bg-blue-500 hover:bg-blue-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">    
                                        <i class="ri-search-line text-white mr-1"></i>Search
                                        </button>
                                    </div>
                      </form>
                    </div>
            </div>
          </div>

      

          <div class="flex mt-12 md:justify-end md:w-1/2 lg:absolute lg:inset-y-0 lg:right-0 lg:px-32">
            <img src={{ URL('images/hero.png') }} alt="" class="object-cover sm:h-72 md:h-96"> 
          </div>
          
        </section>      
    </body>
</html>
