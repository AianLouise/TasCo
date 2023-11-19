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

            .border-t{
                border-top-width: 1px;
            }

            .hover\:text-blue-600:hover{
                color: #3182ce;	
            }

            .pt-52{
                padding-top: 13rem; /* 208px */
            }

            .pl-1{
                padding-left: 0.25rem; /* 4px */
            }	

            /* DELETE IF NOT USED */

            .hover\:border-blue-500:hover{
                border-color: rgb(59 130 246);
            }

            .mt-32{
                margin-top: 8rem;
            }

            .border-t-blue-500{
                border-top-color: rgb(59 130 246);
            }

            .border-blue-500{
                border-color: #4299e1;
            }

            .text-gray-800{
                color: #2d3748;
            }

            /* For trial purposes only! DELETE LATER */
            .bg-red-600{
                background-color: rgb(220 38 38);
            }	

            .bg-rose-600{
                background-color: rgb(225 29 72);
            }

            .nav-a:after{
                display:block;
                content: '';
                border-bottom: solid 2px #3182ce;  
                transform: scaleX(0);  
                transition: transform 250ms ease-in-out;
            }
            
            .nav-a:hover:after{
                transform: scaleX(1); 
            }

        </style>

    </head>
    
    <body>

    <section class="shadow-sm">

    <!-- Start: Header Navigation-->
        <div class="shadow-lg">
            <div class="max-w-6xl px-4 mx-auto" x-data="{open:false}">
                <nav class="flex items-center justify-between py-4">
                    <a href="" class="text-3xl font-bold leading-none">TasCo</a>
                    <div class="flex justify-between lg:space-x-9">
                        <div class="lg:hidden">
                            <button
                                class="flex items-center px-3 py-2 text-blue-600 border border-blue-200 rounded navbar-burger hover:text-blue-800 hover:border-blue-500 lg:hidden"
                                @click="open =true">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"><path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z" fill="rgba(70,146,221,1)"></path></svg>
                            </button>
                        </div>
                        <ul class="hidden lg:w-auto lg:space-x-9 lg:items-center lg:flex">
                            <li><a href=""
                                    class="nav-a text-sm font-medium">Home</a>
                            </li>
                            <li><a href=""
                                    class="nav-a text-sm font-medium">Search</a>
                            </li>
                            <li><a href=""
                                    class="nav-a text-sm font-medium">Profile</a>
                            </li>
                            <li><a href=""
                                    class="nav-a text-sm font-medium">Settings
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
                
                <!-- Start: Navigation Mobile Sidebar -->
                <div class="fixed inset-0 w-full bg-gray-900 opacity-25 lg:hidden"
                    :class="{'translate-x-0 ease-in-opacity-100' :open===true, '-translate-x-full ease-out opacity-0' : open===false}">
                </div>

                <div class="absolute inset-0 z-50 h-screen p-3 text-gray-400 duration-500 transform bg-blue-50 w-80 lg:hidden lg:transform-none lg:relative"
                    :class="{'translate-x-0 ease-in-opacity-100' :open===true, '-translate-x-full ease-out opacity-0' : open===false}">              
                    
                    <div class="flex justify-between lg:hidden">
                        <a class="p-2 text-4xl font-bold text-gray-700" href="#">TasCo</a>
                        <button class="p-2 text-gray-700 rounded-md hover:text-blue-300 lg:hidden "
                            @click="open=false">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM12 10.5858L14.8284 7.75736L16.2426 9.17157L13.4142 12L16.2426 14.8284L14.8284 16.2426L12 13.4142L9.17157 16.2426L7.75736 14.8284L10.5858 12L7.75736 9.17157L9.17157 7.75736L12 10.5858Z"></path></svg>
                        </button>
                    </div>

                    <!-- Start: Nav List -->
                    <ul class="px-4 text-left mt-7">
                        <li class="pb-3">
                            <a href="" class="text-sm text-gray-700 hover:text-blue-400">Home</a>
                        </li>
                        <li class="pb-3">
                            <a href="" class="text-sm text-gray-700 hover:text-blue-400">Search</a>
                        </li>
                        <li class="pb-3">
                            <a href="" class="text-sm text-gray-700 hover:text-blue-400">Profile</a>
                        </li>
                        <li class="pb-3">
                            <a href="" class="text-sm text-gray-700 hover:text-blue-400">Settings</a>
                        </li>
                    </ul>
                    <!-- End: Nav List -->
                </div>
                <!-- End: Navigation Mobile Sidebar -->
            </div>
        </div>
        <!-- End: Header Navigation-->

        <!-- Start: Hero Section-->

        <!-- Start: Hero Background Image -->
        <div class="relative flex items-center justify-center w-full h-screen text-center bg-center bg-cover">
            <!-- style="background-image:url();" -->

            <!-- Start: Hero Background Color -->
            <div class="absolute top-0 bottom-0 left-0 right-0 bg-blue-50 opacity-80"></div>
                <div class="z-10 px-4 sm:px-6 lg:px-8">
                    <div class="text-center">

                        <h1 class="mb-6 text-5xl font-bold tracking-tight md:text-6xl">
                            Welcome to  <span class="text-blue-500">Tasco</span>
                        </h1>

                        <p class="mb-6 tracking-wide text-gray-500 sm:mt-5 sm:text-md sm:max-w-xl sm:mx-auto md:mt-5">
                        Discover a new level of convenience and reliability with Tasco, your trusted local service management partner. At Tasco, we take pride in offering a wide range of services to meet your needs.
                        </p>
                        
                        <div class="justify-center sm:flex">
                            <div class="">
                                <a href="#"
                                    class="flex items-center justify-center w-full px-8 py-3 text-gray-100 bg-blue-500 rounded-md shadow hover:bg-blue-500 ">
                                    Get started</a>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="#"
                                    class="flex items-center justify-center w-full px-8 py-3 text-blue-600 rounded-md shadow hover:text-gray-100 hover:bg-blue-500 ">
                                    Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End: Hero Section-->
    </section>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

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

                <div class="flex flex-wrap flex-row -mx-4 text-center">
                    
                <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                        
                    <!-- Browse Box-->
                        
                        <div class="py-8 px-12 mb-12 bg-blue-100 border rounded-md border-blue-500 transform transition duration-300 ease-in-out hover:-translate-y-2">
                                
                            <div class="flex flex-col items-center">
                                <div class="inline-block text-gray-900 mb-4">
                                        
                                    <!-- Browse Icon -->
                                
                                    <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" viewBox="0 0 24 24"><path d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 11H4V19H20V11ZM7 5H4V9H20V5H17V7H15V5H9V7H7V5Z"></path></svg>

                                </div>
                                    <h5 class="mb-1 text-xl font-medium text-gray-900">Calendar</h5>
                                </div>
                            </div>
                        <!-- End: Browse -->
                    </div>


                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                        
                    <!-- Browse Box-->
                        
                        <div class="py-8 px-12 mb-12 bg-blue-100 border rounded-md border-blue-500 transform transition duration-300 ease-in-out hover:-translate-y-2">
                                
                            <div class="flex flex-col items-center">
                                <div class="inline-block text-gray-900 mb-4">
                                        
                                    <!-- Browse Icon -->

                                    <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" viewBox="0 0 24 24"><path d="M12 11C14.7614 11 17 13.2386 17 16V22H15V16C15 14.4023 13.7511 13.0963 12.1763 13.0051L12 13C10.4023 13 9.09634 14.2489 9.00509 15.8237L9 16V22H7V16C7 13.2386 9.23858 11 12 11ZM5.5 14C5.77885 14 6.05009 14.0326 6.3101 14.0942C6.14202 14.594 6.03873 15.122 6.00896 15.6693L6 16L6.0007 16.0856C5.88757 16.0456 5.76821 16.0187 5.64446 16.0069L5.5 16C4.7203 16 4.07955 16.5949 4.00687 17.3555L4 17.5V22H2V17.5C2 15.567 3.567 14 5.5 14ZM18.5 14C20.433 14 22 15.567 22 17.5V22H20V17.5C20 16.7203 19.4051 16.0796 18.6445 16.0069L18.5 16C18.3248 16 18.1566 16.03 18.0003 16.0852L18 16C18 15.3343 17.8916 14.694 17.6915 14.0956C17.9499 14.0326 18.2211 14 18.5 14ZM5.5 8C6.88071 8 8 9.11929 8 10.5C8 11.8807 6.88071 13 5.5 13C4.11929 13 3 11.8807 3 10.5C3 9.11929 4.11929 8 5.5 8ZM18.5 8C19.8807 8 21 9.11929 21 10.5C21 11.8807 19.8807 13 18.5 13C17.1193 13 16 11.8807 16 10.5C16 9.11929 17.1193 8 18.5 8ZM5.5 10C5.22386 10 5 10.2239 5 10.5C5 10.7761 5.22386 11 5.5 11C5.77614 11 6 10.7761 6 10.5C6 10.2239 5.77614 10 5.5 10ZM18.5 10C18.2239 10 18 10.2239 18 10.5C18 10.7761 18.2239 11 18.5 11C18.7761 11 19 10.7761 19 10.5C19 10.2239 18.7761 10 18.5 10ZM12 2C14.2091 2 16 3.79086 16 6C16 8.20914 14.2091 10 12 10C9.79086 10 8 8.20914 8 6C8 3.79086 9.79086 2 12 2ZM12 4C10.8954 4 10 4.89543 10 6C10 7.10457 10.8954 8 12 8C13.1046 8 14 7.10457 14 6C14 4.89543 13.1046 4 12 4Z"></path></svg>

                                </div>
                                    <h5 class="mb-1 text-xl font-medium text-gray-900">Service</h5>
                                </div>
                            </div>
                        <!-- End: Browse Box -->
                    </div>

                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                        
                    <!-- Browse Box-->
                        
                        <div class="py-8 px-12 mb-12 bg-blue-100 border rounded-md border-blue-500 transform transition duration-300 ease-in-out hover:-translate-y-2">
                                
                            <div class="flex flex-col items-center">
                                <div class="inline-block text-gray-900 mb-4">
                                        
                                    <!-- Browse Icon -->

                                <svg xmlns="http://www.w3.org/2000/svg" width="3rem" height="3rem" viewBox="0 0 24 24"><path d="M19.9381 8H21C22.1046 8 23 8.89543 23 10V14C23 15.1046 22.1046 16 21 16H19.9381C19.446 19.9463 16.0796 23 12 23V21C15.3137 21 18 18.3137 18 15V9C18 5.68629 15.3137 3 12 3C8.68629 3 6 5.68629 6 9V16H3C1.89543 16 1 15.1046 1 14V10C1 8.89543 1.89543 8 3 8H4.06189C4.55399 4.05369 7.92038 1 12 1C16.0796 1 19.446 4.05369 19.9381 8ZM3 10V14H4V10H3ZM20 10V14H21V10H20ZM7.75944 15.7849L8.81958 14.0887C9.74161 14.6662 10.8318 15 12 15C13.1682 15 14.2584 14.6662 15.1804 14.0887L16.2406 15.7849C15.0112 16.5549 13.5576 17 12 17C10.4424 17 8.98882 16.5549 7.75944 15.7849Z"></path></svg>

                            </div>
                                    <h5 class="mb-1 text-xl font-medium text-gray-900">Customer Service</h5>
                                </div>
                            </div>
                        <!-- End: Browse -->
                    </div>
            </div>
        </section>
        <!-- End: Browse Section -->

        <!-- Start: Roles Section -->
        <section class="relative pt-20 pb-8 md:pt-16 md:pb-0">

            <div class="container xl:max-w-6xl mx-auto px-4">
                
                <!-- Start: Heading-->

                <div class="text-center mx-auto mb-12 lg:px-20">
                    <h2 class=" leading-normal mb-2 text-4xl font-bold text-black">The Roles</h2>
                    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 100 60" style="margin: 0 auto;height: 35px;" xml:space="preserve">
                        <circle cx="50.1" cy="30.4" r="5" class="stroke-primary" style="fill: transparent;stroke-width: 2;stroke-miterlimit: 10;"></circle>
                        <line x1="55.1" y1="30.4" x2="100" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                        <line x1="45.1" y1="30.4" x2="0" y2="30.4" class="stroke-primary" style="stroke-width: 2;stroke-miterlimit: 10;"></line>
                    </svg>
                    <p class="text-gray-500 leading-relaxed font-light text-xl mx-auto pb-2">in our community</p>
                </div>
                <!-- End: Heading -->

        <div class="lg:flex border rounded-md shadow-md border-blue-500 mb-12">
            <div class="relative w-full mb-10 md:w-1/2 lg:mb-0 bg-blue-500">
                <img src="https://placehold.co/500x500" alt=""
                class="relative z-40 object-cover w-full md:h-96">
            </div>
            <div class="w-full py-6 px-6 mb-10 md:w-1/2 lg:mb-0">
                <h2 class="md:text-2xl text-3xl font-bold">The Job Seeker</h2>
                <p class="mt-4 leading-loose">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia dolorem, sapiente iusto itaque error at fugiat sequi enim dolorum iure tempora, vel earum nulla! Ullam, illo! Fuga, maiores. Est, similique.</p>
             </div>  
        </div>

        <!-- Roles -->    
        
        <div class="lg:flex border rounded-md shadow-md border-blue-500">
            <div class="w-full py-6 px-6 mb-10 md:w-1/2 lg:mb-0">
                <h2 class="md:text-2xl text-3xl font-bold">The Employer</h2>
                <p class="mt-4 leading-loose">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia dolorem, sapiente iusto itaque error at fugiat sequi enim dolorum iure tempora, vel earum nulla! Ullam, illo! Fuga, maiores. Est, similique.</p>
            </div>  
            <div class="relative w-full h-full md:w-1/2 lg:mb-0 bg-blue-500">
                <img src="https://placehold.co/500x500" alt=""
                class="relative z-40 object-cover w-full md:h-96 ">
            </div>
        </div>
            
        </section>
        <!-- End: Roles Section -->

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
                
                
    <form class="mb-12 w-full">
        <div class="flex">        
            <button id="dropdown-button" data-dropdown-toggle="dropdown" class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100" type="button">All categories <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
    </svg></button>
            
            <div class="relative w-full">
                <input type="search" id="search-dropdown" class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for Workers, Employer, Category..." required>
                <button type="submit" class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-500 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                    
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </div>
        </div>
    </form>

    <!-- Start: Worker Section Row -->

             <div class="flex flex-wrap flex-row -mx-4 text-center">
             
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">
                        
                    <!-- Worker Profile -->
                        
                        <div class="py-8 px-12 mb-12 border border-blue-500 transform transition duration-300 ease-in-out hover:-translate-y-2">
                                
                                <div class="flex flex-col items-center pb-10">
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://placehold.co/100x100.jpg"/>
                                    <h5 class="mb-1 text-xl font-medium text-gray-900">Sample Worker</h5>
                                    <span class="text-sm text-gray-500 ">Sample Work</span>
                                        <div class="flex mt-4 md:mt-6">
                                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">View Profile</a>
                                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 ms-3">Message</a>
                                        </div>
                                </div>
                            </div>
                        <!-- End: Worker Profile -->
                    </div>

                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".1s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.1s; animation-name: fadeInUp;">

                         <!-- Worker Profile -->
                        
                         <div class="py-8 px-12 mb-12 border border-blue-500 transform transition duration-300 ease-in-out hover:-translate-y-2">
                                
                                <div class="flex flex-col items-center pb-10">
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://placehold.co/100x100.jpg"/>
                                    <h5 class="mb-1 text-xl font-medium text-gray-900">Sample Worker</h5>
                                    <span class="text-sm text-gray-500 ">Sample Work</span>
                                        <div class="flex mt-4 md:mt-6">
                                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">View Profile</a>
                                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 ms-3">Message</a>
                                        </div>
                                </div>
                            </div>
                        <!-- End: Worker Profile -->
                    </div>
                    
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp" data-wow-duration="1s" data-wow-delay=".3s" style="visibility: visible; animation-duration: 1s; animation-delay: 0.3s; animation-name: fadeInUp;">

                        <!-- Worker Profile -->
                        
                            <div class="py-8 px-12 mb-12 border border-blue-500 transform transition duration-300 ease-in-out hover:-translate-y-2">
                                
                                <div class="flex flex-col items-center pb-10">
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="https://placehold.co/100x100.jpg"/>
                                    <h5 class="mb-1 text-xl font-medium text-gray-900">Sample Worker</h5>
                                    <span class="text-sm text-gray-500">Sample Work</span>
                                        <div class="flex mt-4 md:mt-6">
                                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">View Profile</a>
                                            <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 ms-3">Message</a>
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
                                <svg xmlns="http://www.w3.org/2000/svg" width="2rem" height="2rem" viewBox="0 0 24 24"><path d="M5 3V19H21V21H3V3H5ZM20.2929 6.29289L21.7071 7.70711L16 13.4142L13 10.415L8.70711 14.7071L7.29289 13.2929L13 7.58579L16 10.585L20.2929 6.29289Z"></path></svg>

                            </div>
                            <h3 class="text-lg leading-normal mb-2 font-semibold text-black">Growth</h3>
                            <p class="text-gray-500">In our community, every individual matters, we secure, hear, and talk to one another in order to have an efficient growth of the community!
