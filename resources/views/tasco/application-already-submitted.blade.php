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
    <div class="container mx-auto p-4">
        <div class="text-center bg-white p-8 rounded-md height flex flex-col justify-center">
            <p class="text-2xl font-bold text-gray-800 mb-2">Application Already Submitted</p>
            <p class="text-gray-600 mb-4">You have already submitted an employer application. If you have any questions, please contact support.</p>
        </div>
    </div>
</x-app-layout>