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
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Welcome to TasCo Employer Application</h1>

                <p class="text-sm text-gray-600 mb-4">
                    Elevate your hiring process with TasCo, the ultimate platform for connecting with top talents.
                    Simplify your recruitment journey and find the perfect candidates for your company.
                </p>

                <a href="#" id="startApplicationBtn"
                    class="bg-blue-500 text-white py-2 px-3 rounded-full inline-block hover:bg-blue-700 transition duration-300 text-sm w-60 mx-auto">Start
                    Your Application Now</a>
            </div>
        </div>
    </div>

    <div id="termsAndConditionsPage" class="hidden items-center justify-center h-screen">
        <div class="container mx-auto p-4">
            <div class="text-center bg-white p-8 rounded-md height flex flex-col justify-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Terms and Conditions</h2>
                <div class="max-h-60 overflow-y-auto mb-4">
                    <p class="text-gray-600 mb-4">
                        By proceeding with the application, you agree to the following terms and conditions:
                    </p>
                    <ol class="ml-6">
                        <li class="mb-2">You must provide accurate and truthful information in your application.</li>
                        <li class="mb-2">You are responsible for maintaining the confidentiality of your account and
                            password.</li>
                        <li class="mb-2">TasCo reserves the right to reject or terminate your application without
                            notice.</li>
                        <li class="mb-2">You agree to comply with all applicable laws and regulations.</li>
                        <li class="mb-2">TasCo is not responsible for any damages or losses resulting from the use of
                            our platform.</li>
                        <li class="mb-2">You understand and acknowledge that TasCo collects and processes your
                            personal data in accordance with our Privacy Policy.</li>
                        <li class="mb-2">You agree to receive communications from TasCo related to your application
                            and other relevant information.</li>
                        <li class="mb-2">You acknowledge that TasCo may update these terms from time to time, and it
                            is your responsibility to review them periodically.</li>
                        <li class="mb-2">You agree not to misuse our platform, including but not limited to engaging
                            in fraudulent activities or violating any applicable laws.</li>
                        <li class="mb-2">TasCo reserves the right to suspend or terminate your application if you
                            violate these terms or engage in any prohibited activities.</li>
                        <li class="mb-2">You indemnify TasCo against any claims, damages, or losses arising from your
                            use of our platform or any violation of these terms.</li>
                        <li class="mb-2">These terms constitute the entire agreement between you and TasCo regarding
                            your application.</li>
                    </ol>
                </div>
                <a href="#" id="agreeBtn"
                    class="bg-blue-500 text-white py-2 px-3 rounded-full inline-block hover:bg-blue-700 transition duration-300 text-sm w-60 mx-auto">I
                    Agree</a>
            </div>
        </div>
    </div>

    <div id="uploadRequirementsPage" class="hidden items-center justify-center h-screen">
        <div class="container mx-auto p-4">
            <div class="text-center bg-white p-8 rounded-md height flex flex-col justify-center">
                <h2 class="text-2xl font-bold text-gray-800 mb-2">Upload Requirements</h2>
                <div class="max-h-60 overflow-y-auto mb-4">
                    <!-- Add your form elements for uploading requirements here -->
                    <form id="uploadRequirementsForm" method="POST" action="{{ route('submit.application') }}" enctype="multipart/form-data">
                        @csrf
                        <label for="validId">Upload Valid ID:</label>
                        <input type="file" id="validId" name="validId" accept="image/*">
    
                        <label for="barangayClearance">Upload Barangay Clearance:</label>
                        <input type="file" id="barangayClearance" name="barangayClearance" accept="image/*">
    
                        <label for="latestPicture">Upload Latest Picture:</label>
                        <input type="file" id="latestPicture" name="latestPicture" accept="image/*">
    
                        <!-- Update the button type to "submit" -->
                        <button type="submit" id="submitBtn" class="bg-blue-500 text-white py-2 px-3 rounded-full inline-block hover:bg-blue-700 transition duration-300 text-sm w-60 mx-auto">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Add this script at the end of your blade file or in a separate JS file

        document.getElementById('startApplicationBtn').addEventListener('click', function() {
            // Hide the welcome page
            document.getElementById('welcomePage').classList.add('hidden');

            // Show the Terms and Conditions page
            document.getElementById('termsAndConditionsPage').classList.remove('hidden');
        });

        document.getElementById('agreeBtn').addEventListener('click', function() {
            // Hide the Terms and Conditions page
            document.getElementById('termsAndConditionsPage').classList.add('hidden');

            // Show the Upload Requirements page
            document.getElementById('uploadRequirementsPage').classList.remove('hidden');
        });

        // Update the event listener for the 'Submit' button
        document.getElementById('submitBtn').addEventListener('click', function() {
            // Get the form element
            const form = document.getElementById('uploadRequirementsForm');

            // Submit the form
            form.submit();
        });
    </script>
</x-app-layout>