</p>
                        </div>
                        <!-- end service block -->
                    </div>
                </div>
                <!-- end row -->
            </div>
        </div>
        <!-- End: Services Section -->

        <!-- Start: Apply Now Section -->
        <section class="relative pt-20 pb-8 md:pt-16 md:pb-0 bg-white">

            <div class="container xl:max-w-6xl mx-auto px-4">
                            

                <div class="w-full p-4 text-center bg-white border border-gray-200 rounded-lg shadow sm:p-8">
                    <h5 class="mb-2 text-3xl font-bold">Apply Now</h5>
                    <p class="mb-5 text-base text-gray-500 sm:text-lg">Interested in joining our community?</p>
                    <div class="items-center justify-center space-y-4 sm:flex sm:space-y-0 sm:space-x-4 rtl:space-x-reverse">
                        <a href="#" class="w-full sm:w-auto bg-blue-500 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5">
                            <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4 22C4 17.5817 7.58172 14 12 14C16.4183 14 20 17.5817 20 22H4ZM13 16.083V20H17.6586C16.9423 17.9735 15.1684 16.4467 13 16.083ZM11 20V16.083C8.83165 16.4467 7.05766 17.9735 6.34141 20H11ZM12 13C8.685 13 6 10.315 6 7C6 3.685 8.685 1 12 1C15.315 1 18 3.685 18 7C18 10.315 15.315 13 12 13ZM12 11C14.2104 11 16 9.21043 16 7C16 4.78957 14.2104 3 12 3C9.78957 3 8 4.78957 8 7C8 9.21043 9.78957 11 12 11Z" fill="rgba(255,255,255,1)"></path></svg>
                            <div class="text-left rtl:text-right">
                                <div class="mb-1 text-xs">Apply as</div>
                                <div class="-mt-1 font-sans text-sm font-semibold">Job Seeker</div>
                            </div>
                        </a>
                        <a href="#" class="w-full sm:w-auto bg-blue-500 hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 text-white rounded-lg inline-flex items-center justify-center px-4 py-2.5">
                            <svg class="me-3 w-7 h-7" aria-hidden="true" focusable="false" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M7 5V2C7 1.44772 7.44772 1 8 1H16C16.5523 1 17 1.44772 17 2V5H21C21.5523 5 22 5.44772 22 6V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V6C2 5.44772 2.44772 5 3 5H7ZM4 16V19H20V16H4ZM4 14H20V7H4V14ZM9 3V5H15V3H9ZM11 11H13V13H11V11Z" fill="rgba(255,255,255,1)"></path></svg>
                            <div class="text-left rtl:text-right">
                                <div class="mb-1 text-xs">Apply as</div>
                                <div class="-mt-1 font-sans text-sm font-semibold">Employer</div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>
        </section>
        <!-- End: Apply Now Section -->

        
        <!-- Start: Footer Section -->

        <section class="flex flex-col mt-16 lg:justify-end">

            <!-- Div Box for Text Upper Footer Section -->

            <div class="w-full bg-blue-50 border-t py-4">

                <!-- Div Box for Text Area -->
                <div class="max-w-6xl mx-auto">
                    <div class="justify-center flex-1 max-w-6xl px-4 py-2 mx-auto lg:py-0">
                        <div class="flex flex-wrap py-4 -mx-3">
                            <div class="w-full px-4 mb-7 md:w-1/2 lg:w-4/12 lg:mb-0">
                                
                                <a href="#" class="inline-block pb-2 text-lg font-bold">Tasco</a>
                                    <div class="w-16 mb-4 border-b-2 border-blue-500"></div>
                                        <p class="text-base font-normal leading-6 lg:w-64">Lorem ipsum dor amet Lorem ipsum dor amet Lorem ipsum dor amet Lorem ipsum dor ame </p>
                            </div>

                        <div class="w-full px-4 md:w-1/4 lg:w-2/12 mb-7 lg:mb-0">
                            <h2 class="pb-2 text-lg font-bold text-gray-800">Quick Links</h2>
                            <div class="w-16 mb-4 border-b-2 border-blue-500"></div>
                                <ul>
                                    <li class="mb-4">
                                        <a href="#" class="inline-block text-base font-normal">Home</a>
                                    </li>
                                    <li class="mb-4">
                                        <a href="#" class="inline-block text-base font-normal">About Us</a>
                                    </li>
                                    <li class="mb-4">
                                        <a href="#" class="inline-block text-base font-normal">Features</a>
                                    </li>
                                </ul>
            </div>
                
                    <div class="w-full px-4 mb-7 lg:mb-0 md:w-1/4 lg:w-2/12">
                        <h2 class="pb-2 text-lg font-bold text-gray-800">Features</h2>
                        <div class="w-16 mb-4 border-b-2 border-blue-500"></div>
                            <ul>
                                <li class="mb-4">
                                    <a href="#" class="inline-block text-base font-normal">Home</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="inline-block text-base font-normal">About Us</a>
                                </li>
                                <li class="mb-4">
                                    <a href="#" class="inline-block text-base font-normal">Features</a>
                                </li>
                            </ul>
                    </div>

                    <div class="w-full px-4 mb-2 lg:mb-0 md:w-1/3 lg:w-4/12">
                        <h2 class="pb-2 text-lg font-bold text-gray-800 ">Contact Info</h2>
                            
                            <div class="w-16 mb-4 border-b-2 border-blue-500"></div>
                                <p class="flex items-center mb-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-1 text-gray-800  bi bi-geo-alt " viewBox="0 0 16 16">
                                    <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"></path>
                                    <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"></path>
                                    </svg>
                                    <span class="text-gray-800">Pampanga, Philippines</span>
                                </p>

                                <p class="flex items-center mb-4 ">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-4 h-4 mr-2 text-gray-800 bi bi-envelope" viewBox="0 0 16 16">
                                    <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2Zm13 2.383-4.708 2.825L15 11.105V5.383Zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741ZM1 11.105l4.708-2.897L1 5.383v5.722Z"></path>
                                    </svg>
                                    <span class="text-gray-800">Tasco@gmail.com</span>
                                </p>
            
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Start: Footer Copyright -->
            <div class="px-4 py-6 bg-blue-500">
                <div class="flex flex-wrap items-center justify-center max-w-6xl gap-4 mx-auto">
                    <span>Copyright © 2023 TasCo. All Rights Reserved</span>
                </div>
            </div>
            <!-- End: Footer Copyright -->

        </section>

        <!-- End: Footer Section -->

    </body>
</html>
