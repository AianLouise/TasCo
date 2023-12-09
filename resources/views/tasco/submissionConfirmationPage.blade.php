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

    <!-- Submission Confirmation Page for Employer -->
    <div id="submissionConfirmationPage" class="flex items-center justify-center h-screen">
        <div class="container mx-auto p-4 bg-blue-500">
            <div class="text-center bg-white p-8 rounded-md height flex flex-col justify-center">
                <p class="text-2xl font-bold text-gray-800 mb-2">Application Submitted</p>
                <p class="text-gray-600 mb-4">Thank you for submitting your application. Please wait for approval.</p>

                <!-- Add a button to return to the home page using the 'home' named route -->
                <a href="{{ route('app.home') }}"
                    class="bg-blue-500 text-white py-2 px-3 rounded-full inline-block hover:bg-blue-700 transition duration-300 text-sm w-60 mx-auto">Return to Home</a>
            </div>
        </div>
    </div>
</x-app-layout>
