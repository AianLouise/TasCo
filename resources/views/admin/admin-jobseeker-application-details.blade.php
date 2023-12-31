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
        <section class="flex justify-center">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-10 ml-4 mt-4 mr-4 rounded-md text-center sm:text-start w-full sm:w-1/2 ">

            <div class="grid grid-rows-1 sm:grid-cols-2 border-b pb-4">
                <!-- Heading for Application Section -->
                
                <div class="text-2xl font-semibold text-blue-400">Application Details</div>
                <input type="text" placeholder="Find Application" class="rounded-md border-blue-400 mt-4 sm:m-0 ">
            </div>

            <!-- Display user details and document information here -->
            @foreach ($jobseekerApplications as $application)
                <div>
                    <!-- User Details -->
                    <div class="mb-4 bg-blue-100 p-4 rounded-md mt-4">
                        {{-- <h3 class="text-lg font-semibold text-blue-400 mb-2">User Details</h3> --}}
                        <div class="w-full mb-2">
                            <label for="Username" class="block text-xs font-medium text-gray-700">User Name</label>
                            <input type="text" name="Username" id="Username"
                                placeholder="Enter UserName"
                                class="mt-1 p-2 w-full border rounded-md text-xs text-center"
                                value="{{ $application->user->name }}" disabled>
                        </div>    
                        <div class="w-full mb-2">
                            <label for="Email" class="block text-xs font-medium text-gray-700">Email</label>
                            <input type="text" name="Email" id="Email"
                                placeholder="Enter UserName"
                                class="mt-1 p-2 w-full border rounded-md text-xs text-center"
                                value=" {{ $application->user->email }}" disabled>
                        </div> 
                        <div class="w-full mb-2">
                            <label for="role" class="block text-xs font-medium text-gray-700">Applying for Role:</label>
                            <input type="text" name="role" id="role"
                                placeholder="Enter UserName"
                                class="mt-1 p-2 w-full border rounded-md text-xs text-center text-blue-500 font-bold"
                                value="Job Seeker" disabled>
                        </div> 
                    
                        <!-- Add more user details as needed -->
                    </div>

                    <!-- Document Information -->
                    <div>
                        <h3 class="text-lg font-semibold mb-2 border-b pb-4 text-blue-400">User's Attachments</h3>

                        <!-- Display document information based on your application structure -->

                        <div class="grid grid-rows-1 gap-4 p-4 mt-6 sm:grid-cols-3 sm:text-start text-center items-center bg-blue-100 rounded-md">
                            <!-- Resume Image -->
                            <div class="">
                                <p><strong><i class="ri-article-line text-lg font-bold"></i>  Resume:</strong></p>
                                <a href="{{ asset('storage/application_documents/' . basename($application->resume)) }}"
                                    data-lightbox="resume">
                                    <img src="{{ asset('storage/application_documents/' . basename($application->resume)) }}"
                                        alt="Resume Image" class="max-w-full mb-2 h-auto border-2 border-gray-500 rounded-lg p-4 hover:p-1 transition-all">
                                </a>
                            </div>

                            <!-- Valid ID Image -->
                            <div class="">
                                <p class="text-gray-700"><strong><i class="ri-bank-card-2-line text-lg font-bold"></i>  Valid ID:</strong></p>
                                <a href="{{ asset('storage/application_documents/' . basename($application->valid_id)) }}"
                                    data-lightbox="valid-id">
                                    <img src="{{ asset('storage/application_documents/' . basename($application->valid_id)) }}"
                                        alt="Valid ID Image" class="max-w-full mb-2 h-auto border-2 border-gray-500 rounded-lg p-4 hover:p-1 transition-all">
                                </a>
                            </div>

                            <!-- Barangay Clearance Image -->
                            <div class="">
                                <p class="text-sm"><strong><i class="ri-bill-line text-lg font-bold"></i>  Barangay Clearance:</strong></p>
                                <a href="{{ asset('storage/application_documents/' . basename($application->barangay_clearance)) }}"
                                    data-lightbox="barangay-clearance">
                                    <img src="{{ asset('storage/application_documents/' . basename($application->barangay_clearance)) }}"
                                        alt="Barangay Clearance Image" class="w-full max-w-full mb-2 h-auto border-2 border-gray-500 rounded-lg p-4 hover:p-1 transition-all">
                                </a>
                            </div>

                            <!-- Police Clearance Image -->
                            <div class="">
                                <p><strong><i class="ri-file-lock-line text-lg font-bold"></i>  Police Clearance:</strong></p>
                                <a href="{{ asset('storage/application_documents/' . basename($application->police_clearance)) }}"
                                    data-lightbox="police-clearance">
                                    <img src="{{ asset('storage/application_documents/' . basename($application->police_clearance)) }}"
                                        alt="Police Clearance Image" class="max-w-full mb-2 h-auto border-2 border-gray-500 rounded-lg p-4 hover:p-1 transition-all">
                                </a>
                            </div>

                            <!-- Latest Picture Image -->
                            <div class="">
                                <p><strong><i class="ri-account-box-line text-lg font-bold"></i> Latest Picture:</strong></p>
                                <a href="{{ asset('storage/application_documents/' . basename($application->latest_picture)) }}"
                                    data-lightbox="latest_picture">
                                    <img src="{{ asset('storage/application_documents/' . basename($application->latest_picture)) }}"
                                    alt="Latest Picture Image" class="max-w-full h-auto mb-2 border-2 border-gray-500 rounded-lg p-4 hover:p-1 transition-all">
                                </a>
                            </div>

                            {{-- <div class="">
                                <p><strong><i class="ri-account-box-line text-lg font-bold"></i>Filler:</strong></p>
                                <a href="{{ asset('storage/application_documents/' . basename($application->latest_picture)) }}"
                                    data-lightbox="latest_picture">
                                    <img src="{{ asset('storage/application_documents/' . basename($application->latest_picture)) }}"
                                    alt="Latest Picture Image" class="max-w-full h-auto mb-2 border-2 border-gray-500 rounded-lg p-4 hover:p-1 transition-all">
                                </a>
                            </div> --}}
                        </div>

                        <!-- Add more document information as needed -->
                    </div>



                </div>

                <!-- Accept or Reject buttonsn -->
                <!-- Include this in your blade file where you have the Accept button -->

                @if ($application->status != 'Accepted' && $application->status != 'Rejected')
                    <div class="flex justify-center space-x-4 mt-4 mb-4 border-b-2 border-dashed border-gray-500 pb-6">
                        <a href="{{ route('updateIsVerifiedJobSeeker', ['user_id' => $application->user_id, 'id' => $application->id]) }}"
                            class="text-blue-400 mt-2 bg-white border-blue-500 border hover:bg-green-400 hover:text-white hover:border-white  hover:px-10   focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center transition-all">
                            Accept
                        </a>
                        <a href="{{ route('updateIsRejectedJobSeeker', ['user_id' => $application->user_id, 'id' => $application->id]) }}"
                            class="text-blue-400 mt-2 bg-white border-blue-500 border hover:bg-red-800 hover:text-white hover:border-white hover:px-10 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center transition-all">
                            Reject
                        </a>
                    </div>
                @endif
            @endforeach

        </div>
        <!-- End: Application Details Content -->

    </section>
    </main>
</x-app-layout>
