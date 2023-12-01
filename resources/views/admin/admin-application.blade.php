<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
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

        <!-- Start: Application Content -->
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-10 ml-4 mt-4 mr-4 rounded-md">
            <div class="flex justify-between mb-4 items-start">
                <!-- Heading for Application Section -->
                <div class="font-medium2">Employer Application</div>
            </div>

            <div class="overflow-x-auto max-h-[240px]">
                <!-- Application Table -->
                <table class="w-full min-w-[540px]">
                    <thead>
                        <!-- Table Header -->
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Pending Application
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Author
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Date Posted
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Loop through each employer application to populate table rows -->
                        @foreach ($employerApplications as $application)
                            <tr>
                                <!-- Application Info -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-6">
                                            <i class="ri-attachment-2"></i>
                                        </div>
                                        <div class="ml-4">
                                            <!-- Application Title -->
                                            <div class="text-sm font-medium text-gray-900">
                                                User No.{{ $application->user_id }} Application for Employer
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <!-- Author Column -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                                    <i class="ri-user-3-line mr-1"></i> {{ $application->user->name }}
                                </td>
                                <!-- Date Posted Column -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                                    <i class="ri-time-line mr-1"></i> {{ $application->created_at->diffForHumans() }}
                                </td>
                                <!-- Status Column -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                                     status
                                </td>
                                <!-- Action Column -->
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <!-- View and Delete Links -->
                                    <a href="{{ route('admin.employerapplication', ['id' => $application->id]) }}" class="text-blue-400 hover:text-blue-600">View</a>
                                    {{-- <span class="text-gray-600">/</span> --}}
                                    {{-- <a href="{{ route('delete.application', ['id' => $application->id]) }}" class="text-gray-600 hover:text-gray-600">Delete</a> --}}
                                </td>                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End: Application Table -->


        <!-- Start: Documents Content -->
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-10 ml-4 mt-4 mr-4 rounded-md">
            <div class="flex justify-between mb-4 items-start">
                <!-- Heading for Application Section -->
                <div class="font-medium2">Job Seeker Application</div>
            </div>

            <div class="overflow-x-auto max-h-[240px]">
                <!-- Application Table -->
                <table class="w-full min-w-[540px]">
                    <thead>
                        <!-- Table Header -->
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Pending Application
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Author
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Date Posted
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Loop through each employer application to populate table rows -->
                        @foreach ($jobseekerApplications as $application)
                            <tr>
                                <!-- Application Info -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 w-6">
                                            <i class="ri-attachment-2"></i>
                                        </div>
                                        <div class="ml-4">
                                            <!-- Application Title -->
                                            <div class="text-sm font-medium text-gray-900">
                                                User No.{{ $application->user_id }} Application for Job Seeker
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <!-- Author Column -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                                    <i class="ri-user-3-line mr-1"></i> {{ $application->user->name }}
                                </td>
                                <!-- Date Posted Column -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                                    <i class="ri-time-line mr-1"></i> {{ $application->created_at->diffForHumans() }}
                                </td>
                                <!-- Action Column -->
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <!-- View and Delete Links -->
                                    <a href="{{ route('admin.employerapplication', ['id' => $application->id]) }}" class="text-blue-400 hover:text-blue-600">View</a>
                                    {{-- <span class="text-gray-600">/</span> --}}
                                    {{-- <a href="{{ route('delete.application', ['id' => $application->id]) }}" class="text-gray-600 hover:text-gray-600">Delete</a> --}}
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End: Application Table -->
    </main>
    <!-- End: Main Content -->
</x-app-layout>
