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
                        
                <ul class="ml-auto flex items-center">            
                <li class="dropdown ml-3">
                    <button type="button" class="dropdown-toggle flex items-center">
                        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                    </button>

                 <!--   
                    <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
                        <li>
                            <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"><i class="ri-user-line mr-1"></i>Profile</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"><i class="ri-settings-2-line mr-1"></i>Settings</a>
                        </li>
                        <li>
                            <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"><i class="ri-logout-box-r-line mr-1"></i>Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        -->
                    </div>
                </div>
            </nav>
        </header>

        <!-- Start: Featured Content Section -->
        <section class="max-w-7xl mx-auto px-6 md:px-12 xl:px-6">
            <div class="relative pt-36 ml-auto">
                <div class="lg:w-2/3 text-center mx-auto">
                    <h1 class="text-gray-900 font-bold text-5xl md:text-6xl xl:text-7xl">Welcome to <span class="text-blue-500">Tasco.</span></h1>
                    <p class=" mt-6 text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">Discover a new level of convenience and reliability with Tasco, your trusted local service management partner. At Tasco, we take pride in offering a wide range of services to meet your needs.</p>
                </div>      
            </div>
        </section>
        <!-- End: Featured Content Section-->

        <!-- Start: Browse Section -->
        <section class="relative pt-20 pb-8 md:pt-16 md:pb-0 bg-white">

            <div class="container xl:max-w-6xl mx-auto px-4">
                
                <!-- Start: Heading-->
                <div class="text-center mx-auto mb-12 lg:px-20">
                    <h2 class=" leading-normal mb-2 text-4xl font-bold text-black">Browse</h2>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="margin: 0 auto;height: 35px;" xml:space="preserve">
                        <circle cx="50.1" cy="30.4" r="5" class="stroke-primary" style="fill: transparent;stroke-width: 2;stroke-miterlimit: 10;"></circle>
                        <line x1="55.1" y1="30.4" x2="100" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                        <line x1="45.1" y1="30.4" x2="0" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                    </svg>
                    <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">See what the community offers</p>
                </div>
                <!-- End: Heading -->
            </div>
        </section>
        <!-- End: Browse Section -->

        <!-- Start: Workers Section -->
        <section class="relative pt-20 pb-8 md:pt-16 md:pb-0 bg-white">

            <div class="container xl:max-w-6xl mx-auto px-4">
                
            <!-- Start: Heading-->
            <div class="text-center mx-auto mb-12 lg:px-20">
                    <h2 class=" leading-normal mb-2 text-4xl font-bold text-black">Available Worker</h2>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="margin: 0 auto;height: 35px;" xml:space="preserve">
                        <circle cx="50.1" cy="30.4" r="5" class="stroke-primary" style="fill: transparent;stroke-width: 2;stroke-miterlimit: 10;"></circle>
                        <line x1="55.1" y1="30.4" x2="100" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                        <line x1="45.1" y1="30.4" x2="0" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                    </svg>
                    <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">With their services</p>
                </div>
                <!-- End: Heading -->

             <!-- Start: Worker Section Row -->

             <div class="flex flex-wrap flex-row -mx-4 text-center">
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                        <!-- Worker Profile -->
                        
                        <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                                
                                <div class="flex flex-col items-center pb-10">
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://placehold.co/100x100.jpg" alt="Bonnie image"/>
                                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Sample Worker</h5>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Sample Work</span>
                                        <div class="flex mt-4 md:mt-6">
                                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View Profile</a>
                                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">Message</a>
                                        </div>
                                </div>
                            </div>
                        <!-- End: Worker Profile -->
                    </div>

                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                         <!-- Worker Profile -->
                        
                         <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                                
                                <div class="flex flex-col items-center pb-10">
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://placehold.co/100x100.jpg" alt="Bonnie image"/>
                                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Sample Worker</h5>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Sample Work</span>
                                        <div class="flex mt-4 md:mt-6">
                                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View Profile</a>
                                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">Message</a>
                                        </div>
                                </div>
                            </div>
                        <!-- End: Worker Profile -->
                    </div>
                    
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">

                        <!-- Worker Profile -->
                        
                            <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                                
                                <div class="flex flex-col items-center pb-10">
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://placehold.co/100x100.jpg" alt="Bonnie image"/>
                                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Sample Worker</h5>
                                    <span class="text-sm text-gray-500 dark:text-gray-400">Sample Work</span>
                                        <div class="flex mt-4 md:mt-6">
                                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">View Profile</a>
                                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-700 dark:focus:ring-gray-700 ms-3">Message</a>
                                        </div>
                                </div>
                            </div>
                        <!-- End: Worker Profile -->
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>

