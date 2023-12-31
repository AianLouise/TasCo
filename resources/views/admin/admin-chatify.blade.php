<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    <!-- Start: Main Content -->
    <!-- Include Chatify Styles -->
    <link href="{{ asset('css/chatify/style.css') }}" rel="stylesheet" />
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <!-- Start: Header -->
        <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">
            
            <!-- Start: Logo / Active Menu -->
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-2-line"></i>
            </button>

            <ul class="flex items-center text-sm ml-4">
                <li class="mr-2">
                    <a href="#" class="text-gray-800 hover:text-gray-400 font-medium2">TasCo</a>
                </li>
                <li class="text-gray-600 mr-2 font-medium2">/</li>
                <li class="text-gray-600 mr-2 font-medium2">Chatify</li>
            </ul>
            
            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile -->
            <!-- Include Admin Profile Dropdown Component -->
            <x-admin-profile-dropdown :user="Auth::user()" />
            <!-- End: Profile -->

        </div>
        <!-- End: Header -->

        <!-- Include Chatify Component with User ID -->
        <x-chatify :id="auth()->user()->id" />

    </main>
    <!-- End: Main -->
</x-app-layout>
