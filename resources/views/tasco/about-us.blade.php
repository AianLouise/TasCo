<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            About Us
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-4xl font-bold mb-4 text-gray-800">Welcome to TasCo</h1>

                    <p class="text-gray-700 mb-6">
                        TasCo is a dedicated platform that aims to streamline customer service communication
                        and provide efficient solutions for both customers and businesses.
                    </p>

                    <h2 class="text-2xl font-bold mb-4 text-gray-800">Our Mission</h2>

                    <p class="text-gray-700 mb-6">
                        At TasCo, our mission is to create a seamless and user-friendly experience for both
                        customers and businesses. We strive to enhance communication channels, resolve
                        queries promptly, and foster positive interactions.
                    </p>

                    <h2 class="text-2xl font-bold mb-4 text-gray-800">Key Features</h2>

                    <ul class="list-disc list-inside text-gray-700 mb-6">
                        <li>Efficient and organized inbox for managing customer inquiries.</li>
                        <li>User-friendly interface for both customers and customer service representatives.</li>
                        <li>Quick and easy reply system to address customer concerns promptly.</li>
                        <li>Secure and reliable communication platform.</li>
                    </ul>

                    <h2 class="text-2xl font-bold mb-4 text-gray-800">Contact Us</h2>

                    <p class="text-gray-700 mb-6">
                        We value your feedback and are here to assist you. If you have any questions, suggestions,
                        or concerns, please feel free to contact our customer support team at
                        <a href="mailto:support@tasco.com" class="text-blue-500">support@tasco.com</a>.
                    </p>

                    <p class="text-gray-700">
                        Thank you for choosing TasCo for your customer service needs.
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
