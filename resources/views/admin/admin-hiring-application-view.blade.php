<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    <!-- Start: Main Content -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-blue-50 min-h-screen transition-all main">

        <!-- Start: Header -->
        <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">

            <!-- Start: Logo / Active Menu -->
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-2-line"></i>
            </button>

            <!-- Breadcrumb Navigation -->
            <ul class="flex items-center text-sm ml-4">
                <li class="mr-2">
                    <a href="#" class="text-gray-800 hover:text-gray-600 font-medium2">TasCo</a>
                </li>
                <li class="text-gray-600 mr-2 font-medium2">/</li>
                <li class="text-gray-600 mr-2 font-medium2">Services</li>
            </ul>

            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile Dropdown -->
            <x-admin-profile-dropdown :user="Auth::user()" />
            <!-- End: Profile Dropdown -->

        </div>
        <!-- End: Header -->
<section class="flex justify-center">
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-10 ml-4 mt-4 mr-4 rounded-md w-full sm:w-1/2">
            <form method="POST" action="">
                @csrf
                <!-- Form heading -->
                <h1 class="text-lg font-semibold mb-4 md:mb-1">Job Hiring Form</h1>

                <!-- Worker Details section -->
                <div class="bg-blue-100 p-4 md:p-10 rounded-lg pt-5 pb-5">
                    <h2 class="text-sm font-semibold mb-2">Worker Details</h2>

                    <div class="w-full mb-2">
                        <label for="workerJobTitle" class="block text-xs font-medium text-gray-700">Job Title</label>
                        <input type="text" name="workerJobTitle" id="workerJobTitle"
                            placeholder="Enter worker's job title"
                            class="mt-1 p-2 w-full border rounded-md text-xs text-center"
                            value="{{ optional($hiringForm->worker->category)->name }}" disabled>
                    </div>


                    <div class="w-full mb-2">
                        <label for="workerFullName" class="block text-xs font-medium text-gray-700">Worker's Full
                            Name</label>
                        <input type="text" name="workerFullName" id="workerFullName"
                            placeholder="Enter worker's full name"
                            class="mt-1 p-2 w-full border rounded-md text-xs text-center"
                            value="{{ isset($hiringForm->worker) ? $hiringForm->worker->name : '' }}" disabled>
                    </div>

                    <div class="flex mb-2">
                        <div class="w-1/2 mr-1">
                            <label for="workerEmail" class="block text-xs font-medium text-gray-700">Email</label>
                            <input type="text" name="workerEmail" id="workerEmail" placeholder="Enter worker's email"
                                class="mt-1 p-2 w-full border rounded-md text-xs text-center"
                                value="{{ isset($hiringForm->worker) ? $hiringForm->worker->email : '' }}" disabled>
                        </div>

                        <div class="w-1/2 ml-1">
                            <label for="workerPhone" class="block text-xs font-medium text-gray-700">Phone</label>
                            <input type="text" name="workerPhone" id="workerPhone"
                                placeholder="Enter worker's phone number"
                                class="mt-1 p-2 w-full border rounded-md text-xs text-center"
                                value="{{ isset($hiringForm->worker) ? $hiringForm->worker->phone : '' }}" disabled>
                        </div>
                    </div>
                </div>

                <!-- Project Details section -->
                <div class="bg-blue-100 p-10 rounded-lg pt-5 pb-5 mt-2">
                    <h2 class="text-sm font-semibold mb-2">Project Details</h2>
                    <div class="w-full mb-2">
                        <label for="projectTitle" class="block text-xs font-medium text-gray-700">Project Title</label>
                        <input type="text" name="projectTitle" id="projectTitle" placeholder="Enter project title"
                            class="mt-1 p-2 w-full border rounded-md text-xs" required
                            value="{{ isset($hiringForm) ? $hiringForm->projectTitle : '' }}">
                    </div>

                    <div class="w-full mb-2">
                        <label for="projectDescription" class="block text-xs font-medium text-gray-700">Project
                            Description</label>
                        <textarea name="projectDescription" id="projectDescription" placeholder="Enter project description"
                            class="mt-1 p-2 w-full border rounded-md text-xs" rows="4" required>{{ isset($hiringForm) ? $hiringForm->projectDescription : '' }}</textarea>
                    </div>

                    <div class="flex mb-2">
                        <div class="w-1/2 mr-1">
                            <label for="startDate" class="block text-xs font-medium text-gray-700">Start Date</label>
                            <input type="text" name="startDate" id="startDate"
                                class="mt-1 p-2 w-full border rounded-md text-xs" placeholder="Select start date"
                                required value="{{ isset($hiringForm) ? $hiringForm->startDate : '' }}">
                        </div>
                        <div class="w-1/2 ml-1">
                            <label for="endDate" class="block text-xs font-medium text-gray-700">End Date</label>
                            <input type="text" name="endDate" id="endDate"
                                class="mt-1 p-2 w-full border rounded-md text-xs" placeholder="Select end date" required
                                value="{{ isset($hiringForm) ? $hiringForm->endDate : '' }}">
                        </div>
                    </div>

                </div>

                <!-- Employer Details section -->
                <div class="bg-blue-100 p-10 rounded-lg pt-5 pb-5 mt-2">
                    <h2 class="text-sm font-semibold mb-2">Employer Details</h2>

                    <!-- Full Name -->
                    <div class="w-full mb-2">
                        <label for="employerFullName" class="block text-xs font-medium text-gray-700">Full Name</label>
                        <input type="text" name="employerFullName" id="employerFullName"
                            placeholder="Enter employer's full name" class="mt-1 p-2 w-full border rounded-md text-xs"
                            value="{{ isset($hiringForm->employer) ? $hiringForm->employer->name : '' }}" required>
                    </div>

                    <!-- Email -->
                    <div class="flex mb-2">
                        <div class="w-1/2 mr-1">
                            <label for="employerEmail" class="block text-xs font-medium text-gray-700">Email</label>
                            <input type="text" name="employerEmail" id="employerEmail"
                                placeholder="Enter employer's email" class="mt-1 p-2 w-full border rounded-md text-xs"
                                value="{{ isset($hiringForm->employer) ? $hiringForm->employer->email : '' }}"
                                required>
                        </div>

                        <!-- Phone -->
                        <div class="w-1/2 ml-1">
                            <label for="employerPhone" class="block text-xs font-medium text-gray-700">Phone</label>
                            <input type="text" name="employerPhone" id="employerPhone"
                                placeholder="Enter employer's phone number"
                                class="mt-1 p-2 w-full border rounded-md text-xs"
                                value="{{ isset($hiringForm->employer) ? $hiringForm->employer->phone : '' }}"
                                required>
                        </div>
                    </div>
                </div>



                <!-- Scope of Work section -->
                <div class="bg-blue-100 p-10 rounded-lg pt-5 pb-5 mt-2">
                    <h2 class="text-sm font-semibold mb-2">Scope of Work</h2>
                    <div class="w-full mb-2">
                        <label for="scopeOfWork" class="block text-xs font-medium text-gray-700">Briefly describe the
                            tasks and responsibilities of the worker.</label>
                        <textarea name="scopeOfWork" id="scopeOfWork" placeholder="Enter scope of work"
                            class="mt-1 p-2 w-full border rounded-md text-xs" rows="4" required>{{ isset($hiringForm) ? $hiringForm->scopeOfWork : '' }}</textarea>
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
                            required value="{{ isset($hiringForm) ? $hiringForm->totalPayment : '' }}">
                    </div>

                    <!-- Payment Frequency -->
                    <div class="w-full mb-2">
                        <label for="paymentFrequency" class="block text-xs font-medium text-gray-700">Payment
                            Frequency</label>
                        <select name="paymentFrequency" id="paymentFrequency"
                            class="mt-1 p-2 w-full border rounded-md text-xs" required>
                            <option value="hourly"
                                {{ isset($hiringForm) && $hiringForm->paymentFrequency === 'hourly' ? 'selected' : '' }}>
                                Hourly</option>
                            <option value="perMilestone"
                                {{ isset($hiringForm) && $hiringForm->paymentFrequency === 'perMilestone' ? 'selected' : '' }}>
                                Per Milestone</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>

                    <!-- Payment Method -->
                    <div class="w-full mb-2">
                        <label for="paymentMethod" class="block text-xs font-medium text-gray-700">Payment
                            Method</label>
                        <select name="paymentMethod" id="paymentMethod"
                            class="mt-1 p-2 w-full border rounded-md text-xs" required>
                            <option value="bankTransfer"
                                {{ isset($hiringForm) && $hiringForm->paymentMethod === 'bankTransfer' ? 'selected' : '' }}>
                                Bank Transfer</option>
                            <option value="cash"
                                {{ isset($hiringForm) && $hiringForm->paymentMethod === 'cash' ? 'selected' : '' }}>
                                Cash</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                </div>

                <!-- Payment Schedule section -->
                <!-- ... (similar structure as Project Details) -->

                <!-- Communication Channels section -->
                <!-- ... (similar structure as Project Details) -->

                <!-- Submit button -->
                <div class="mt-2 flex justify-center">

                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-xs">Submit</button>

                </div>
            </form>
        </div>
    </section>
    </main>
    <!-- Load flatpickr script after the form -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr('#startDate, #endDate', {
            dateFormat: 'Y-m-d',
            // Add other flatpickr options as needed
        });
    </script>
    <!-- End: Main Content -->
</x-app-layout>
