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
    <div class="container mx-auto p-4 bg-blue-50 rounded-lg shadow-lg h-screen">
        <div class="text-center bg-white p-8 rounded-md h-full flex flex-col justify-center">
            <div class="-mt-20 px-5">
                <img src="{{ URL('images/Pending.PNG') }}" width="400" class="mx-auto">
                <p class="text-2xl font-bold text-gray-800 mb-2">Application Already Submitted</p>
                <p class="text-gray-600 mb-4">You have already submitted an employer application. If you have any
                    questions,
                    please contact support.</p>
                <a href="{{ route('app.home') }}"
                    class="bg-blue-500 text-white py-2 px-3 rounded-full inline-block hover:bg-blue-700 transition duration-300 text-sm w-60 mx-auto">Return
                    to Home</a>
            </div>
        </div>
    </div>
</x-app-layout>
