<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    <main class="bg-gray-200 min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md p-8 max-w-2xl w-full sm:w-1/2 text-center rounded-lg mt-10">
            <form method="POST" action="{{ route('submit.hiring.form', ['worker' => $user->id]) }}">
                @csrf
                <!-- Form heading -->
                <h1 class="text-lg font-semibold mb-1">Job Hiring Form</h1>

                <!-- Worker Details section -->
                <div class="bg-blue-100 p-10 rounded-lg pt-5 pb-5">
                    <h2 class="text-sm font-semibold mb-2">Worker Details</h2>

                    <div class="w-full mb-2">
                        <label for="workerJobTitle" class="block text-xs font-medium text-gray-700">Job Title</label>
                        <input type="text" name="workerJobTitle" id="workerJobTitle"
                            placeholder="Enter worker's job title"
                            class="mt-1 p-2 w-full border rounded-md text-xs text-center"
                            value="{{ $user->category->name }}" disabled>
                    </div>

                    <div class="w-full mb-2">
                        <label for="workerFullName" class="block text-xs font-medium text-gray-700">Full Name</label>
                        <input type="text" name="workerFullName" id="workerFullName"
                            placeholder="Enter worker's full name"
                            class="mt-1 p-2 w-full border rounded-md text-xs text-center" value="{{ $user->name }}"
                            disabled>
                    </div>

                    <div class="flex mb-2">
                        <div class="w-1/2 mr-1">
                            <label for="workerEmail" class="block text-xs font-medium text-gray-700">Email</label>
                            <input type="text" name="workerEmail" id="workerEmail" placeholder="Enter worker's email"
                                class="mt-1 p-2 w-full border rounded-md text-xs text-center"
                                value="{{ $user->email }}" disabled>
                        </div>

                        <div class="w-1/2 ml-1">
                            <label for="workerPhone" class="block text-xs font-medium text-gray-700">Phone</label>
                            <input type="text" name="workerPhone" id="workerPhone"
                                placeholder="Enter worker's phone number"
                                class="mt-1 p-2 w-full border rounded-md text-xs text-center"
                                value="{{ $user->phone }}" disabled>
                        </div>
                    </div>
                </div>

                <!-- Project Details section -->
                <div class="bg-blue-100 p-10 rounded-lg pt-5 pb-5 mt-2">
                    <h2 class="text-sm font-semibold mb-2">Project Details</h2>
                    <div class="w-full mb-2">
                        <label for="projectTitle" class="block text-xs font-medium text-gray-700">Project Title</label>
                        <input type="text" name="projectTitle" id="projectTitle" placeholder="Enter project title"
                            class="mt-1 p-2 w-full border rounded-md text-xs" required>
                    </div>
                    <div class="w-full mb-2">
                        <label for="projectDescription" class="block text-xs font-medium text-gray-700">Project
                            Description</label>
                        <textarea name="projectDescription" id="projectDescription" placeholder="Enter project description"
                            class="mt-1 p-2 w-full border rounded-md text-xs" rows="4" required></textarea>
                    </div>
                    <div class="flex mb-2">
                        <div class="w-1/2 mr-1">
                            <label for="startDate" class="block text-xs font-medium text-gray-700">Start Date</label>
                            <input type="text" name="startDate" id="startDate"
                                class="mt-1 p-2 w-full border rounded-md text-xs" placeholder="Select start date"
                                required>
                        </div>
                        <div class="w-1/2 ml-1">
                            <label for="endDate" class="block text-xs font-medium text-gray-700">End Date</label>
                            <input type="text" name="endDate" id="endDate"
                                class="mt-1 p-2 w-full border rounded-md text-xs" placeholder="Select end date"
                                required>
                        </div>
                    </div>
                </div>

                <!-- Employer Details section -->
                {{-- <div class="bg-blue-100 p-10 rounded-lg pt-5 pb-5 mt-2">
                    <h2 class="text-sm font-semibold mb-2">Employer Details</h2>

                    <!-- Full Name -->
                    <div class="w-full mb-2">
                        <label for="employerFullName" class="block text-xs font-medium text-gray-700">Full Name</label>
                        <input type="text" name="employerFullName" id="employerFullName"
                            placeholder="Enter employer's full name" class="mt-1 p-2 w-full border rounded-md text-xs"
                            value="{{ $user->name ?? '' }}" required>
                    </div>

                    <!-- Email -->
                    <div class="flex mb-2">
                        <div class="w-1/2 mr-1">
                            <label for="employerEmail" class="block text-xs font-medium text-gray-700">Email</label>
                            <input type="text" name="employerEmail" id="employerEmail"
                                placeholder="Enter employer's email" class="mt-1 p-2 w-full border rounded-md text-xs"
                                value="{{ $user->email ?? '' }}" required>
                        </div>

                        <!-- Phone -->
                        <div class="w-1/2 ml-1">
                            <label for="employerPhone" class="block text-xs font-medium text-gray-700">Phone</label>
                            <input type="text" name="employerPhone" id="employerPhone"
                                placeholder="Enter employer's phone number"
                                class="mt-1 p-2 w-full border rounded-md text-xs" value="{{ $user->phone ?? '' }}"
                                required>
                        </div>
                    </div>
                </div> --}}


                <!-- Scope of Work section -->
                <div class="bg-blue-100 p-10 rounded-lg pt-5 pb-5 mt-2">
                    <h2 class="text-sm font-semibold mb-2">Scope of Work</h2>
                    <div class="w-full mb-2">
                        <label for="scopeOfWork" class="block text-xs font-medium text-gray-700">Briefly describe the
                            tasks
                            and
                            responsibilities of the worker.</label>
                        <textarea name="scopeOfWork" id="scopeOfWork" placeholder="Enter scope of work"
                            class="mt-1 p-2 w-full border rounded-md text-xs" rows="4" required></textarea>
                    </div>
                </div>

                <!-- Timeline and Milestones section -->
                <!-- ... (similar structure as Project Details) -->

                <!-- Payment Terms section -->
                <div class="bg-blue-100 p-10 rounded-lg pt-5 pb-5 mt-2">
                    <h2 class="text-sm font-semibold mb-2">Payment Terms</h2>

                    <!-- Total Payment -->
                    <div class="w-full mb-2">
                        <label for="totalPayment" class="block text-xs font-medium text-gray-700">Total
                            Payment</label>
                        <input type="text" name="totalPayment" id="totalPayment"
                            class="mt-1 p-2 w-full border rounded-md text-xs" placeholder="Enter total payment"
                            required>
                    </div>

                    <!-- Payment Frequency -->
                    <div class="w-full mb-2">
                        <label for="paymentFrequency" class="block text-xs font-medium text-gray-700">Payment
                            Frequency</label>
                        <select name="paymentFrequency" id="paymentFrequency"
                            class="mt-1 p-2 w-full border rounded-md text-xs" required>
                            <option value="hourly">Hourly</option>
                            <option value="perMilestone">Per Milestone</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <!-- Payment Method -->
                    <div class="w-full mb-2">
                        <label for="paymentMethod" class="block text-xs font-medium text-gray-700">Payment
                            Method</label>
                        <select name="paymentMethod" id="paymentMethod"
                            class="mt-1 p-2 w-full border rounded-md text-xs" required>
                            <option value="bankTransfer">Bank Transfer</option>
                            <option value="cash">Cash</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>
                <!-- Payment Schedule section -->
                <!-- ... (similar structure as Project Details) -->

                <!-- Communication Channels section -->
                <!-- ... (similar structure as Project Details) -->

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
        flatpickr('#startDate, #endDate', {
            dateFormat: 'Y-m-d', // Store the date in Y-m-d format
            altInput: true, // Create an alternate input field
            altFormat: 'F j, Y', // Format for the alternate input field (displayed in the textbox)
            // Add other Flatpickr options as needed
        });
    </script>
</x-app-layout>
