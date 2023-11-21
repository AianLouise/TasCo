<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">

    <!-- Start: Header Navigation-->
    <div class="shadow-lg">
        <div class="max-w-6xl px-4 mx-auto" x-data="{ open: false }">
            <nav class="flex items-center justify-between py-2">
                <div class="flex">
                    <x-application-logo />
                    <a href="" class="text-3xl font-bold px-1 leading-none mt-2.5">TasCo</a>
                </div>
                <div class="flex justify-between lg:space-x-9">
                    <div class="flex lg:hidden">
                        <button
                            class="flex items-center px-3 py-2 text-blue-600 rounded navbar-burger hover:border-blue-500 lg:hidden"
                            @click="open =true">

                            <svg width="18" height="18" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M3 4H21V6H3V4ZM3 11H21V13H3V11ZM3 18H21V20H3V18Z"></path></svg>
                        </button>
                    </div>
                    <ul class="hidden lg:w-auto lg:space-x-9 lg:items-center lg:flex">
                        <li><a href="{{ route('user.home') }}" class="nav-a text-sm font-medium">Home</a>
                        </li>
                        <li><a href="" class="nav-a text-sm font-medium">Profile</a>
                        </li>
                        <li><a href="{{ route('user.settings') }}" class="nav-a text-sm font-medium">Settings</a>
                        </li>
                    </ul>

                    <div class="items-center hidden pl-2 ml-auto mr-8 lg:flex lg:ml-0 lg:mr-0">
                        <form>
                            <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                            <div class="relative">
                                <input type="search"
                                    class="block w-full  ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                    placeholder="Search..." required>
                                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                        <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">

                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"><path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z" fill="rgba(173,184,194,1)"></path></svg>
                                        
                                        </button>
                                    </span>

                                </button>
                            </div>
                        </form>
                        <x-user-profile />
                    </div>
                    
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
                        <a href="{{ route('user.home') }}" class="text-sm text-gray-700 hover:text-blue-400">Home</a>
                    </li>
                    <li class="pb-3">
                        <a href="" class="text-sm text-gray-700 hover:text-blue-400">Profile</a>
                    </li>
                    <li class="pb-3">
                        <a href="{{ route('user.settings') }}"
                            class="text-sm text-gray-700 hover:text-blue-400">Settings</a>
                    </li>
                </ul>
                <form class="px-3">
                    <label for="search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
                    <div class="relative">
                        <input type="search"
                            class="block w-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Search..." required>
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                    <button type="submit" class="p-1 focus:outline-none focus:shadow-outline">

                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" viewBox="0 0 24 24"><path d="M18.031 16.6168L22.3137 20.8995L20.8995 22.3137L16.6168 18.031C15.0769 19.263 13.124 20 11 20C6.032 20 2 15.968 2 11C2 6.032 6.032 2 11 2C15.968 2 20 6.032 20 11C20 13.124 19.263 15.0769 18.031 16.6168ZM16.0247 15.8748C17.2475 14.6146 18 12.8956 18 11C18 7.1325 14.8675 4 11 4C7.1325 4 4 7.1325 4 11C4 14.8675 7.1325 18 11 18C12.8956 18 14.6146 17.2475 15.8748 16.0247L16.0247 15.8748Z" fill="rgba(173,184,194,1)"></path></svg>
                                    
                                    </button>
                                </span>
                    </div>
                </form>
                <!-- End: Nav List -->
            </div>
            <!-- End: Navigation Mobile Sidebar -->
        </div>
    </div>
    <!-- End: Header Navigation-->
</nav>
