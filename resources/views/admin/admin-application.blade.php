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
                <li class="text-gray-600 mr-2 font-medium2">Application</li>
            </ul>

            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile Dropdown -->
            <x-admin-profile-dropdown :user="Auth::user()" />
            <!-- End: Profile Dropdown -->

        </div>
        <!-- End: Header -->

        <!-- Start: Documents Content -->
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-10 ml-4 mt-4 mr-4 rounded-md">
            <div class="flex justify-between mb-4 items-start">
                <!-- Heading for Application Section -->
                <div class="font-medium2">Application</div>
            </div>

            <div class="overflow-x-auto">
                <!-- Application Table -->
                <table class="w-full min-w-[540px]">
                    <thead>
                        <!-- Table Header -->
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Pending Application
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Author
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Date Posted
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 ">
                        <!-- Loop through each application to populate table rows -->
                        <tr>
                            <!-- Application Info -->
                            <td class="px-6 py-4 whitespace-nowrap ">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-6">
                                        <i class="ri-attachment-2 "></i>
                                    </div>
                                    <div class="ml-4">
                                        <!-- Application Title -->
                                        <div class="text-sm font-medium text-gray-900">
                                            User No.1 Application for Job Seeking
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <!-- Author Column -->
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                                <i class="ri-user-3-line mr-1"></i> Sample User
                            </td>
                            <!-- Date Posted Column -->
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                                <i class="ri-time-line mr-1"></i> 24 hrs ago
                            </td>
                            <!-- Action Column -->
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium ">
                                <!-- View and Delete Links -->
                                <a href="editUser.html" class="text-blue-400 hover:text-blue-600">View</a>
                                <span class="text-gray-600">/</span>
                                <a href="#" class="text-gray-600 hover:text-gray-600">Delete</a>
                            </td>
                        </tr>

                        <tr>
                            <!-- Application Info -->
                            <td class="px-6 py-4 whitespace-nowrap ">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 w-6">
                                        <i class="ri-attachment-2 "></i>
                                    </div>
                                    <div class="ml-4">
                                        <!-- Application Title -->
                                        <div class="text-sm font-medium text-gray-900">
                                            User No.1 Application for Job Seeking
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <!-- Author Column -->
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                                <i class="ri-user-3-line mr-1"></i> Sample User
                            </td>
                            <!-- Date Posted Column -->
                            <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                                <i class="ri-time-line mr-1"></i> 24 hrs ago
                            </td>
                            <!-- Action Column -->
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium ">
                                <!-- View and Delete Links -->
                                <a href="editUser.html" class="text-blue-400 hover:text-blue-600">View</a>
                                <span class="text-gray-600">/</span>
                                <a href="#" class="text-gray-600 hover:text-gray-600">Delete</a>
                            </td>
                        </tr>

                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End: Application Table -->
    </main>
    <!-- End: Main Content -->
</x-app-layout>
