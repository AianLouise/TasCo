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
        @vite(['resources/css/app.css', 'resources/js/app.js'])


        <style>
            ::-webkit-scrollbar{
              display: none;
            }

            
            .bg-hero {
                background-image: url('{{ asset('images/hero-bg.png') }}');
                height: 100vh;
            }
              /* Animation for Search Bar */

            ::-webkit-scrollbar{
              display: none;
            }

            .searchbox span
            {
            position: absolute;
            left: 0%;
            padding: 15px;
            pointer-events: none;
            color: #8b8b8b;
            transition: 0.5s;
            }

            .searchbox input:valid~span ,
            .searchbox input:focus~span
            {
              color: #6698f9;
              transform: translateX(10px) translateY(-7px);
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
              color: #6698f9;
              transition: 0.5s ease-in-out;
            }

            .AppName:hover::before{
              color: #322aa3;
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



        </style>
    </head>
    <body class="antialiased">

        <main class = "relative ">
            <header class="DashTop padding-x absolute z-10 w-full">
              <nav class="sticky border-b border-slate-gray flex justify-between items-center max-container">
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
            
                <div class="w-20 py-5 font-bold text-3xl">
                    <a href="/">
                        LOGO
                    </a>
                </div>
            
                <div class='flex gap-2 text-lg leading-normal font-medium font-montserrat max-lg:hidden wide:mr-24'>
                    @auth
                        <!-- No need to display anything here since redirection is done above -->
                    @else
                        <a href="{{ route('login') }}" class="text-gray-900 hover:text-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Log In
                        </a>
                        <span>|</span>
                    @endauth
                    <a href="{{ route('register') }}" class="text-gray-900 hover:text-gray-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Register</a>
                </div>
            </nav>
            
            </header>
            <section class="xl:padding-1 bg-hero bg-cover wide:padding-r padding-b">
                <section id="home" class="w-full flex xl:flex-row flex-col justify-center min-h-screen gap-10 max-container">
                  <div class="ContentLeft1 relative xl:w-7/5 flex flex-col justify-center items-start w-full max-xl:padding-x px-9 pt-18">
                  
                    <h1 class="mt-24 sm:mt-10 text-3xl sm:text-5xl max-sm:text-[72px] max-sm:leading-[82px] font-poppins font-bold">
                        <span class="FindLocal xl:whitespace-nowrap relative z-10 pr-10">Find Local Services </span>
                        <br />
                        with <span class="AppName inline-block mt-6 sm:mt-3 z-10 pr-10"></span>
                    </h1>
                  
                  
                  <p class="font-poppins text-slate-gray text-lg leading-8 mt-6 mb-14 sm-w-sm">TasCo is your all-in-one destination for the services you require within your community.</p>
                  
                  <form>
                    <div class="ContentLeft2 searchbox relative flex">
                        <input type="text" name="search" class="flex flex-1 bg-white rounded-md justify-center items-center gap-2 px-5 py-4 sm:w-96 sm:py-3 w-full border-none font-poppins text-lg" required="required">
                        <span>Search for Services</span>
                        <button class="Srchbtn flex justify-center items-center gap-2 px-7 ml-1 py-4 border font-poppins font-semibold text-lg leading-none bg-blue rounded-md text-white border-blue">
                            Search
                        </button>
                    </div>
                  </form>
                </div>
                  <div class="ImageComp relative flex justify-center items-center xl:min-h-screen mal-xl:py-40">
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
