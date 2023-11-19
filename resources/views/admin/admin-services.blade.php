<x-app-layout>
    <!-- Start: Main Content -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-blue-50 min-h-screen transition-all main">

        <!-- Start: Header -->
        <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">

            <!-- Start: Logo / Active Menu -->
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-2-line"></i>
            </button>

            <!-- Breadcrumb Navigation -->
            <ul class="flex items-center text-sm ml-4">
                <li class="mr-2">
                    <a href="#" class="text-gray-800 hover:text-gray-600 font-medium2">TasCo</a>
                </li>
                <li class="text-gray-600 mr-2 font-medium2">/</li>
                <li class="text-gray-600 mr-2 font-medium2">Services</li>
            </ul>

            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile Dropdown -->
            <x-admin-profile-dropdown :user="Auth::user()" />
            <!-- End: Profile Dropdown -->

        </div>
        <!-- End: Header -->

        <!-- Start: Service Content -->
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-10 ml-4 mt-4 mr-4 rounded-md">
            <div class="flex justify-between mb-4 items-start">
                <!-- Heading for Service Section -->
                <div class="font-medium2">Services</div>
            </div>

            <div class="overflow-x-auto">
                <!-- Service Table -->
                <table class="w-full min-w-[540px]">
                    <thead>
                        <!-- Table Header -->
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Employer
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200 ">
                        <!-- Loop through each service to populate table rows -->
                        @foreach ($services as $serv)
                            <tr>
                                <!-- Title Column -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                    {{ Illuminate\Support\Str::limit($serv->title, $limit = 30, $end = '...') }}
                                </td>

                                <!-- Description Column -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                    {{ Illuminate\Support\Str::limit($serv->description, $limit = 30, $end = '...') }}
                                </td>

                                <!-- Category Column -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                    {{ $serv->category->name }}
                                </td>

                                <!-- Employer Column -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                    {{ $serv->provider->name }}
                                </td>

                                <!-- Price Column -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                    {{ $serv->price }}
                                </td>

                                <!-- Action Column -->
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium2 ">
                                    <!-- Edit and Delete Links -->
                                    <a href="editUser.html" class="text-blue-400 hover:text-blue-600">Edit</a>
                                    <span class="text-gray-600">/</span>
                                    <a href="#" class="text-gray-600 hover:text-gray-600">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End: Service Table -->
    </main>
    <!-- End: Main Content -->
</x-app-layout>
