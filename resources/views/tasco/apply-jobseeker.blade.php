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
    <section class="flex items-center justify-center bg-blue-50">
        <div id="welcomePage" class="h-full sm:w-1/2 flex items-center justify-center py-[7rem]">
            <div class="container mx-auto rounded-lg bg-white shadow-lg">
                <div class="text-center bg-white p-8 rounded-md flex flex-col justify-center">

                    <img src="{{ URL('images/welcome-job-seeker.PNG') }}" width="400" class="mx-auto">
                    <h1 class="text-3xl font-bold text-gray-800">Welcome to TasCo Job Seeker Application</h1>

                    <p class="mt-2 max-w-lg mx-auto mb-4 text-center text-xl leading-relaxed text-gray-800">
                        Explore exciting job opportunities with TasCo. Start your journey to find the perfect job
                        for
                        you.
                    </p>

                    <a href="#" id="startApplicationBtn"
                        class="flex flex-row items-center justify-center font-medium gap-x-2 rounded-lg border border-blue-500 px-10 py-3 text-blue-500
                        hover:bg-blue-500 transition duration-300  hover:text-white mx-auto shadow-lg transform hover:scale-105">
                        Apply Now →
                    </a>
                </div>
            </div>
        </div>


        <!-- Terms and Conditions Page -->
        <div id="termsAndConditionsPage" class="hidden flex items-center justify-center h-screen">
            <div class="container mx-auto p-4 bg-white rounded-lg bg-white shadow-lg">
                <div class="text-center bg-white p-8 rounded-md height flex flex-col justify-center">
                    <h2 class="text-4xl font-bold text-gray-800 mb-2">Terms and Conditions</h2>
                    <p class="text-center text-xl leading-relaxed text-gray-600 mb-4">
                        By proceeding with the application, you agree to the following terms and conditions:
                    </p>
                    <div class="overflow-y-auto mb-4">
                        <div class="max-w-fit overflow-y-auto text-justify border border-gray-50 rounded-lg p-6">
                            <ol class="ml-6 list-decimal">
                                <li class="text-md leading-relaxed text-gray-600 mb-2">You must provide accurate and truthful information in your
                                    application.
                                </li>
                                <li class="text-md leading-relaxed text-gray-600 mb-2">You are responsible for maintaining the confidentiality of your
                                    account
                                    and
                                    password.</li>
                                <li class="text-md leading-relaxed text-gray-600 mb-2">TasCo reserves the right to reject or terminate your application
                                    without
                                    notice.</li>
                                <li class="text-md leading-relaxed text-gray-600 mb-2">You agree to comply with all applicable laws and regulations.
                                </li>
                                <li class="text-md leading-relaxed text-gray-600 mb-2">TasCo is not responsible for any damages or losses resulting from
                                    the
                                    use
                                    of
                                    our platform.</li>
                                <li class="text-md leading-relaxed text-gray-600 mb-2">You understand and acknowledge that TasCo collects and processes
                                    your
                                    personal data in accordance with our Privacy Policy.</li>
                                <li class="text-md leading-relaxed text-gray-600 mb-2">You agree to receive communications from TasCo related to your
                                    application
                                    and other relevant information.</li>
                                <li class="text-md leading-relaxed text-gray-600 mb-2">You acknowledge that TasCo may update these terms from time to
                                    time,
                                    and
                                    it
                                    is your responsibility to review them periodically.</li>
                                <li class="text-md leading-relaxed text-gray-600 mb-2">You agree not to misuse our platform, including but not limited
                                    to
                                    engaging
                                    in fraudulent activities or violating any applicable laws.</li>
                                <li class="text-md leading-relaxed text-gray-600 mb-2">TasCo reserves the right to suspend or terminate your application
                                    if
                                    you
                                    violate these terms or engage in any prohibited activities.</li>
                                <li class="text-md leading-relaxed text-gray-600 mb-2">You indemnify TasCo against any claims, damages, or losses
                                    arising
                                    from
                                    your
                                    use of our platform or any violation of these terms.</li>
                                <li class="text-md leading-relaxed text-gray-600 mb-2">These terms constitute the entire agreement between you and TasCo
                                    regarding
                                    your application.</li>
                            </ol>
                        </div>
                    </div>
                    <a href="#" id="agreeBtn"
                        class="flex flex-row items-center justify-center font-medium gap-x-2 rounded-lg hover:border hover:bg-white hover:text-blue-500 hover:border-blue-500 px-10 py-3 text-white
                        bg-blue-500 transition duration-300 text-white mx-auto shadow-lg transform hover:scale-105">Accept</a>
                </div>
            </div>
        </div>

        <!-- Category Selection Page -->
        <div id="categorySelectionPage" class="hidden flex items-center justify-center h-screen sm:w-1/2">
            <div class="container mx-auto p-4 bg-white rounded-lg shadow-lg">
                <div class="text-center bg-white p-8 rounded-md height flex flex-col justify-center">
                <img src="{{ URL('images/category.PNG') }}" width="300" class="mx-auto">
                    <h2 class="text-3xl font-bold text-gray-800 mb-4">Select Job Category</h2>
                    <!-- Add your category selection options here -->
                    <div class="mb-4">
                        <label for="jobCategory" class="block text-lg font-medium text-gray-800">Choose a
                            category:</label>
                        <select id="jobCategory" name="selectedCategoryId"
                            class="mt-1 p-3 border border-gray-300 rounded-md focus:outline-none focus:ring focus:border-blue-500 w-60 mx-auto"
                            onchange="updateHiddenInput()">
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Button to proceed to the next step -->
                    <button id="selectCategoryBtn"
                        class="flex flex-row items-center justify-center font-medium gap-x-2 rounded-lg hover:border hover:bg-white hover:text-blue-500 hover:border-blue-500 px-20 py-3 text-white
                        bg-blue-500 transition duration-300 text-white mx-auto shadow-lg transform hover:scale-105">Continue</button>
                </div>
            </div>
        </div>

        <div id="uploadRequirementsPage" class="hidden items-center h-full justify-center py-[8.3rem] md:mt-9">
            <div class="container mx-auto rounded-lg bg-white shadow-lg">
                <div class="text-center bg-white p-8 rounded-md flex flex-col justify-center">
                    <h2 class="font-bold text-2xl sm:text-4xl text-gray-800 p-2">Required Documents</h2>
                    <p class="text-gray-600">
                        Please upload the following documents that are specified below:
                    </p>
                    <form id="uploadForm" method="POST" action="{{ route('submit.jobseekerapplication') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-rows-1 sm:grid-cols-5 gap-4 p-10 rounded-xl mx-auto">
                            <div class="grid grid-rows-1">
                                <label for="resume" class="font-semibold">
                                    <i class="ri-article-line text-lg font-bold"></i> Resume:
                                </label>
                                <div id="resumePreview" class="mt-4 border border-gray-600 rounded-lg p-16 relative">
                                    <input type="file" id="resume" name="resume" class="hidden"
                                        accept="application/pdf,image/*"
                                        onchange="previewImage('resume', 'resumePreview')">
                                    <label for="resume" class="absolute top-0 left-0 w-full h-full cursor-pointer">
                                        <!-- Display the current image or a placeholder -->
                                        @if (isset($uploadedImages['resume']))
                                            <img src="{{ $uploadedImages['resume'] }}"
                                                class="w-full h-full object-cover rounded-lg" alt="Resume">
                                        @else
                                            <img src="{{ asset('images/placeholder.jpg') }}"
                                                class="w-full h-full object-cover rounded-lg" alt="Placeholder">
                                        @endif
                                        <div
                                            class="opacity-75 hover:opacity-100 transition-all absolute top-0 left-0 w-full h-full flex items-center justify-center">
                                            <span class="text-black">
                                                @if (isset($uploadedImages['resume']))
                                                    Change
                                                @else
                                                    Upload
                                                @endif
                                            </span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <div class="grid grid-rows-1">
                                <label for="validId" class="font-semibold">
                                    <i class="ri-bank-card-2-line text-lg font-bold"></i> Valid Id:
                                </label>
                                <div id="validIdPreview" class="mt-4 border border-gray-600 rounded-lg p-16 relative">
                                    <input type="file" id="validId" name="validId" class="hidden" accept="image/*"
                                        onchange="previewImage('validId', 'validIdPreview')">
                                    <label for="validId" class="absolute top-0 left-0 w-full h-full cursor-pointer">
                                        <!-- Display the current image or a placeholder -->
                                        @if (isset($uploadedImages['validId']))
                                            <img src="{{ $uploadedImages['validId'] }}"
                                                class="w-full h-full object-cover rounded-lg" alt="Valid ID">
                                        @else
                                            <img src="{{ asset('images/placeholder.jpg') }}"
                                                class="w-full h-full object-cover rounded-lg" alt="Placeholder">
                                        @endif
                                        <div
                                            class="opacity-75 hover:opacity-100 transition-all absolute top-0 left-0 w-full h-full flex items-center justify-center">
                                            <span class="text-black">
                                                @if (isset($uploadedImages['validId']))
                                                    Change
                                                @else
                                                    Upload
                                                @endif
                                            </span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Barangay Clearance -->
                            <div class="grid grid-rows-1">
                                <label for="barangayClearance" class="font-semibold">
                                    <i class="ri-bill-line text-lg font-bold"></i> Barangay Clearance:
                                </label>
                                <div id="barangayClearancePreview"
                                    class="mt-4 border border-gray-600 rounded-lg p-16 relative">
                                    <input type="file" id="barangayClearance" name="barangayClearance"
                                        class="hidden" accept="image/*"
                                        onchange="previewImage('barangayClearance', 'barangayClearancePreview')">
                                    <label for="barangayClearance"
                                        class="absolute top-0 left-0 w-full h-full cursor-pointer">
                                        <!-- Display the current image or a placeholder -->
                                        @if (isset($uploadedImages['barangayClearance']))
                                            <img src="{{ $uploadedImages['barangayClearance'] }}"
                                                class="w-full h-full object-cover rounded-lg"
                                                alt="Barangay Clearance">
                                        @else
                                            <img src="{{ asset('images/placeholder.jpg') }}"
                                                class="w-full h-full object-cover rounded-lg" alt="Placeholder">
                                        @endif
                                        <div
                                            class="opacity-75 hover:opacity-100 transition-all absolute top-0 left-0 w-full h-full flex items-center justify-center">
                                            <span class="text-black">
                                                @if (isset($uploadedImages['barangayClearance']))
                                                    Change
                                                @else
                                                    Upload
                                                @endif
                                            </span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Police Clearance -->
                            <div class="grid grid-rows-1">
                                <label for="policeClearance" class="font-semibold">
                                    <i class="ri-file-lock-line text-lg font-bold"></i> Police Clearance:
                                </label>
                                <div id="policeClearancePreview"
                                    class="mt-4 border border-gray-600 rounded-lg p-16 relative">
                                    <input type="file" id="policeClearance" name="policeClearance" class="hidden"
                                        accept="image/*"
                                        onchange="previewImage('policeClearance', 'policeClearancePreview')">
                                    <label for="policeClearance"
                                        class="absolute top-0 left-0 w-full h-full cursor-pointer">
                                        <!-- Display the current image or a placeholder -->
                                        @if (isset($uploadedImages['policeClearance']))
                                            <img src="{{ $uploadedImages['policeClearance'] }}"
                                                class="w-full h-full object-cover rounded-lg" alt="Police Clearance">
                                        @else
                                            <img src="{{ asset('images/placeholder.jpg') }}"
                                                class="w-full h-full object-cover rounded-lg" alt="Placeholder">
                                        @endif
                                        <div
                                            class="opacity-75 hover:opacity-100 transition-all absolute top-0 left-0 w-full h-full flex items-center justify-center">
                                            <span class="text-black">
                                                @if (isset($uploadedImages['policeClearance']))
                                                    Change
                                                @else
                                                    Upload
                                                @endif
                                            </span>
                                        </div>
                                    </label>
                                </div>
                            </div>

                            <!-- Latest Picture -->
                            <div class="grid grid-rows-1">
                                <label for="latestPicture" class="font-semibold">
                                    <i class="ri-account-box-line text-lg font-bold"></i> Latest Picture:
                                </label>
                                <div id="latestPicturePreview"
                                    class="mt-4 border border-gray-600 rounded-lg p-16 relative">
                                    <input type="file" id="latestPicture" name="latestPicture" class="hidden"
                                        accept="image/*"
                                        onchange="previewImage('latestPicture', 'latestPicturePreview')">
                                    <label for="latestPicture"
                                        class="absolute top-0 left-0 w-full h-full cursor-pointer">
                                        <!-- Display the current image or a placeholder -->
                                        @if (isset($uploadedImages['latestPicture']))
                                            <img src="{{ $uploadedImages['latestPicture'] }}"
                                                class="w-full h-full object-cover rounded-lg" alt="Latest Picture">
                                        @else
                                            <img src="{{ asset('images/placeholder.jpg') }}"
                                                class="w-full h-full object-cover rounded-lg" alt="Placeholder">
                                        @endif
                                        <div
                                            class="opacity-75 hover:opacity-100 transition-all absolute top-0 left-0 w-full h-full flex items-center justify-center">
                                            <span class="text-black">
                                                @if (isset($uploadedImages['latestPicture']))
                                                    Change
                                                @else
                                                    Upload
                                                @endif
                                            </span>
                                        </div>
                                    </label>
                                </div>
                            </div>


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
                            <script>
                                function previewImage(inputId, previewId) {
                                    const input = document.getElementById(inputId);
                                    const preview = document.getElementById(previewId);

                                    if (input.files && input.files[0]) {
                                        const reader = new FileReader();

                                        reader.onload = function(e) {
                                            preview.querySelector('img').src = e.target.result;
                                        };

                                        reader.readAsDataURL(input.files[0]);
                                    }
                                }
                            </script>
                        </div>
                        <div class="m-6">
                            <button type="submit" id="submitBtn"
                                class="flex flex-row items-center justify-center font-medium gap-x-2 rounded-lg hover:border hover:bg-white hover:text-blue-500 hover:border-blue-500 px-10 py-3 text-white
                        bg-blue-500 transition duration-300 text-white mx-auto shadow-lg transform hover:scale-105">Submit</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </section>

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
