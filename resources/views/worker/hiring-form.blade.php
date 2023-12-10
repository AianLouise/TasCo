<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    <main class="bg-gray-100 min-h-full flex items-center justify-center">
        <div class="bg-blue-100 shadow-md p-8 max-w-2xl w-full sm:w-1/2 text-center rounded-lg mt-10 mb-20">
            <form method="POST" action="{{ route('submit.hiring.form', ['worker' => $user->id]) }}"
                onsubmit="return validateDates()">

                @csrf
                <!-- Form heading -->
                <h1 class="text-lg font-semibold mb-1">Job Hiring Form</h1>

                <!-- Worker Details section -->
                <div class="border bg-white shadow-lg p-5 md:p-10 rounded-lg pt-5 pb-5">
                    <h2 class="text-sm font-semibold mb-2">Worker Details</h2>

                    <div class="grid grid-rows-1 sm:flex sm:items-center justify-center mb-2">
                        <!-- Worker Avatar -->
                        <div>
                            @if ($user->avatar == 'avatar.png')
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF"
                                    alt="" class="w-28 h-auto mx-auto sm:mx-0 rounded-full shadow-xl avatarimg mb-5 hover:shadow-inner transition-all">
                            @else
                                <img src="{{ asset('storage/users-avatar/' . basename($user->avatar)) }}" alt=""
                                    class="w-28 h-auto mx-auto sm:mx-0 rounded-full shadow-xl avatarimg mb-5 hover:shadow-inner transition-all">
                            @endif

                            <!-- Message Link -->
                            <a href="{{ route('user.chatify', ['user_id' => $user->id]) }}" target="_new"
                                class="border hover:border-1 hover:border-blue-700 hover:text-blue-500 hover:shadow-inner text-gray font-bold py-2 px-4 rounded w-36 text-sm shadow-md transition-all">
                                Message
                            </a>
                        </div>


                        <!-- Worker Information -->
                        <div class="bg-blue-100 text-gray-700 hover:text-black hover:bg-white px-6 py-2 rounded-lg sm:ml-12 sm:text-justify divide-
                         divide-gray-500 w-full shadow-inner hover:shadow-lg transition-all mt-5 sm:mt-0 text-center">
                            <div class="mb-2 transition-all">
                                <label for="workerFullName" class="block text-xs font-medium">Full
                                    Name</label>
                                <p class="py-1 rounded-md bg-blue-100 my-1 sm:pl-2 shadow-xs">{{ $user->name }}</p>
                            </div>

                            <div class="pb-2">
                                <label for="workerJobTitle" class="block text-xs font-medium pt-1 ">Job
                                    Title</label>
                                <p class="py-1 rounded-md bg-blue-100 my-1 sm:pl-2 shadow-xs">{{ $user->category->name }}</p>
                            </div>

                            <div class="pb-2">
                                <label for="workerEmail" class="block text-xs font-medium pt-1 ">Email</label>
                                <p class="py-1 rounded-md bg-blue-100 my-1 sm:pl-2 shadow-xs">{{ $user->email }}</p>
                            </div>

                            <div class="pb-2">
                                <label for="workerPhone" class="block text-xs font-medium pt-1">Phone</label>
                                <p class="py-1 rounded-md bg-blue-100 my-1 sm:pl-2 shadow-xs">{{ $user->phone }}</p>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Project Details section -->
                <div class="border border-blue-200 bg-white shadow-md  rounded-lg p-4 mt-2">
                    <h2 class="text-sm font-semibold mb-2">Project Details</h2>
                    <div class="bg-white p-4 rounded-lg w-full shadow-inner">
                    <div class="w-full mb-2">
                        <label for="projectTitle" class="block text-xs font-medium mb-2">Project Title</label>
                        <input type="text" name="projectTitle" id="projectTitle" placeholder="Enter project title"
                            class="border-gray-400 invalid:border-gray-200 placeholder:text-gray-500 invalid:bg-blue-100 invalid:shadow-inner bg-white focus:shadow-inner focus:bg-white focus:border-white focus:ring-0 rounded-md shadow-sm w-full text-sm transition-colors"
                            required>
                    </div>
                    <div class="w-full mb-2">
                        <label for="projectDescription" class="block text-xs font-medium  mb-2">Project
                            Description</label>
                        <textarea name="projectDescription" id="projectDescription" placeholder="Enter project description"
                            class="border-gray-400 invalid:border-gray-200 placeholder:text-gray-500
                            invalid:text-blue-30 invalid:bg-blue-100 invalid:shadow-inner
                            bg-white focus:shadow-inner focus:bg-white focus:border-white
                            focus:ring-0 rounded-md shadow-sm w-full p-2 text-sm transition-colors
                            
                            "
                            rows="4" required></textarea>
                    </div>
                    <div class="flex mb-2">
                        <!-- Start Date -->
                        <div class="w-1/2 mr-1">
                            <label for="startDate" class="block text-xs font-medium mb-2">Start Date</label>
                            <input type="text" name="startDate" id="startDate"
                                class="border-gray-400 hover:bg-blue-500
                                 hover:placeholder:text-white placeholder:text-blue-400 placeholder:font-semibold placeholder:text-center focus:shadow-inner hover:border-white
                                 focus:bg-white focus:border-white rounded-md shadow-sm w-full text-sm transition-all hover:text-white"
                                placeholder="Select start date">
                        </div>

                        <!-- End Date -->
                        <div class="w-1/2 ml-1">
                            <label for="endDate" class="block text-xs font-medium mb-2">End Date</label>
                            <input type="text" name="endDate" id="endDate"
                                class="border-gray-400 hover:bg-blue-500 hover:placeholder:text-white hover:border-white placeholder:text-blue-400 placeholder:font-semibold placeholder:text-center focus:shadow-inner
                                 focus:bg-white focus:border-white rounded-md shadow-sm w-full text-sm transition-all hover:text-white"
                                placeholder="Select end date">
                        </div>
                    </div>
                </div>
                </div>

                <!-- Scope of Work section -->
                <div class="border border-blue-200 bg-white shadow-md p-10 rounded-lg pt-5 pb-5 mt-2">
                    <h2 class="text-sm font-semibold mb-2">Scope of Work</h2>
                    <div class="w-full mb-2">
                        <label for="scopeOfWork" class="block text-xs font-medium text-gray-500  mb-2">Briefly describe the
                            tasks
                            and
                            responsibilities of the worker.</label>
                        <textarea name="scopeOfWork" id="scopeOfWork" placeholder="Enter scope of work"
                            class="border-gray-400 invalid:border-gray-200 placeholder:text-gray-500
                            invalid:text-blue-30 invalid:bg-blue-100 invalid:shadow-inner
                            bg-white focus:shadow-inner focus:bg-white focus:border-white
                            focus:ring-0 rounded-md shadow-sm w-full p-2 text-sm transition-colors"
                            rows="4" required></textarea>
                    </div>
                </div>

                <!-- Payment Terms section -->
                <div class="border border-blue-200 bg-white shadow-md p-10 rounded-lg pt-5 pb-5 mt-2">
                    <h2 class="text-sm font-semibold mb-2">Payment Terms</h2>

                <div class="grid grid-rows-1 sm:grid-cols-3">
                    <!-- Total Payment -->
                    <div class="w-full mb-2">
                        <label for="totalPayment" class="block text-xs font-medium  mb-2">Total
                            Payment</label>
                        <input type="number" name="totalPayment" id="totalPayment"
                            class="border-gray-400 invalid:border-gray-200 placeholder:text-gray-500
                            invalid:text-blue-30 invalid:bg-blue-100 invalid:shadow-inner
                            bg-white focus:shadow-inner focus:bg-white focus:border-white
                            focus:ring-0 rounded-md shadow-sm w-full p-2 text-sm transition-colors"
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
                </div>

                <!-- Submit button -->
                <div class="mt-2">

                    <button type="submit" onclick="validateDates()"
                        class="bg-blue-500  text-white py-2 px-10 hover:bg-blue-700 rounded text-sm mt-4 transition-all hover:tracking-widest hover:font-bold">Submit</button>

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
                return false; // prevent form submission
            } else {
                return true; // allow form submission
            }
        }
    </script>
</x-app-layout>
