<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    </head>
    <body class="font-sans">

        <section class="min-h-full bg-blue-100">
            <div class="mx-auto max-w-7xl px-4 py-32 sm:px-6 lg:px-8 ">
                <div class="mb-4">
                    <div class="mb-6 max-w-3xl text-center sm:text-center md:mx-auto md:mb-12">
                        <p class="text-base font-semibold uppercase tracking-wide text-blue-500">
                            Calendar
                        </p>
                        <h2
                            class="font-heading mb-4 font-bold tracking-tight text-gray-900 text-3xl sm:text-5xl">
                            Schedule Overview
                        </h2>
                        <div class="h-full">
                        <img src="{{ URL('images/calendar.png') }}" width="400" class="mx-auto mb-4">
                            <p class="mb-12 text-lg text-gray-600">
                            Welcome to Tasco! Our dedicated customer service team is here to assist you with any inquiries or support you may need. We're committed to ensuring your experience with Tasco is seamless and satisfying.
                            </p> 
                        </div>
                    </div>
                </div>
            </div>   
        </section>
</x-app-layout>