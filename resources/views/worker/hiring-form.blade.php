<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    <main class="bg-gray-100 min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md p-8 max-w-2xl w-full sm:w-1/2 text-center rounded-lg mt-10">
            <form method="POST" action="{{ route('submit.hiring.form', ['worker' => $user->id]) }}">
                @csrf
                <!-- Form heading -->
                <h1 class="text-lg font-semibold mb-1">Job Hiring Form</h1>

                <!-- Worker Details section -->
                <div class="border border-blue-200 shadow-lg p-10 rounded-lg pt-5 pb-5">
                    <h2 class="text-sm font-semibold mb-2">Worker Details</h2>

                    <div class="flex items-center justify-center mb-2">
                        <!-- Worker Avatar -->
                        <div>
                            @if ($user->avatar == 'avatar.png')
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF"
                                    alt="" class="w-28 h-auto rounded-full shadow-xl avatarimg mb-5">
                            @else
                                <img src="{{ asset('storage/users-avatar/' . basename($user->avatar)) }}" alt=""
                                    class="w-28 h-auto rounded-full shadow-xl avatarimg mb-5">
                            @endif

                            <!-- Message Link -->
                            <a href="{{ route('user.chatify', ['user_id' => $user->id]) }}" target="_new"
                                class="border hover:border-blue-700 hover:text-blue-500 text-gray font-bold py-2 px-4 rounded w-36 text-sm">
                                Message
                            </a>
                        </div>


                        <!-- Worker Information -->
                        <div class="ml-4">
                            <div class="mb-2">
                                <label for="workerFullName" class="block text-xs font-medium ">Full
                                    Name</label>
                                <p class="font-semibold">{{ $user->name }}</p>
                            </div>

                            <div class="mb-2">
                                <label for="workerJobTitle" class="block text-xs font-medium ">Job
                                    Title</label>
                                <p class="font-semibold">{{ $user->category->name }}</p>
                            </div>

                            <div class="mb-2">
                                <label for="workerEmail" class="block text-xs font-medium ">Email</label>
                                <p class="font-semibold">{{ $user->email }}</p>
                            </div>

                            <div class="mb-2">
                                <label for="workerPhone" class="block text-xs font-medium ">Phone</label>
                                <p class="font-semibold">{{ $user->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Project Details section -->
                <div class="border border-blue-200 bg-white shadow-md p-10 rounded-lg pt-5 pb-5 mt-2">
                    <h2 class="text-sm font-semibold mb-2">Project Details</h2>
                    <div class="w-full mb-2">
                        <label for="projectTitle" class="block text-xs font-medium  mb-2">Project Title</label>
                        <input type="text" name="projectTitle" id="projectTitle" placeholder="Enter project title"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full text-sm"
                            required>
                    </div>
                    <div class="w-full mb-2">
                        <label for="projectDescription" class="block text-xs font-medium  mb-2">Project
                            Description</label>
                        <textarea name="projectDescription" id="projectDescription" placeholder="Enter project description"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full p-2 text-sm"
                            rows="4" required></textarea>
                    </div>
                    <div class="flex mb-2">
                        <!-- Start Date -->
                        <div class="w-1/2 mr-1">
                            <label for="startDate" class="block text-xs font-medium mb-2">Start Date</label>
                            <input type="text" name="startDate" id="startDate"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full text-sm"
                                placeholder="Select start date">
                        </div>

                        <!-- End Date -->
                        <div class="w-1/2 ml-1">
                            <label for="endDate" class="block text-xs font-medium mb-2">End Date</label>
                            <input type="text" name="endDate" id="endDate"
                                class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full text-sm"
                                placeholder="Select end date">
                        </div>
                    </div>
                </div>

                <!-- Scope of Work section -->
                <div class="border border-blue-200 bg-white shadow-md p-10 rounded-lg pt-5 pb-5 mt-2">
                    <h2 class="text-sm font-semibold mb-2">Scope of Work</h2>
                    <div class="w-full mb-2">
                        <label for="scopeOfWork" class="block text-xs font-medium  mb-2">Briefly describe the
                            tasks
                            and
                            responsibilities of the worker.</label>
                        <textarea name="scopeOfWork" id="scopeOfWork" placeholder="Enter scope of work"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-full p-2 text-sm"
                            rows="4" required></textarea>
                    </div>
                </div>

                <!-- Payment Terms section -->
                <div class="border border-blue-200 bg-white shadow-md p-10 rounded-lg pt-5 pb-5 mt-2">
                    <h2 class="text-sm font-semibold mb-2">Payment Terms</h2>

                    <!-- Total Payment -->
                    <div class="w-full mb-2">
                        <label for="totalPayment" class="block text-xs font-medium  mb-2">Total
                            Payment</label>
                        <input type="number" name="totalPayment" id="totalPayment"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-40 text-sm text-center"
                            placeholder="Enter total payment" required pattern="[0-9]+">
                    </div>


                    <!-- Payment Frequency -->
                    <div class="w-full mb-2">
                        <label for="paymentFrequency" class="block text-xs font-medium  mb-2">Payment
                            Frequency</label>
                        <select name="paymentFrequency" id="paymentFrequency"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-40 text-center h-10 text-sm"
                            required>
                            <option value="hourly">Hourly</option>
                            <option value="perDay">Per Day</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <!-- Payment Method -->
                    <div class="w-full mb-2">
                        <label for="paymentMethod" class="block text-xs font-medium  mb-2">Payment
                            Method</label>
                        <select name="paymentMethod" id="paymentMethod"
                            class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-40 text-center h-10 text-sm"
                            required>
                            <option value="bankTransfer">Bank Transfer</option>
                            <option value="cash">Cash</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>

                <!-- Submit button -->
                <div class="mt-2">

                    <button type="submit" onclick="validateDates()"
                        class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-7 rounded text-sm">Submit</button>

                </div>
            </form>
        </div>
    </main>

    <!-- Load flatpickr script after the form -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#startDate, #endDate', {
            dateFormat: 'Y-m-d', // Store the date in Y-m-d format
            altInput: true, // Create an alternate input field
            altFormat: 'F j, Y', // Format for the alternate input field (displayed in the textbox)
            // Add other Flatpickr options as needed
        });

        function validateDates() {
            const startDate = document.getElementById('startDate').value;
            const endDate = document.getElementById('endDate').value;

            if (startDate === '' || endDate === '') {
                alert('Start Date and End Date are required.');
            } else {
                // Proceed with form submission
                document.querySelector('form').submit();
            }
        }
    </script>
</x-app-layout>
