<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    </head>
    <body class="font-sans bg-blue-100">

        <div class="container mx-auto max-w-lg mt-20 p-6 bg-white rounded-md shadow-md">
            <h2 class="text-2xl font-semibold mb-6 text-blue-600">Contact Customer Service</h2>
            
            <form action="{{ route('app.EmailSent') }}" method="post">
                @csrf
    
                <label class="block mb-2" for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required
                       class="w-full p-2 border border-gray-300 rounded-md mb-4">
    
                <label class="block mb-2" for="message">Message:</label>
                <textarea id="message" name="message" required
                          class="w-full p-2 border border-gray-300 rounded-md mb-4 resize-y"></textarea>
    
                <input type="submit" id="submitBtn" value="Submit Message"
                       class="bg-blue-500 text-white px-6 py-2 rounded-md cursor-pointer transition duration-300 hover:bg-blue-600">
            </form>
        </div>

        <script>
            document.getElementById('submitBtn').addEventListener('click', function() {
                this.disabled = true;
                this.form.submit();
            });
        </script>

    </body>
    </html>
</x-app-layout>
