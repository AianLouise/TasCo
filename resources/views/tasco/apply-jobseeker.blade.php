<!-- resources/views/tasco/welcome.blade.php -->

<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    <style>
        .height {
            height: 90vh;
        }

        .width {
            width: 500px;
        }
    </style>

    <!-- Welcome Page -->
    <div id="welcomePage" class="flex items-center justify-center h-screen">
        <div class="container mx-auto p-4">
            <div class="text-center bg-white p-8 rounded-md height flex flex-col justify-center">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome to TasCo Job Seeker Application</h1>

                <p class="text-sm text-gray-600 mb-4">
                    Explore exciting job opportunities with TasCo. Start your journey to find the perfect job for you.
                </p>

                <a href="#" id="startApplicationBtn"
                    class="bg-blue-500 text-white py-2 px-3 rounded-full inline-block hover:bg-blue-700 transition duration-300 text-sm w-60  mx-auto">Start
                    Your Application Now</a>
            </div>
        </div>
    </div>

    <!-- Terms and Conditions Page -->
    <div id="termsAndConditionsPage" class="hidden  items-center justify-center h-screen">
        <div class="container mx-auto p-4">
            <div class="text-center bg-white p-8 rounded-md height flex flex-col justify-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Terms and Conditions</h2>
                <div class="max-h-96 overflow-y-auto mb-4">
                    <div class="max-h-60 overflow-y-auto mb-4">
                        <p class="text-gray-600 mb-4">
                            By proceeding with the application, you agree to the following terms and conditions:
                        </p>
                        <ol class="ml-6">
                            <li class="mb-2">You must provide accurate and truthful information in your application.
                            </li>
                            <li class="mb-2">You are responsible for maintaining the confidentiality of your account
                                and
                                password.</li>
                            <li class="mb-2">TasCo reserves the right to reject or terminate your application without
                                notice.</li>
                            <li class="mb-2">You agree to comply with all applicable laws and regulations.</li>
                            <li class="mb-2">TasCo is not responsible for any damages or losses resulting from the use
                                of
                                our platform.</li>
                            <li class="mb-2">You understand and acknowledge that TasCo collects and processes your
                                personal data in accordance with our Privacy Policy.</li>
                            <li class="mb-2">You agree to receive communications from TasCo related to your
                                application
                                and other relevant information.</li>
                            <li class="mb-2">You acknowledge that TasCo may update these terms from time to time, and
                                it
                                is your responsibility to review them periodically.</li>
                            <li class="mb-2">You agree not to misuse our platform, including but not limited to
                                engaging
                                in fraudulent activities or violating any applicable laws.</li>
                            <li class="mb-2">TasCo reserves the right to suspend or terminate your application if you
                                violate these terms or engage in any prohibited activities.</li>
                            <li class="mb-2">You indemnify TasCo against any claims, damages, or losses arising from
                                your
                                use of our platform or any violation of these terms.</li>
                            <li class="mb-2">These terms constitute the entire agreement between you and TasCo
                                regarding
                                your application.</li>
                        </ol>
                    </div>
                </div>
                <a href="#" id="agreeBtn"
                    class="bg-blue-500 text-white py-2 px-3 rounded-full inline-block hover:bg-blue-700 transition duration-300 text-sm w-60  mx-auto">I
                    Agree</a>
            </div>
        </div>
    </div>

    <!-- Category Selection Page -->
    <div id="categorySelectionPage" class="hidden items-center justify-center h-screen">
        <div class="container mx-auto p-4">
            <div class="text-center bg-white p-8 rounded-md height flex flex-col justify-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-4">Select Job Category</h2>

                <!-- Add your category selection options here -->
                <div class="mb-4">
                    <label for="jobCategory" class="block text-sm font-medium text-gray-700">Choose a category:</label>
                    <select id="jobCategory" name="selectedCategoryId"
                        class="mt-1 p-2 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500 w-60 mx-auto"
                        onchange="updateHiddenInput()">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Button to proceed to the next step -->
                <button id="selectCategoryBtn"
                    class="bg-blue-500 text-white py-2 px-3 rounded-full inline-block hover:bg-blue-700 transition duration-300 text-sm w-60 mx-auto">Continue</button>
            </div>
        </div>
    </div>


    <!-- Upload Requirements Page -->
    <div id="uploadRequirementsPage" class="hidden items-center justify-center h-screen">
        <div class="container mx-auto p-4">
            <div class="text-center bg-white p-8 rounded-md height flex flex-col justify-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Upload Requirements</h2>
                <div class="max-h-60 overflow-y-auto mb-4">
                    <form id="uploadForm" method="POST" action="{{ route('submit.jobseekerapplication') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <label for="resume">Upload Resume:</label>
                        <input type="file" id="resume" name="resume" accept="application/pdf,image/*">

                        <label for="validId">Upload Valid Id:</label>
                        <input type="file" id="validId" name="validId" accept="image/*">

                        <label for="barangayClearance">Upload Barangay Clearance:</label>
                        <input type="file" id="barangayClearance" name="barangayClearance" accept="image/*">

                        <label for="policeClearance">Upload Police Clearance:</label>
                        <input type="file" id="policeClearance" name="policeClearance" accept="image/*">

                        <label for="latestPicture">Upload Latest Picture:</label>
                        <input type="file" id="latestPicture" name="latestPicture" accept="image/*">

                        <!-- Hidden input for job category -->
                        <input type="hidden" id="selectedCategoryId" name="selectedCategoryId" value="">

                        <script>
                            function updateHiddenInput() {
                                var selectElement = document.getElementById("jobCategory");
                                var hiddenInput = document.getElementById("selectedCategoryId");
                        
                                // Update the hidden input value with the selected option value
                                hiddenInput.value = selectElement.value;
                            }
                        </script>

                        <button type="submit" id="submitBtn"
                            class="bg-blue-500 text-white py-2 px-3 rounded-full inline-block hover:bg-blue-700 transition duration-300 text-sm w-60 mx-auto">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        // Declare selectedCategory variable outside the event listener
        var selectedCategory;

        document.getElementById('startApplicationBtn').addEventListener('click', function() {
            // Hide the welcome page
            document.getElementById('welcomePage').classList.add('hidden');

            // Show the Terms and Conditions page
            document.getElementById('termsAndConditionsPage').classList.remove('hidden');
        });

        document.getElementById('agreeBtn').addEventListener('click', function() {
            // Hide the Terms and Conditions page
            document.getElementById('termsAndConditionsPage').classList.add('hidden');

            // Show the Category Selection page
            document.getElementById('categorySelectionPage').classList.remove('hidden');
        });

        // Add event listener for the 'Continue' button on Category Selection Page
        document.getElementById('selectCategoryBtn').addEventListener('click', function() {
            // Get the selected category value
            selectedCategory = document.getElementById('jobCategory').value;

            // Update the hidden input value
            document.getElementById('selectedCategoryId').value = selectedCategory;

            // Hide the Category Selection Page
            document.getElementById('categorySelectionPage').classList.add('hidden');

            // Show the Upload Requirements page
            document.getElementById('uploadRequirementsPage').classList.remove('hidden');
        });

        // Add event listener for the 'Submit' button
        document.getElementById('submitBtn').addEventListener('click', function() {
            // Hide the Upload Requirements page
            document.getElementById('uploadRequirementsPage').classList.add('hidden');

            // Show the Submission Confirmation page
            document.getElementById('submissionConfirmationPage').classList.remove('hidden');
        });
    </script>

</x-app-layout>
