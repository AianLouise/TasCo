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
                            Contact Us
                        </p>
                        <h2
                            class="font-heading mb-2 font-bold tracking-tight text-gray-900 text-3xl sm:text-5xl">
                            Customer Service
                        </h2>
                        <div class="h-full">
                        <img src="{{ URL('images/Customerservice.png') }}" width="400" class="mx-auto">
                            <p class="mb-12 text-lg text-gray-600">
                            Welcome to Tasco! Our dedicated customer service team is here to assist you with any inquiries or support you may need. We're committed to ensuring your experience with Tasco is seamless and satisfying.
                            </p>

                            <div class="card h-fit max-w-3xl border shadow-md bg-white rounded-md p-5 md:p-12">
                                    <form action="{{ route('app.EmailSent') }}" method="post">
                                        @csrf
                            
                                        <label class="block mb-2 font-medium text-left" for="subject">Subject:</label>
                                        <input type="text" id="subject" name="subject" required
                                            class="w-full p-2 border border-gray-300 rounded-md mb-4">
                            
                                        <label class="block mb-2 font-medium text-left" for="message">Message:</label>
                                        <textarea id="message" name="message" required
                                                class="w-full p-2 border border-gray-300 rounded-md mb-4 resize-none"></textarea>
                            
                                        <input type="submit" id="submitBtn" value="Submit Message"
                                            class="bg-blue-500 text-white font-medium px-6 py-3 rounded-md cursor-pointer transition duration-300 hover:bg-blue-600">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <script>
            document.getElementById('submitBtn').addEventListener('click', function() {
                this.disabled = true;
                this.form.submit();
            });
        </script>

    </body>
    </html>
</x-app-layout>
