<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- Start: Header Navigation-->
    <div class="shadow-lg bg-white">
        <div class="max-w-6xl px-4 mx-auto" x-data="{ open: false }">
            <nav class="flex items-center justify-between py-4">
                <div class="flex">
                    <x-application-logo />
                    <a href="" class="text-3xl font-bold leading-none mt-2.5">TasCo</a>
                </div>
                <div class="flex justify-between lg:space-x-9">
                    <div class="flex lg:hidden">
                        <button
                            class="flex items-center px-3 py-2 text-blue-600 border border-blue-200 rounded navbar-burger hover:text-blue-800 hover:border-blue-500 lg:hidden"
                            @click="open =true">

                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                <path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z" fill="rgba(70,146,221,1)">
                                </path>
                            </svg>
                        </button>
                    </div>
                    <ul class="hidden lg:w-auto lg:space-x-9 lg:items-center lg:flex">
                        <li><a href="{{ route('app.home') }}" class="nav-a text-sm font-medium">Home</a></li>

                        @if (auth()->user()->role == 'user' && auth()->user()->is_verified == 1)
                            <li><a href="{{ route('user.dashboard') }}" class="nav-a text-sm font-medium">Employer
                                    Dashboard</a></li>
                        @elseif(auth()->user()->role == 'worker' && auth()->user()->is_verified == 1)
                            <li><a href="{{ route('worker.dashboard') }}" class="nav-a text-sm font-medium">Job Seeker
                                    Dashboard</a></li>
                        @endif

                        <li><a href="{{ route('app.jobListing') }}" class="nav-a text-sm font-medium">Job Listing</a>
                        </li>
                        <li><a href="{{ route('app.aboutUs') }}" class="nav-a text-sm font-medium">About Us</a></li>
                    </ul>

                    <x-user-profile />
                </div>
            </nav>

            <!-- Start: Navigation Mobile Sidebar -->
            <div class="fixed inset-0 w-full bg-gray-900 opacity-25 lg:hidden"
                :class="{
                    'translate-x-0 ease-in-opacity-100': open ===
                        true,
                    '-translate-x-full ease-out opacity-0': open === false
                }">
            </div>

            <div class="absolute inset-0 z-50 h-screen p-3 text-gray-400 duration-500 transform bg-blue-50 w-80 lg:hidden lg:transform-none lg:relative"
                :class="{
                    'translate-x-0 ease-in-opacity-100': open ===
                        true,
                    '-translate-x-full ease-out opacity-0': open === false
                }">

                <div class="flex justify-between lg:hidden">
                    <a class="p-2 text-4xl font-bold text-gray-700" href="#">TasCo</a>
                    <button class="p-2 text-gray-700 rounded-md hover:text-blue-300 lg:hidden " @click="open=false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                            <path
                                d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM12 10.5858L14.8284 7.75736L16.2426 9.17157L13.4142 12L16.2426 14.8284L14.8284 16.2426L12 13.4142L9.17157 16.2426L7.75736 14.8284L10.5858 12L7.75736 9.17157L9.17157 7.75736L12 10.5858Z">
                            </path>
                        </svg>
                    </button>
                </div>

                <!-- Start: Nav List -->
                <ul class="px-4 text-left mt-7">
                    <li class="pb-3">
                        <a href="{{ route('app.home') }}" class="text-sm text-gray-700 hover:text-blue-400">Home</a>
                    </li>

                    @if (auth()->check())
                        @if (auth()->user()->role == 'user' && auth()->user()->is_verified == 1)
                            <li class="pb-3">
                                <a href="{{ route('user.dashboard') }}"
                                    class="text-sm text-gray-700 hover:text-blue-400">Employer Dashboard</a>
                            </li>
                        @elseif(auth()->user()->role == 'worker' && auth()->user()->is_verified == 1)
                            <li class="pb-3">
                                <a href="{{ route('worker.dashboard') }}"
                                    class="text-sm text-gray-700 hover:text-blue-400">Job Seeker Dashboard</a>
                            </li>
                        @endif
                    @endif

                    <li class="pb-3">
                        <a href="{{ route('app.jobListing') }}" class="text-sm text-gray-700 hover:text-blue-400">Job
                            Listing</a>
                    </li>

                    <li class="pb-3">
                        <a href="{{ route('app.aboutUs') }}" class="text-sm text-gray-700 hover:text-blue-400">About
                            Us</a>
                    </li>
                </ul>
                <ul class="px-4 mt-10">
                    <li class="pb-3 flex items-center">
                        <i class="ri-user-fill text-blue-400 text-lg mr-2"></i>
                        @if (Auth::user()->role == 'user' && Auth::user()->is_verified == 0)
                            <a href="{{ route('user.profile') }}"
                                class="text-sm text-black hover:text-blue-400">Profile</a>
                        @elseif (Auth::user()->role == 'user' && Auth::user()->is_verified == 1)
                            <a href="{{ route('user.profile') }}"
                                class="text-sm text-black hover:text-blue-400">Profile</a>
                        @elseif (Auth::user()->role == 'worker' && Auth::user()->is_verified == 1)
                            <a href="{{ route('worker.profile') }}"
                                class="text-sm text-black hover:text-blue-400">Profile</a>
                        @endif
                    </li>
                    <li class="pb-3 flex items-center">
                        <i class="ri-settings-fill text-blue-400 text-lg mr-2"></i>
                        <a href="{{ route('app.settings') }}"
                            class="text-sm text-black hover:text-blue-400">Settings</a>
                    </li>
                    <li class="pb-3 flex items-center">
                        <i class="ri-logout-box-line text-blue-400 text-lg mr-2"></i>
                        <a href="{{ route('logout') }}" class="text-sm text-black hover:text-blue-400"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                    </li>

                    <!-- Add this form at the end of your HTML, typically near the closing </body> tag -->
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>

                </ul>
                <!-- End: Nav List -->
            </div>
            <!-- End: Navigation Mobile Sidebar -->
        </div>
    </div>
    <!-- End: Header Navigation-->
</nav>
