<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    </head>
    <body class="font-sans">

        <section class="min-h-full bg-blue-100">
            <div class="mx-auto max-w-7xl px-4 py-32 sm:px-6 lg:px-8 ">
                <div class="mb-4">
                    <div class="mb-6 max-w-3xl text-center sm:text-center md:mx-auto md:mb-12">
                        <p class="text-base font-semibold uppercase tracking-wide text-blue-500">
                            Services
                        </p>
                        <h2
                            class="font-heading mb-2 font-bold tracking-tight text-gray-900 text-3xl sm:text-5xl">
                            We Offer
                        </h2>
                        <div class="h-full">
                        <img src="{{ URL('images/Services.png') }}" width="700" class="mx-auto">
                            <p class="mb-12 mt-8 mx-auto max-w-lg text-center text-xl leading-relaxed text-gray-800">
                            Welcome to Tasco! Our dedicated customer service team is here to assist you with any inquiries or support you may need. We're committed to ensuring your experience with Tasco is seamless and satisfying.
                            </p> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-4 bg-white">
    <div class="max-w-screen-md mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-between">

        <div class="text-center">
            <p class="mt-4 text-sm leading-7 text-gray-500 font-regular">
                Services
            </p>
            <h3 class="text-3xl sm:text-4xl leading-normal font-extrabold tracking-tight text-gray-900">
                <span class="text-blue-600">TasCo</span> Services
            </h3>

        </div>

        <div class="mt-20">
            <ul class="">

                <li class="text-left mb-10">
                    <div class="flex flex-row items-start mb-5">
                        <div
                            class="hidden sm:flex items-center justify-center p-3 mr-3 rounded-full bg-blue-500 text-white border-4 border-white text-xl font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" 
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M3.16113 4.46924C5.58508 2.04529 9.44716 1.93599 12.0008 4.14133C14.5528 1.93599 18.4149 2.04529 20.8388 4.46924C23.2584 6.88884 23.3716 10.7414 21.1785 13.2952L13.4142 21.0862C12.6686 21.8318 11.4809 21.8657 10.6952 21.1879L10.5858 21.0862L2.82141 13.2952C0.628282 10.7414 0.741522 6.88884 3.16113 4.46924ZM4.57534 5.88345C2.86819 7.5906 2.81942 10.3281 4.42902 12.0942L4.57534 12.2474L12 19.672L17.3026 14.368L13.7677 10.8332L12.7071 11.8939C11.5355 13.0654 9.636 13.0654 8.46443 11.8939C7.29286 10.7223 7.29286 8.82279 8.46443 7.65122L10.5656 5.54872C8.85292 4.17762 6.37076 4.24042 4.7286 5.73712L4.57534 5.88345ZM13.0606 8.71188C13.4511 8.32135 14.0843 8.32135 14.4748 8.71188L18.7168 12.9538L19.4246 12.2474C21.1819 10.4901 21.1819 7.64081 19.4246 5.88345C17.7174 4.1763 14.9799 4.12752 13.2139 5.73712L13.0606 5.88345L9.87864 9.06543C9.51601 9.42806 9.49011 9.99991 9.80094 10.3924L9.87864 10.4796C10.2413 10.8423 10.8131 10.8682 11.2056 10.5573L11.2929 10.4796L13.0606 8.71188Z">
                                    </path>
                                </svg>
                        </div>
                        <div class="bg-gray-100 p-5 px-10 w-full flex items-center">
                            <h4 class="text-md leading-6 font-medium text-gray-900">Approved Services</h4>
                        </div>
                    </div>

                    <div class="flex flex-row items-start">
                        <div class="bg-blue-100 p-5 px-10 w-full flex items-center">
                            <p class="text-gray-700 text-sm">In our community, services are approved not only by the administration but also by the community!
                            </p>
                        </div>
                        <div
                            class="hidden sm:flex items-center justify-center p-3 ml-3 rounded-full bg-blue-500 text-white border-4 border-white text-xl font-semibold">
                     
                            <svg xmlns="http://www.w3.org/2000/svg"class="h-6 w-6" viewBox="0 0 24 24"><path d="M9.97308 18H14.0269C14.1589 16.7984 14.7721 15.8065 15.7676 14.7226C15.8797 14.6006 16.5988 13.8564 16.6841 13.7501C17.5318 12.6931 18 11.385 18 10C18 6.68629 15.3137 4 12 4C8.68629 4 6 6.68629 6 10C6 11.3843 6.46774 12.6917 7.31462 13.7484C7.40004 13.855 8.12081 14.6012 8.23154 14.7218C9.22766 15.8064 9.84103 16.7984 9.97308 18ZM14 20H10V21H14V20ZM5.75395 14.9992C4.65645 13.6297 4 11.8915 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 11.8925 19.3428 13.6315 18.2443 15.0014C17.624 15.7748 16 17 16 18.5V21C16 22.1046 15.1046 23 14 23H10C8.89543 23 8 22.1046 8 21V18.5C8 17 6.37458 15.7736 5.75395 14.9992ZM13 10.0048H15.5L11 16.0048V12.0048H8.5L13 6V10.0048Z" fill="rgba(255,255,255,1)"></path></svg>
                        </div>
                    </div>

                </li>
                
                <li class="text-left mb-10">
                    <div class="flex flex-row items-start mb-5">
                        <div
                            class="hidden sm:flex items-center justify-center p-3 mr-3 rounded-full bg-blue-500 text-white border-4 border-white text-xl font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M14 8V4H5V20H19V9H16V13.6195C16 14.4641 15.5544 15.2529 14.8125 15.7215L12 17.4978L9.18747 15.7215C8.4456 15.2529 8 14.4641 8 13.6195V8H14ZM21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM10 13.6195C10 13.7698 10.0872 13.9242 10.2554 14.0305L12 15.1323L13.7446 14.0305C13.9128 13.9242 14 13.7698 14 13.6195V10H10V13.6195Z">
                                    </path>
                            </svg>
                        </div>
                        <div class="bg-gray-100 p-5 px-10 w-full flex items-center">
                            <h4 class="text-md leading-6 font-medium text-gray-900">Verified Documents</h4>
                        </div>
                    </div>

                    <div class="flex flex-row items-start">
                        <div class="bg-blue-100 p-5 px-10 w-full flex items-center">
                            <p class="text-gray-700 text-sm">In our community, documents are verified before any transactions happen to keep a safe and secure local area!
                            </p>
                        </div>
                        <div
                            class="hidden sm:flex items-center justify-center p-3 ml-3 rounded-full bg-blue-500 text-white border-4 border-white text-xl font-semibold">
                     
                            <svg xmlns="http://www.w3.org/2000/svg"class="h-6 w-6" viewBox="0 0 24 24"><path d="M9.97308 18H14.0269C14.1589 16.7984 14.7721 15.8065 15.7676 14.7226C15.8797 14.6006 16.5988 13.8564 16.6841 13.7501C17.5318 12.6931 18 11.385 18 10C18 6.68629 15.3137 4 12 4C8.68629 4 6 6.68629 6 10C6 11.3843 6.46774 12.6917 7.31462 13.7484C7.40004 13.855 8.12081 14.6012 8.23154 14.7218C9.22766 15.8064 9.84103 16.7984 9.97308 18ZM14 20H10V21H14V20ZM5.75395 14.9992C4.65645 13.6297 4 11.8915 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 11.8925 19.3428 13.6315 18.2443 15.0014C17.624 15.7748 16 17 16 18.5V21C16 22.1046 15.1046 23 14 23H10C8.89543 23 8 22.1046 8 21V18.5C8 17 6.37458 15.7736 5.75395 14.9992ZM13 10.0048H15.5L11 16.0048V12.0048H8.5L13 6V10.0048Z" fill="rgba(255,255,255,1)"></path></svg>
                        </div>
                    </div>

                </li>
                <li class="text-left mb-10">
                    <div class="flex flex-row items-start mb-5">
                        <div
                            class="hidden sm:flex items-center justify-center p-3 mr-3 rounded-full bg-blue-500 text-white border-4 border-white text-xl font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M6.45455 19L2 22.5V4C2 3.44772 2.44772 3 3 3H21C21.5523 3 22 3.44772 22 4V18C22 18.5523 21.5523 19 21 19H6.45455ZM4 18.3851L5.76282 17H20V5H4V18.3851ZM11 13H13V15H11V13ZM11 7H13V12H11V7Z">
                                    </path>
                                </svg>
                        </div>
                        <div class="bg-gray-100 p-5 px-10 w-full flex items-center">
                            <h4 class="text-md leading-6 font-medium text-gray-900">Feedbacks</h4>
                        </div>
                    </div>

                    <div class="flex flex-row items-start">
                        <div class="bg-blue-100 p-5 px-10 w-full flex items-center">
                            <p class="text-gray-700 text-sm">In our community, your feedbacks matters to us and we'll always hear you out if you have concerns or request!
                            </p>
                        </div>
                        <div
                            class="hidden sm:flex items-center justify-center p-3 ml-3 rounded-full bg-blue-500 text-white border-4 border-white text-xl font-semibold">
                     
                            <svg xmlns="http://www.w3.org/2000/svg"class="h-6 w-6" viewBox="0 0 24 24"><path d="M9.97308 18H14.0269C14.1589 16.7984 14.7721 15.8065 15.7676 14.7226C15.8797 14.6006 16.5988 13.8564 16.6841 13.7501C17.5318 12.6931 18 11.385 18 10C18 6.68629 15.3137 4 12 4C8.68629 4 6 6.68629 6 10C6 11.3843 6.46774 12.6917 7.31462 13.7484C7.40004 13.855 8.12081 14.6012 8.23154 14.7218C9.22766 15.8064 9.84103 16.7984 9.97308 18ZM14 20H10V21H14V20ZM5.75395 14.9992C4.65645 13.6297 4 11.8915 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 11.8925 19.3428 13.6315 18.2443 15.0014C17.624 15.7748 16 17 16 18.5V21C16 22.1046 15.1046 23 14 23H10C8.89543 23 8 22.1046 8 21V18.5C8 17 6.37458 15.7736 5.75395 14.9992ZM13 10.0048H15.5L11 16.0048V12.0048H8.5L13 6V10.0048Z" fill="rgba(255,255,255,1)"></path></svg>
                        </div>
                    </div>

                </li>
                <li class="text-left mb-10">
                    <div class="flex flex-row items-start mb-5">
                        <div
                            class="hidden sm:flex items-center justify-center p-3 mr-3 rounded-full bg-blue-500 text-white border-4 border-white text-xl font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" 
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M3.16113 4.46924C5.58508 2.04529 9.44716 1.93599 12.0008 4.14133C14.5528 1.93599 18.4149 2.04529 20.8388 4.46924C23.2584 6.88884 23.3716 10.7414 21.1785 13.2952L13.4142 21.0862C12.6686 21.8318 11.4809 21.8657 10.6952 21.1879L10.5858 21.0862L2.82141 13.2952C0.628282 10.7414 0.741522 6.88884 3.16113 4.46924ZM4.57534 5.88345C2.86819 7.5906 2.81942 10.3281 4.42902 12.0942L4.57534 12.2474L12 19.672L17.3026 14.368L13.7677 10.8332L12.7071 11.8939C11.5355 13.0654 9.636 13.0654 8.46443 11.8939C7.29286 10.7223 7.29286 8.82279 8.46443 7.65122L10.5656 5.54872C8.85292 4.17762 6.37076 4.24042 4.7286 5.73712L4.57534 5.88345ZM13.0606 8.71188C13.4511 8.32135 14.0843 8.32135 14.4748 8.71188L18.7168 12.9538L19.4246 12.2474C21.1819 10.4901 21.1819 7.64081 19.4246 5.88345C17.7174 4.1763 14.9799 4.12752 13.2139 5.73712L13.0606 5.88345L9.87864 9.06543C9.51601 9.42806 9.49011 9.99991 9.80094 10.3924L9.87864 10.4796C10.2413 10.8423 10.8131 10.8682 11.2056 10.5573L11.2929 10.4796L13.0606 8.71188Z">
                                    </path>
                                </svg>
                        </div>
                        <div class="bg-gray-100 p-5 px-10 w-full flex items-center">
                            <h4 class="text-md leading-6 font-medium text-gray-900">Approved Services</h4>
                        </div>
                    </div>

                    <div class="flex flex-row items-start">
                        <div class="bg-blue-100 p-5 px-10 w-full flex items-center">
                            <p class="text-gray-700 text-sm">In our community, services are approved not only by the administration but also by the community!
                            </p>
                        </div>
                        <div
                            class="hidden sm:flex items-center justify-center p-3 ml-3 rounded-full bg-blue-500 text-white border-4 border-white text-xl font-semibold">
                     
                            <svg xmlns="http://www.w3.org/2000/svg"class="h-6 w-6" viewBox="0 0 24 24"><path d="M9.97308 18H14.0269C14.1589 16.7984 14.7721 15.8065 15.7676 14.7226C15.8797 14.6006 16.5988 13.8564 16.6841 13.7501C17.5318 12.6931 18 11.385 18 10C18 6.68629 15.3137 4 12 4C8.68629 4 6 6.68629 6 10C6 11.3843 6.46774 12.6917 7.31462 13.7484C7.40004 13.855 8.12081 14.6012 8.23154 14.7218C9.22766 15.8064 9.84103 16.7984 9.97308 18ZM14 20H10V21H14V20ZM5.75395 14.9992C4.65645 13.6297 4 11.8915 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 11.8925 19.3428 13.6315 18.2443 15.0014C17.624 15.7748 16 17 16 18.5V21C16 22.1046 15.1046 23 14 23H10C8.89543 23 8 22.1046 8 21V18.5C8 17 6.37458 15.7736 5.75395 14.9992ZM13 10.0048H15.5L11 16.0048V12.0048H8.5L13 6V10.0048Z" fill="rgba(255,255,255,1)"></path></svg>
                        </div>
                    </div>

                </li>
                <li class="text-left mb-10">
                    <div class="flex flex-row items-start mb-5">
                        <div
                            class="hidden sm:flex items-center justify-center p-3 mr-3 rounded-full bg-blue-500 text-white border-4 border-white text-xl font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M14 8V4H5V20H19V9H16V13.6195C16 14.4641 15.5544 15.2529 14.8125 15.7215L12 17.4978L9.18747 15.7215C8.4456 15.2529 8 14.4641 8 13.6195V8H14ZM21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM10 13.6195C10 13.7698 10.0872 13.9242 10.2554 14.0305L12 15.1323L13.7446 14.0305C13.9128 13.9242 14 13.7698 14 13.6195V10H10V13.6195Z">
                                    </path>
                            </svg>
                        </div>
                        <div class="bg-gray-100 p-5 px-10 w-full flex items-center">
                            <h4 class="text-md leading-6 font-medium text-gray-900">Verified Documents</h4>
                        </div>
                    </div>

                    <div class="flex flex-row items-start">
                        <div class="bg-blue-100 p-5 px-10 w-full flex items-center">
                            <p class="text-gray-700 text-sm">In our community, documents are verified before any transactions happen to keep a safe and secure local area!
                            </p>
                        </div>
                        <div
                            class="hidden sm:flex items-center justify-center p-3 ml-3 rounded-full bg-blue-500 text-white border-4 border-white text-xl font-semibold">
                     
                            <svg xmlns="http://www.w3.org/2000/svg"class="h-6 w-6" viewBox="0 0 24 24"><path d="M9.97308 18H14.0269C14.1589 16.7984 14.7721 15.8065 15.7676 14.7226C15.8797 14.6006 16.5988 13.8564 16.6841 13.7501C17.5318 12.6931 18 11.385 18 10C18 6.68629 15.3137 4 12 4C8.68629 4 6 6.68629 6 10C6 11.3843 6.46774 12.6917 7.31462 13.7484C7.40004 13.855 8.12081 14.6012 8.23154 14.7218C9.22766 15.8064 9.84103 16.7984 9.97308 18ZM14 20H10V21H14V20ZM5.75395 14.9992C4.65645 13.6297 4 11.8915 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 11.8925 19.3428 13.6315 18.2443 15.0014C17.624 15.7748 16 17 16 18.5V21C16 22.1046 15.1046 23 14 23H10C8.89543 23 8 22.1046 8 21V18.5C8 17 6.37458 15.7736 5.75395 14.9992ZM13 10.0048H15.5L11 16.0048V12.0048H8.5L13 6V10.0048Z" fill="rgba(255,255,255,1)"></path></svg>
                        </div>
                    </div>

                </li>
                <li class="text-left mb-10">
                    <div class="flex flex-row items-start mb-5">
                        <div
                            class="hidden sm:flex items-center justify-center p-3 mr-3 rounded-full bg-blue-500 text-white border-4 border-white text-xl font-semibold">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" 
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M3.16113 4.46924C5.58508 2.04529 9.44716 1.93599 12.0008 4.14133C14.5528 1.93599 18.4149 2.04529 20.8388 4.46924C23.2584 6.88884 23.3716 10.7414 21.1785 13.2952L13.4142 21.0862C12.6686 21.8318 11.4809 21.8657 10.6952 21.1879L10.5858 21.0862L2.82141 13.2952C0.628282 10.7414 0.741522 6.88884 3.16113 4.46924ZM4.57534 5.88345C2.86819 7.5906 2.81942 10.3281 4.42902 12.0942L4.57534 12.2474L12 19.672L17.3026 14.368L13.7677 10.8332L12.7071 11.8939C11.5355 13.0654 9.636 13.0654 8.46443 11.8939C7.29286 10.7223 7.29286 8.82279 8.46443 7.65122L10.5656 5.54872C8.85292 4.17762 6.37076 4.24042 4.7286 5.73712L4.57534 5.88345ZM13.0606 8.71188C13.4511 8.32135 14.0843 8.32135 14.4748 8.71188L18.7168 12.9538L19.4246 12.2474C21.1819 10.4901 21.1819 7.64081 19.4246 5.88345C17.7174 4.1763 14.9799 4.12752 13.2139 5.73712L13.0606 5.88345L9.87864 9.06543C9.51601 9.42806 9.49011 9.99991 9.80094 10.3924L9.87864 10.4796C10.2413 10.8423 10.8131 10.8682 11.2056 10.5573L11.2929 10.4796L13.0606 8.71188Z">
                                    </path>
                                </svg>
                        </div>
                        <div class="bg-gray-100 p-5 px-10 w-full flex items-center">
                            <h4 class="text-md leading-6 font-medium text-gray-900">Approved Services</h4>
                        </div>
                    </div>

                    <div class="flex flex-row items-start">
                        <div class="bg-blue-100 p-5 px-10 w-full flex items-center">
                            <p class="text-gray-700 text-sm">In our community, services are approved not only by the administration but also by the community!
                            </p>
                        </div>
                        <div
                            class="hidden sm:flex items-center justify-center p-3 ml-3 rounded-full bg-blue-500 text-white border-4 border-white text-xl font-semibold">
                     
                            <svg xmlns="http://www.w3.org/2000/svg"class="h-6 w-6" viewBox="0 0 24 24"><path d="M9.97308 18H14.0269C14.1589 16.7984 14.7721 15.8065 15.7676 14.7226C15.8797 14.6006 16.5988 13.8564 16.6841 13.7501C17.5318 12.6931 18 11.385 18 10C18 6.68629 15.3137 4 12 4C8.68629 4 6 6.68629 6 10C6 11.3843 6.46774 12.6917 7.31462 13.7484C7.40004 13.855 8.12081 14.6012 8.23154 14.7218C9.22766 15.8064 9.84103 16.7984 9.97308 18ZM14 20H10V21H14V20ZM5.75395 14.9992C4.65645 13.6297 4 11.8915 4 10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10C20 11.8925 19.3428 13.6315 18.2443 15.0014C17.624 15.7748 16 17 16 18.5V21C16 22.1046 15.1046 23 14 23H10C8.89543 23 8 22.1046 8 21V18.5C8 17 6.37458 15.7736 5.75395 14.9992ZM13 10.0048H15.5L11 16.0048V12.0048H8.5L13 6V10.0048Z" fill="rgba(255,255,255,1)"></path></svg>
                        </div>
                    </div>

                </li>
            </ul>
        </div>

    </div>
</div>
        </section>
</x-app-layout>