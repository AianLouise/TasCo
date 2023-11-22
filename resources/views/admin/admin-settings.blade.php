<x-app-layout>
    <!-- Start: Main Content -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-blue-50 min-h-screen transition-all main">

        <!-- Start: Header -->
        <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">

            <!-- Start: Logo / Active Menu -->
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-2-line"></i>
            </button>

            <ul class="flex items-center text-sm ml-4">
                <li class="mr-2">
                    <a href="#" class="text-gray-800 hover:text-gray-600 font-medium2">TasCo</a>
                </li>
                <li class="text-gray-600 mr-2 font-medium2">/</li>
                <li class="text-gray-600 mr-2 font-medium2">Settings</li>
            </ul>

            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile -->
            <x-admin-profile-dropdown :user="Auth::user()" />
            <!-- End: Profile -->

        </div>
        <!-- End: Header -->
        <!-- Start: Audit Trail Content -->
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-7 ml-4 mt-4 mr-4 rounded-md">
            <div class="flex justify-between mb-4 items-start">
                <!-- Heading for Audit Trail Section -->
                <div class="font-medium2">General Settings</div>
            </div>

            <div class="overflow-x-auto">
                <!-- Audit Trail Table -->
                
            </div>
        </div>
        <!-- End: Audit Trail Table -->
    </main>
    <!-- End: Main -->
</x-app-layout>
