<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
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
                <li class="text-gray-600 mr-2 font-medium2">/</li>
                <li class="text-gray-600 mr-2 font-medium2">Details</li>
            </ul>

            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile Dropdown -->
            <x-admin-profile-dropdown :user="Auth::user()" />
            <!-- End: Profile Dropdown -->

        </div>
        <!-- End: Header -->

        <!-- Start: Application Details Content -->
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-10 ml-4 mt-4 mr-4 rounded-md">

            <div class="flex justify-between mb-4 items-start">
                <!-- Heading for Application Section -->
                <div class="font-medium2">Application Details</div>
            </div>

            <!-- Display user details and document information here -->
            @foreach ($employerApplications as $application)
                <div>
                    <!-- User Details -->
                    <div class="mb-4">
                        <h3 class="text-lg font-medium mb-2">User Details</h3>
                        <p><strong>User Name:</strong> {{ $application->user->name }}</p>
                        <p><strong>Email:</strong> {{ $application->user->email }}</p>
                        <!-- Add more user details as needed -->
                    </div>

                    <!-- Document Information -->
                    <div>
                        <h3 class="text-lg font-medium mb-2">Document Information</h3>

                        <!-- Display document information based on your application structure -->

                        <div class="flex flex-col gap-4">
                            <!-- Valid ID Image -->
                            <div class="flex flex-col items-center">
                                <p><strong>Valid ID:</strong></p>
                                <img src="{{ asset('storage/application_documents/' . basename($application->valid_id)) }}"
                                    alt="Valid ID Image" class="max-w-full mb-2 h-auto">
                            </div>

                            <!-- Barangay Clearance Image -->
                            <div class="flex flex-col items-center">
                                <p><strong>Barangay Clearance:</strong></p>
                                <img src="{{ asset('storage/application_documents/' . basename($application->barangay_clearance)) }}"
                                    alt="Barangay Clearance Image" class="max-w-full mb-2 h-auto">
                            </div>

                            <!-- Latest Picture Image -->
                            <div class="flex flex-col items-center">
                                <p><strong>Latest Picture:</strong></p>
                                <img src="{{ asset('storage/application_documents/' . basename($application->latest_picture)) }}"
                                    alt="Latest Picture Image" class="max-w-full h-auto">
                            </div>
                        </div>

                        <!-- Add more document information as needed -->
                    </div>



                </div>

                <!-- Accept or Reject buttonsn -->
                <!-- Include this in your blade file where you have the Accept button -->

                <div class="flex justify-center space-x-4 mt-4 mb-4">
                    <a href="{{ route('updateIsVerified', ['user_id' => $application->user_id]) }}"
                        class="text-white mt-2 bg-blue-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        Accept
                    </a>
                    <button
                        class="text-white mt-2 bg-red-400 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">
                        Reject
                    </button>
                </div>
            @endforeach

        </div>
        <!-- End: Application Details Content -->


    </main>
</x-app-layout>
