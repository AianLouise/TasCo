<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    <main class="bg-gray-200 min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md p-8 max-w-2xl w-full sm:w-1/2 text-center rounded-lg">
            <!-- Form heading -->
            <h1 class="text-sm font-semibold mb-1">Form of Hiring for: {{ $user->name }}</h1>
            <h1 class="text-xs mb-2">Occupation: {{ $category->name }}</h1>

            <form method="POST" action="{{ route('submit.hiring.form', ['worker' => $user->id]) }}" class="text-left">
                @csrf

                <!-- Your Information section -->
                <h2 class="text-sm font-semibold mb-2">Your Information</h2>
                <div class="flex mb-2">
                    <div class="w-1/2 mr-1">
                        <label for="name" class="block text-xs font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{Auth::user()->name}}" placeholder="Enter your name"
                            class="mt-1 p-2 w-full border rounded-md text-xs" disabled>
                    </div>

                    <div class="w-1/2 ml-1">
                        <label for="address" class="block text-xs font-medium text-gray-700">Address</label>
                        <input type="text" name="address" id="address" value="{{Auth::user()->address}}"
                            placeholder="Enter your address" class="mt-1 p-2 w-full border rounded-md text-xs" disabled>
                    </div>
                </div>

                <!-- Contact Information section -->
                <h2 class="text-sm font-semibold mb-2">Your Contact Information</h2>
                <div class="flex mb-2">
                    <div class="w-1/2 mr-1">
                        <label for="email" class="block text-xs font-medium text-gray-700">Email</label>
                        <input type="text" name="email" id="email" value="{{Auth::user()->email}}" placeholder="Enter your email"
                            class="mt-1 p-2 w-full border rounded-md text-xs" disabled>
                    </div>

                    <div class="w-1/2 ml-1">
                        <label for="phone" class="block text-xs font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" id="phone" value="{{Auth::user()->phone}}"
                            placeholder="Enter your phone number" class="mt-1 p-2 w-full border rounded-md text-xs" disabled >
                    </div>
                </div>

                <!-- Choose Date and Time for the meeting section -->
                <h2 class="text-sm font-semibold mb-2">Choose Date and Time for the meeting</h2>
                <div class="flex mb-2">
                    <div class="w-1/2 relative">
                        <label for="date" class="block text-xs font-medium text-gray-700">Date</label>
                        <input type="text" name="date" id="date"
                            class="mt-1 p-2 w-full border rounded-md text-xs" placeholder="Select a date" >
                        <!-- Calendar icon -->
                        <svg class="absolute right-3 top-7 h-4 w-4 text-gray-500 pointer-events-none"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6">
                            </path>
                        </svg>
                    </div>

                    <div class="w-1/2 ml-1">
                        <label for="time" class="block text-xs font-medium text-gray-700">Time</label>
                        <select name="time" id="time" class="mt-1 p-2 w-full border rounded-md text-xs">
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                        </select>
                    </div>
                </div>

                <!-- State your reason for employment section -->
                <h2 class="text-sm font-semibold mb-2">State your reason for employment of this service:</h2>
                <div class="w-1/2 mr-1 mb-2">
                    <label for="subject" class="block text-xs font-medium text-gray-700">Subject</label>
                    <input type="text" name="subject" id="subject" value="" placeholder="Enter your Subject"
                        class="mt-1 p-2 w-full border rounded-md text-xs">
                </div>
                <div>
                    <label for="description" class="block text-xs font-medium text-gray-700">Description</label>
                    <textarea class="mt-1 p-2 w-full border rounded-md text-xs" name="description" id="description" cols="30"
                        rows="5"></textarea>
                </div>

                <!-- Submit button -->
                <div class="mt-2">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-xs">Submit</button>
                </div>
            </form>
        </div>
    </main>

    <!-- Load flatpickr script after the form -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#date', {
            dateFormat: 'Y-m-d',
            // Add other flatpickr options as needed
        });
    </script>
</x-app-layout>
