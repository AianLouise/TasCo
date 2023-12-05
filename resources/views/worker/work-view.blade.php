<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    <style>
        .height {
            height: 90vh;
        }

        .width {
            width: 80vw;
        }
    </style>

    <!-- Project Page -->
    <div id="ProjectPage" class="flex items-center justify-center h-screen mx-10">
        <div class="container mx-auto p-4 bg-white ">
            <div class="p-8 rounded-md flex items-start justify-center pt-10">
                <div class="mr-10 ml-20 flex flex-col items-center">
                    @if ($user->avatar == 'avatar.png')
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF"
                            alt="" class="w-40 h-auto transition-all rounded-full shadow-xl avatarimg mb-4">
                    @else
                        <img src="{{ asset('storage/users-avatar/' . basename($user->avatar)) }}" alt=""
                            class="w-40 h-auto transition-all rounded-full shadow-xl avatarimg mb-4">
                    @endif
                    <!-- Message Button -->
                    <button class="bg-blue-500 text-white px-4 py-2 rounded mt-2">Message</button>
                </div>

                <div class="ml-10 pt-4">
                    <h2 class="text-xl font-medium text-gray-800 mb-2">Employer Name: {{ $user->name }}</h2>
                    <h2 class="text-xl font-medium text-gray-800 mb-2">Email: {{ $user->email }}</h2>
                    <h2 class="text-xl font-medium text-gray-800 mb-2">Address: {{ $user->address }}</h2>
                    <h2 class="text-xl font-medium text-gray-800 mb-2">Phone: {{ $user->phone }}</h2>
                </div>
            </div>

            <!-- New Section for Project Information with Styled Design -->
            <div class="bg-white p-8 rounded-md mt-2 text-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Project Information</h2>
                <div class="grid grid-cols-2 gap-4">
                    @if ($hiringForm)
                        <div class="text-center">
                            <p class="text-lg font-medium text-gray-800 mb-2">Project Title:</p>
                            <p class="text-lg text-gray-600 mb-4">{{ $hiringForm->projectTitle }}</p>
                        </div>
                        <div class="text-center">
                            <p class="text-lg font-medium text-gray-800 mb-2">Project Description:</p>
                            <p class="text-lg text-gray-600 mb-4">{{ $hiringForm->projectDescription }}</p>
                        </div>
                        <div class="text-right mr-2">
                            <p class="text-lg font-medium text-gray-800 mb-2">Start Date:</p>
                            <p class="text-lg text-gray-600 mb-2">{{ $hiringForm->startDate }}</p>
                        </div>
                        <div class="text-left ml-2">
                            <p class="text-lg font-medium text-gray-800 mb-2">End Date:</p>
                            <p class="text-lg text-gray-600 mb-2">{{ $hiringForm->endDate }}</p>
                        </div>
                    @else
                        <p>No project information available.</p>
                    @endif
                </div>
            </div>

            <!-- Buttons Section -->
            <div class="flex justify-center mt-4 space-x-4 mb-9">
                @if ($hiringForm->status === 'Accepted' || $event->status === 'Pending')
                    <a href="{{ route('startWorking', ['hiringFormId' => $hiringForm->id, 'eventId' => $event->id]) }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded">
                        Start Working
                    </a>
                @elseif ($hiringForm->status === 'Ongoing' && $event->status === 'Ongoing')
                    <button id="helpBtn" class="bg-green-500 text-white px-4 py-2 rounded">
                        <i class="ri-question-fill mr-2"></i>Help
                    </button>
                    <button id="finishBtn" class="bg-blue-500 text-white px-4 py-2 rounded">
                        <i class="ri-check-fill mr-2"></i>Finish
                    </button>
                @endif
            </div>
        </div>
    </div>

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
                        <label for="jobDescription">Job Description:</label>
                        <textarea id="jobDescription" name="jobDescription" class="w-full p-2 border rounded"
                            placeholder="Enter job description here"></textarea>

                        <!-- Update the button type to "submit" -->
                        <button type="submit" id="submitBtn"
                            class="bg-blue-500 text-white py-2 px-3 rounded-full inline-block hover:bg-blue-700 transition duration-300 text-sm w-60 mx-auto">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





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
