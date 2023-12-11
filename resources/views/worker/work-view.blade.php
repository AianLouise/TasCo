<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    <style>
        .height {
            height: 100%;
        }

        .width {
            width: 60vw;
        }
    </style>

    <body>

        <!-- Project Page -->
        <section class="flex justify-center height w-full">
            <div id="ProjectPage" class="m-2 mt-10 sm:m-10 w-full sm:w-1/2 ">
                <div class="container px-4 sm:px-16 sm:py-2.5 bg-white rounded-xl shadow-xl mt-32 sm:mt-0">
                    <div class="rounded-md sm:flex sm:items-start justify-center pt-10 pb-4 sm:pb-2">
                        <div class="grid sm:flex sm:flex-col justify-center items-center">
                            @if ($user->avatar == 'avatar.png')
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF"
                                    alt=""
                                    class="sm:w-40 hover:w-48 w-52 h-auto transition-all rounded-full shadow-md avatarimg -mt-40 sm:mt-4 sm:mb-4">
                            @else
                                <img src="{{ asset('storage/users-avatar/' . basename($user->avatar)) }}" alt=""
                                    class="sm:w-40 w-52 h-auto transition-all rounded-full shadow-md avatarimg mb-4">
                            @endif
                            <!-- Message Button -->
                            <button
                                class="bg-blue-500 text-white px-4 sm:px-12 py-2 rounded mt-4 sm:mt-4 mb-2 sm:mb-0 hover:bg-blue-800 transition-colors">Message</button>
                        </div>

                        <div
                            class="sm:ml-10 mt-4 bg-blue-100 p-4 sm:p-6 divide-y-2 divide-gray-500 rounded-xl shadow-md">
                            <h2 class="text-xl font-medium text-gray-800 mb-2">Employer Name: <span
                                    class="text-blue-600 text-lg"> {{ $user->name }}</span></h2>
                            <h2 class="text-xl font-medium text-gray-800 mb-2">Email: <span
                                    class="text-blue-600 text-lg">{{ $user->email }}</h2>
                            <h2 class="text-xl font-medium text-gray-800 mb-2">Address: <span
                                    class="text-blue-600 text-lg">{{ $user->address }}</h2>
                            <h2 class="text-xl font-medium text-gray-800 mb-2">Phone: <span
                                    class="text-blue-600 text-lg">{{ $user->phone }}</h2>
                        </div>
                    </div>

                    <!-- New Section for Project Information with Styled Design -->
                    <div class="bg-white rounded-md mt-2 text-center">
                        <h2 class="text-2xl font-bold text-gray-800 pb-4">Project Information</h2>
                        <div class="">
                            @if ($hiringForm)
                                <div class="p-2 sm:p-10 rounded-lg bg-gray-100">
                                    <div class="w-full mb-2 grid grid-flow-row-dense grid-cols-3">
                                        <p class="block text-md sm:text-xl text-left font-medium text-gray-700 pt-2">
                                            Title:</p>
                                        <input type="text" name="Username" id="Username"
                                            placeholder="Enter UserName"
                                            class="mt-1 p-2 w-full border rounded-md text-xs text-center col-span-2"
                                            value="{{ $hiringForm->projectTitle }}" disabled>
                                    </div>
                                    <div class="w-full mb-2 grid grid-flow-row-dense grid-cols-3">
                                        <p class="block text-md sm:text-xl text-left font-medium text-gray-700 pt-2">
                                            Description:</p>
                                        <input type="text" name="Username" id="Username"
                                            placeholder="Enter UserName"
                                            class="mt-1 p-2 w-full border rounded-md text-xs text-center col-span-2"
                                            value="{{ $hiringForm->projectDescription }}" disabled>
                                    </div>
                                    <div class="w-full mb-2 grid grid-flow-row-dense grid-cols-3">
                                        <p class="block  text-md sm:text-xl text-left font-medium text-gray-700 pt-2">
                                            Start Date:</p>
                                        <input type="text" name="Username" id="Username"
                                            placeholder="Enter UserName"
                                            class="mt-1 p-2 w-full border rounded-md text-xs text-center col-span-2"
                                            value="{{ $hiringForm->startDate->format('l, F j, Y') }}" disabled>
                                    </div>
                                    <div class="w-full mb-2 grid grid-flow-row-dense grid-cols-3">
                                        <p class="block  text-md sm:text-xl text-left font-medium text-gray-700 pt-2">
                                            End Date:</p>
                                        <input type="text" name="Username" id="Username"
                                            placeholder="Enter UserName"
                                            class="mt-1 p-2 w-full border rounded-md text-xs text-center col-span-2"
                                            value="{{ $hiringForm->endDate->format('l, F j, Y') }}" disabled>
                                    </div>


                                </div>
                            @else
                                <p>No project information available.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Buttons Section -->
                    <div class="flex justify-center mt-4 sm:mt-10 space-x-4 mb-9">
                        @if ($hiringForm->status === 'Accepted' || $event->status === 'Pending')
                            @if (\Carbon\Carbon::parse($event->start)->isToday())
                                <a href="{{ route('startWorking', ['hiringFormId' => $hiringForm->id, 'eventId' => $event->id]) }}"
                                    class="bg-blue-500 text-white px-4 py-2 rounded">
                                    Start Working
                                </a>
                            @else
                                <span class="text-red-600 bg-gray-200 p-4 rounded-lg mb-4">You can only start working on
                                    the
                                    day of the work.</span>
                            @endif
                        @elseif ($hiringForm->status === 'Ongoing' && $event->status === 'Ongoing')
                            <div class="grid grid-rows-1 sm:grid-cols-2 gap-4">
                                <button id="helpBtn"
                                    class="bg-red-500 text-white px-10 py-2 rounded hover:bg-red-900 transition-colors">
                                    Help
                                </button>
                                <button id="finishBtn"
                                    class="bg-blue-500 text-white px-10 py-2 rounded hover:bg-blue-800 transition-colors">
                                    <i class="ri-check-fill mr-2"></i>Finish
                                </button>
                            </div>
                        @elseif ($event->status === 'Done')
                        <div class="flex flex-col items-center">
                            <h1 class="text-2xl font-bold mb-4">Documentation</h1>
                            <div class="flex justify-between">
                                <div class="w-1/3">
                                    <img src="{{ asset('storage/documentation/' . basename($event->employment->image1)) }}" alt="Image">
                                </div>
                                <div class="w-1/3 flex flex-col items-center">
                                    <img src="{{ asset('storage/documentation/' . basename($event->employment->image2)) }}" alt="Image">
                                </div>
                                <div class="w-1/3">
                                    <img src="{{ asset('storage/documentation/' . basename($event->employment->image3)) }}" alt="Image">
                                </div>
                            </div>
                        </div>
                        
                        @endif
                    </div>


                </div>
            </div>
        </section>
        <div id="HelpPage" class="hidden items-center justify-center h-screen mx-10">
            <div class="container mx-auto p-4 bg-white ">
                Help Page
            </div>
        </div>


        <div id="uploadDocumentationPage" class="hidden items-center justify-center h-screen mx-10 mt-10">
            <div class="container mx-auto p-4 bg-white">
                <div class="text-center bg-white p-8 rounded-md height flex flex-col justify-center">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Upload Documentation</h2>
                    <div class="max-h-60 overflow-y-auto mb-4">
                        <!-- Add your form elements for uploading requirements here -->
                        <form id="uploadRequirementsForm" method="POST"
                            action="{{ route('uploadDocumentation', ['id' => $hiringForm->id, 'eventId' => $event->id]) }}"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Update the label and name for Image 1 -->
                            <label for="image1">Image 1:</label>
                            <input type="file" id="image1" name="image1" accept="image/*">

                            <!-- Update the label and name for Image 2 -->
                            <label for="image2">Image 2:</label>
                            <input type="file" id="image2" name="image2" accept="image/*">

                            <!-- Update the label and name for Image 3 -->
                            <label for="image3">Image 3:</label>
                            <input type="file" id="image3" name="image3" accept="image/*">

                            <!-- Add some spacing for the job description -->
                            <div class="mt-4"></div>

                            <!-- Add the job description textbox -->
                            {{-- <label for="jobDescription">Job Description:</label>
                            <textarea id="jobDescription" name="jobDescription" class="w-full p-2 border rounded"
                                placeholder="Enter job description here"></textarea> --}}

                            <!-- Update the button type to "submit" -->
                            <button type="submit" id="submitBtn"
                                class="bg-blue-500 text-white py-2 px-3 rounded-full inline-block hover:bg-blue-700 transition duration-300 text-sm w-60 mx-auto">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </body>


    <!-- Place this script at the end of your Blade file or in a separate JS file -->
    <script>
        document.getElementById('helpBtn').addEventListener('click', function() {
            // Hide the welcome page
            document.getElementById('ProjectPage').classList.add('hidden');

            // Show the Terms and Conditions page
            document.getElementById('HelpPage').classList.remove('hidden');
        });

        document.getElementById('finishBtn').addEventListener('click', function() {
            // Hide the Terms and Conditions page
            document.getElementById('ProjectPage').classList.add('hidden');

            // Show the Upload Requirements page
            document.getElementById('uploadDocumentationPage').classList.remove('hidden');
        });

        // Update the event listener for the 'Submit' button
        document.getElementById('submitBtn').addEventListener('click', function() {
            // Get the form element
            const form = document.getElementById('uploadDocumentationPage');

            // Submit the form
            form.submit();
        });
    </script>

</x-app-layout>