</div>
                <!-- End: Heading -->
            </div>
        </section>
        <!-- End: Workers Section -->

        <!-- Start: Services Section -->
        <!-- component -->
        <div id="services" class="section relative pt-20 pb-8 md:pt-16 md:pb-0 bg-white">
            <div class="container xl:max-w-6xl mx-auto px-4">
               
            <!-- Start: Services Section Title -->
                <header class="text-center mx-auto mb-12 lg:px-20">
                    <h2 class="text-4xl leading-normal mb-2 font-bold text-black">Services</h2>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="margin: 0 auto;height: 35px;" xml:space="preserve">
                        <circle cx="50.1" cy="30.4" r="5" class="stroke-primary" style="fill: transparent;stroke-width: 2;stroke-miterlimit: 10;"></circle>
                        <line x1="55.1" y1="30.4" x2="100" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                        <line x1="45.1" y1="30.4" x2="0" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                    </svg>
                </header>
            <!-- Start: Services Section Title -->

            <!-- Start: Service Section Row -->

                <div class="flex flex-wrap flex-row -mx-4 text-center">
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                        <!-- service block -->
                        <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                            <div class="inline-block text-gray-900 mb-4">
                                <!-- icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" viewBox="0 0 24 24"><path d="M3.16113 4.46924C5.58508 2.04529 9.44716 1.93599 12.0008 4.14133C14.5528 1.93599 18.4149 2.04529 20.8388 4.46924C23.2584 6.88884 23.3716 10.7414 21.1785 13.2952L13.4142 21.0862C12.6686 21.8318 11.4809 21.8657 10.6952 21.1879L10.5858 21.0862L2.82141 13.2952C0.628282 10.7414 0.741522 6.88884 3.16113 4.46924ZM4.57534 5.88345C2.86819 7.5906 2.81942 10.3281 4.42902 12.0942L4.57534 12.2474L12 19.672L17.3026 14.368L13.7677 10.8332L12.7071 11.8939C11.5355 13.0654 9.636 13.0654 8.46443 11.8939C7.29286 10.7223 7.29286 8.82279 8.46443 7.65122L10.5656 5.54872C8.85292 4.17762 6.37076 4.24042 4.7286 5.73712L4.57534 5.88345ZM13.0606 8.71188C13.4511 8.32135 14.0843 8.32135 14.4748 8.71188L18.7168 12.9538L19.4246 12.2474C21.1819 10.4901 21.1819 7.64081 19.4246 5.88345C17.7174 4.1763 14.9799 4.12752 13.2139 5.73712L13.0606 5.88345L9.87864 9.06543C9.51601 9.42806 9.49011 9.99991 9.80094 10.3924L9.87864 10.4796C10.2413 10.8423 10.8131 10.8682 11.2056 10.5573L11.2929 10.4796L13.0606 8.71188Z"></path></svg>
                            </div>
                            <h3 class="text-lg leading-normal mb-2 font-semibold text-black">Approved Services</h3>
                            <p class="text-gray-500">In our community, services are approved not only by the administration but also by the community!</p>
                        </div>
                        <!-- end service block -->
                    </div>
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <!-- service block -->
                        <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                            <div class="inline-block text-gray-900 mb-4">
                                <!-- icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path d="M14 8V4H5V20H19V9H16V13.6195C16 14.4641 15.5544 15.2529 14.8125 15.7215L12 17.4978L9.18747 15.7215C8.4456 15.2529 8 14.4641 8 13.6195V8H14ZM21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM10 13.6195C10 13.7698 10.0872 13.9242 10.2554 14.0305L12 15.1323L13.7446 14.0305C13.9128 13.9242 14 13.7698 14 13.6195V10H10V13.6195Z"></path></svg>

                            </div>
                            <h3 class="text-lg leading-normal mb-2 font-semibold text-black">Verified Documents</h3>
                            <p class="text-gray-500">In our community, documents are verified before any transactions happen in the community to keep a safe and secure local area!</p>
                        </div>
                        <!-- end service block -->
                    </div>
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <!-- service block -->
                        <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                            <div class="inline-block text-gray-900 mb-4">
                                <!-- icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM4 18.3851L5.76282 17H20V5H4V18.3851ZM11 13H13V15H11V13ZM11 7H13V12H11V7Z"></path></svg>
                            </div>
                            <h3 class="text-lg leading-normal mb-2 font-semibold text-black">Feedbacks</h3>
                            <p class="text-gray-500">In our community, your feedbacks matters to us and we'll always hear you out if you have concerns or request!</p>
                        </div>
                        <!-- end service block -->
                    </div>
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                        <!-- service block -->
                        <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                            <div class="inline-block text-gray-900 mb-4">
                                <!-- icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path d="M17 9.2L22.2133 5.55071C22.4395 5.39235 22.7513 5.44737 22.9096 5.6736C22.9684 5.75764 23 5.85774 23 5.96033V18.0397C23 18.3158 22.7761 18.5397 22.5 18.5397C22.3974 18.5397 22.2973 18.5081 22.2133 18.4493L17 14.8V19C17 19.5523 16.5523 20 16 20H2C1.44772 20 1 19.5523 1 19V5C1 4.44772 1.44772 4 2 4H16C16.5523 4 17 4.44772 17 5V9.2ZM17 12.3587L21 15.1587V8.84131L17 11.6413V12.3587ZM3 6V18H15V6H3ZM5 8H7V10H5V8Z"></path></svg>
                            </div>
                            <h3 class="text-lg leading-normal mb-2 font-semibold text-black">Monitoring</h3>
                            <p class="text-gray-500">Not only do we monitor your documents, feedbacks, services, we also monitor on how well the community interact with each other</p>
                        </div>
                        <!-- end service block -->
                    </div>
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">
                        <!-- service block -->
                        <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                            <div class="inline-block text-gray-900 mb-4">
                                <!-- icon -->
                                <svg xmlns="http://www.w3.org/2000/svg"  width="2rem" height="2rem" viewBox="0 0 24 24"><path d="M6 10V20H19V10H6ZM18 8H20C20.5523 8 21 8.44772 21 9V21C21 21.5523 20.5523 22 20 22H4C3.44772 22 3 21.5523 3 21V9C3 8.44772 3.44772 8 4 8H6V7C6 3.68629 8.68629 1 12 1C15.3137 1 18 3.68629 18 7V8ZM16 8V7C16 4.79086 14.2091 3 12 3C9.79086 3 8 4.79086 8 7V8H16ZM7 11H9V13H7V11ZM7 14H9V16H7V14ZM7 17H9V19H7V17Z"></path></svg>
                            </div>
                            <h3 class="text-lg leading-normal mb-2 font-semibold text-black">Secure</h3>
                            <p class="text-gray-500">We secure the safety of every individual that will be working or employing each other. We prioritize security overall along with monitoring.</p>
                        </div>
                        <!-- end service block -->
                    </div>
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">
                        <!-- service block -->
                        <div class="py-8 px-12 mb-12 bg-gray-50 border-b border-gray-100 transform transition duration-300 ease-in-out hover:-translate-y-2">
                            <div class="inline-block text-gray-900 mb-4">
                                <!-- icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" fill="currentColor" class="bi bi-funnel" viewBox="0 0 16 16">
                                    <path d="M1.5 1.5A.5.5 0 0 1 2 1h12a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.128.334L10 8.692V13.5a.5.5 0 0 1-.342.474l-3 1A.5.5 0 0 1 6 14.5V8.692L1.628 3.834A.5.5 0 0 1 1.5 3.5v-2zm1 .5v1.308l4.372 4.858A.5.5 0 0 1 7 8.5v5.306l2-.666V8.5a.5.5 0 0 1 .128-.334L13.5 3.308V2h-11z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg leading-normal mb-2 font-semibold text-black">Sample</h3>
                            <p class="text-gray-500">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed, tempore. Quod, ipsam non. Vero ipsa fuga voluptatem sapiente et, iure architecto illum?</p>
                        </div>
                        <!-- end service block -->
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- End: Services Section -->

        <!-- Start: Browse Section -->
        <section class="relative pt-20 pb-8 md:pt-16 md:pb-0 bg-white">

            <div class="container xl:max-w-6xl mx-auto px-4">
                
                <!-- Start: Heading-->
                <div class="text-center mx-auto mb-12 lg:px-20">
                    <h2 class=" leading-normal mb-2 text-4xl font-bold text-black">Apply Now</h2>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="margin: 0 auto;height: 35px;" xml:space="preserve">
                        <circle cx="50.1" cy="30.4" r="5" class="stroke-primary" style="fill: transparent;stroke-width: 2;stroke-miterlimit: 10;"></circle>
                        <line x1="55.1" y1="30.4" x2="100" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                        <line x1="45.1" y1="30.4" x2="0" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                    </svg>
                    <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">Interested in serving the community?</p>
                </div>
                <!-- End: Heading -->
            </div>
        </section>
        <!-- End: Browse Section -->
        

        




    </body>
</html>
