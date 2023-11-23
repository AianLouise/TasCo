<x-app-layout>
    <main class="bg-gray-200 min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md p-8 max-w-2xl w-full sm:w-1/2 text-center rounded-lg">
            <h1 class="text-sm font-semibold mb-1">Form of Hiring for: [Worker Name]</h1>
            <h1 class="text-xs mb-2">Occupation: [Job Name]</h1>

            <h2 class="text-sm font-semibold mb-2">Your Information</h2>

            <form method="POST" class="text-left">
                @csrf

                <!-- Name and Address on the same line -->
                <div class="flex mb-2">
                    <div class="w-1/2 mr-1">
                        <label for="name" class="block text-xs font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value=""
                            class="mt-1 p-2 w-full border rounded-md text-xs">
                    </div>

                    <div class="w-1/2 ml-1">
                        <label for="address" class="block text-xs font-medium text-gray-700">Address</label>
                        <input type="text" name="address" id="address" value=""
                            class="mt-1 p-2 w-full border rounded-md text-xs">
                    </div>
                </div>

                <!-- Contact Information -->
                <h2 class="text-sm font-semibold mb-2">Your Contact Information</h2>
                <div class="flex mb-2">
                    <div class="w-1/2 mr-1">
                        <label for="email" class="block text-xs font-medium text-gray-700">Email</label>
                        <input type="text" name="email" id="email" value=""
                            class="mt-1 p-2 w-full border rounded-md text-xs">
                    </div>

                    <div class="w-1/2 ml-1">
                        <label for="phone" class="block text-xs font-medium text-gray-700">Phone</label>
                        <input type="text" name="phone" id="phone" value=""
                            class="mt-1 p-2 w-full border rounded-md text-xs">
                    </div>
                </div>

                <h2 class="text-sm font-semibold mb-2">Choose Your Type of Meeting</h2>
                <div>
                    <input type="text" name="meeting_type" id="meeting_type" value=""
                        class="mt-1 p-2 w-full border rounded-md text-xs">
                </div>

                <h2 class="text-sm font-semibold mb-2">Choose Date and time for the meeting</h2>
                <div class="flex mb-2">
                    <div class="w-1/2 mr-1">
                        <label for="date" class="block text-xs font-medium text-gray-700">Date</label>
                        <select name="date" id="date" class="mt-1 p-2 w-full border rounded-md text-xs">
                            <option value="2023-11-23">2023-11-23</option>
                            <option value="2023-11-24">2023-11-24</option>
                        </select>
                    </div>
                    
                    <div class="w-1/2 ml-1">
                        <label for="time" class="block text-xs font-medium text-gray-700">Time</label>
                        <select name="time" id="time" class="mt-1 p-2 w-full border rounded-md text-xs">
                            <option value="09:00 AM">09:00 AM</option>
                            <option value="12:00 PM">12:00 PM</option>
                        </select>
                    </div>
                </div>

                <h2 class="text-sm font-semibold mb-2">State your reason for employment of this service:</h2>
                <div>
                    <textarea class="mt-1 p-2 w-full border rounded-md text-xs" name="reason" id="reason" cols="30" rows="5"></textarea>
                </div>
                <!-- Add more fields as needed -->

                <div class="mt-2">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-xs">Submit</button>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
