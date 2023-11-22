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
        <!-- Start: General Settings Content -->
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-7 ml-10 mt-4 mr-10 rounded-md">
            <div class="flex justify-between mb-4 items-start">
                <!-- Heading for Audit Trail Section -->
                <div class="font-medium2">General Settings</div>
            </div>

            <div class="overflow-x-auto">
                <!-- Site Settings -->

                <!-- Site Name -->
                <div class="mb-2 sm:mb-6">
                    <!-- Label and Input for Site Name -->
                    <label for="address" class="block mb-2 text-sm font-medium text-indigo-900">Site Name:</label>
                    <input type="text" id="address" name="address"
                        class="border text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                        placeholder="Site Name" value="" required>
                </div>

                <!-- Site Description -->
                <div class="mb-2 sm:mb-6">
                    <!-- Label and Textarea for Site Description -->
                    <label for="address" class="block mb-2 text-sm font-medium text-indigo-900">Site
                        Description:</label>
                    <textarea id="address" name="address"
                        class="border text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                        placeholder="Site Description" required></textarea>
                </div>

                <!-- Submit Button -->
                <div class="flex justify-center">
                    <button type="submit"
                        class="text-white mt-2 bg-blue-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        Submit
                    </button>
                </div>
            </div>
        </div>
        <!-- End: General Settings Content -->

    </main>
    <!-- End: Main -->
</x-app-layout>
