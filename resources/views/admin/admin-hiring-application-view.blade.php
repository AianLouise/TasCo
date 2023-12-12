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
            <div class="text-center grid divide-gray-200 w-full p-4">
                <div class="bg-white shadow-md p-8 w-[50rem] text-center rounded-lg mx-auto">
                    <form method="POST" action="" class="overflow-hidden">
                        @csrf
                        <!-- Form heading -->
                        <h1 class="text-lg font-semibold mb-1">Job Hiring Form</h1>

                        <!-- Employer Details section -->
                        <div class="border border-blue-200 shadow-lg p-10 rounded-lg pt-5 pb-5">
                            <h2 class="text-sm font-semibold mb-2">Employer Details</h2>

                            <div class="grid grid-rows-1 sm:flex sm:items-center justify-center mb-2">
                                <!-- Worker Avatar -->

                                <div>
                                    @if ((isset($hiringForm->employer) ? $hiringForm->employer->avatar : '') == 'avatar.png')
                                        <img src="https://ui-avatars.com/api/?name={{ urlencode(isset($hiringForm->employer) ? $hiringForm->employer->name : '') }}&color=7F9CF5&background=EBF4FF"
                                            alt=""
                                            class="w-32 h-auto mx-auto sm:mx-0 rounded-full shadow-xl avatarimg mb-5 hover:shadow-inner transition-all">
                                    @else
                                        <img src="{{ asset('storage/users-avatar/' . basename(isset($hiringForm->employer) ? $hiringForm->employer->avatar : '')) }}"
                                            alt=""
                                            class="w-32 h-auto mx-auto sm:mx-0 rounded-full shadow-xl avatarimg mb-5 hover:shadow-inner transition-all">
                                    @endif


                                    <!-- Message Link -->
                                    <a href="{{ route('user.chatify', ['user_id' => isset($hiringForm->employer) ? $hiringForm->employer->id : '']) }}"
                                        target="_new"
                                        class="border hover:border-1 hover:border-blue-700 hover:text-blue-500 hover:shadow-inner text-gray font-bold py-2 px-4 rounded w-36 text-sm shadow-md transition-all">
                                        Message
                                    </a>
                                </div>

                                <!-- Worker Information -->
                                <div
                                    class="bg-white text-gray-700 hover:text-black px-6 py-2 rounded-lg sm:ml-12 sm:text-justify divide-w-full  mt-5 sm:mt-0 text-center">
                                    <div class="mb-2 transition-all">
                                        <label for="workerFullName" class="block text-xs font-medium">Full
                                            Name</label>
                                        <p class="py-1 rounded-md bg-blue-100 my-1 sm:pl-2 shadow-xs">
                                            {{ isset($hiringForm->employer) ? $hiringForm->employer->name : '' }}</p>
                                    </div>

                                    <div class="pb-2">
                                        <label for="workerEmail" class="block text-xs font-medium pt-1 ">Email</label>
                                        <p class="py-1 rounded-md bg-blue-100 my-1 sm:pl-2 shadow-xs">
                                            {{ isset($hiringForm->employer) ? $hiringForm->employer->email : '' }}</p>
                                    </div>

                                    <div class="pb-2">
                                        <label for="workerPhone" class="block text-xs font-medium pt-1">Phone</label>
                                        <p class="py-1 rounded-md bg-blue-100 my-1 sm:pl-2 shadow-xs">
                                            {{ isset($hiringForm->employer) ? $hiringForm->employer->phone : '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Project Details section -->
                        <div class="border border-blue-200 bg-white shadow-md  rounded-lg p-4 mt-2">
                            <h2 class="text-sm font-semibold mb-2">Project Details</h2>
                            <div class="bg-white p-4 rounded-lg w-full shadow-inner">
                                <div class="w-full mb-2">
                                    <label for="projectTitle" class="block text-xs font-medium mb-2">Project
                                        Title</label>
                                    <input type="text" name="projectTitle" id="projectTitle"
                                        placeholder="Enter project title"
                                        value="{{ isset($hiringForm) ? $hiringForm->projectTitle : '' }}"
                                        class="border-gray-400 invalid:border-gray-200 hover:bg-blue-500 hover:text-white placeholder:text-gray-500 invalid:bg-blue-100 invalid:shadow-inner bg-white focus:shadow-inner focus:bg-white focus:border-white focus:ring-0 rounded-md shadow-sm w-full text-sm transition-colors"
                                        required disabled>
                                </div>
                                <div class="w-full mb-2">
                                    <label for="projectDescription" class="block text-xs font-medium  mb-2">Project
                                        Description</label>
                                    <textarea name="projectDescription" id="projectDescription" placeholder="Enter project description"
                                        class="border-gray-400 invalid:border-gray-200 placeholder:text-gray-500 hover:bg-blue-500 hover:text-white
                            invalid:text-blue-30 invalid:bg-blue-100 invalid:shadow-inner
                            bg-white focus:shadow-inner focus:bg-white focus:border-white
                            focus:ring-0 rounded-md shadow-sm w-full p-2 text-sm transition-colors
                            "rows="4"
                                        required disabled>{{ isset($hiringForm) ? $hiringForm->projectDescription : '' }}</textarea>
                                </div>
                                <div class="flex mb-2">
                                    <!-- Start Date -->
                                    <div class="w-1/2 mr-1">
                                        <label for="startDate" class="block text-xs font-medium mb-2">Start
                                            Date</label>
                                        <input type="text" name="startDate" id="startDate"
                                            value="{{ isset($hiringForm) ? $hiringForm->startDate : '' }}"
                                            class="border-gray-400 hover:bg-blue-500
                                 hover:placeholder:text-white placeholder:text-blue-400 placeholder:font-semibold placeholder:text-center focus:shadow-inner hover:border-white
                                 focus:bg-white focus:border-white rounded-md shadow-sm w-full text-sm transition-all hover:text-white"
                                            placeholder="Select start date" disabled>
                                    </div>

                                    <!-- End Date -->
                                    <div class="w-1/2 ml-1">
                                        <label for="endDate" class="block text-xs font-medium mb-2">End Date</label>
                                        <input type="text" name="endDate" id="endDate"
                                            value="{{ isset($hiringForm) ? $hiringForm->endDate : '' }}"
                                            class="border-gray-400 hover:bg-blue-500 hover:placeholder:text-white hover:border-white placeholder:text-blue-400 placeholder:font-semibold placeholder:text-center focus:shadow-inner
                                 focus:bg-white focus:border-white rounded-md shadow-sm w-full text-sm transition-all hover:text-white"
                                            placeholder="Select end date" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- Scope of Work section -->
                        <div class="border border-blue-200 bg-white shadow-md p-10 rounded-lg pt-5 pb-5 mt-2">
                            <h2 class="text-sm font-semibold mb-2">Scope of Work</h2>
                            <div class="w-full mb-2 shadow-inner p-4 rounded-lg">
                                <label for="scopeOfWork" class="block text-xs font-medium text-gray-500  mb-2">Briefly
                                    describe
                                    the
                                    tasks
                                    and
                                    responsibilities of the worker.</label>
                                <textarea name="scopeOfWork" id="scopeOfWork" placeholder="Enter scope of work"
                                    class="border-gray-400 invalid:border-gray-200 placeholder:text-gray-500 hover:bg-blue-500 hover:text-white
                            invalid:text-blue-30 invalid:bg-blue-100 invalid:shadow-inner
                            bg-white focus:shadow-inner focus:bg-white focus:border-white
                            focus:ring-0 rounded-md shadow-sm w-full p-2 text-sm transition-colors"
                                    rows="4" required>{{ isset($hiringForm) ? $hiringForm->scopeOfWork : '' }}</textarea>
                            </div>
                        </div>

                        <!-- Payment Terms section -->
                        <div class="border border-blue-200 bg-white shadow-md p-10 rounded-lg pt-5 pb-5 mt-2">
                            <h2 class="text-sm font-semibold mb-2">Payment Terms</h2>

                            <div class="grid grid-rows-1 sm:grid-cols-3 shadow-inner p-4 rounded-lg">
                                <!-- Total Payment -->
                                <div class="w-full mb-2">
                                    <label for="totalPayment" class="block text-xs font-medium  mb-2">Total
                                        Payment</label>
                                    <input type="number" name="totalPayment" id="totalPayment"
                                        value="{{ isset($hiringForm) ? $hiringForm->totalPayment : '' }}"
                                        class="border-gray-400 invalid:border-gray-200 placeholder:text-gray-500 hover:bg-blue-500 hover:text-white
                            invalid:text-blue-30 invalid:bg-blue-100 invalid:shadow-inner
                            bg-white focus:shadow-inner focus:bg-white focus:border-white
                            focus:ring-0 rounded-md shadow-sm w-full p-2 text-sm transition-colors"
                                        placeholder="Enter total payment" required pattern="[0-9]+" disabled>
                                </div>


                                <!-- Payment Frequency -->
                                <div class="w-full mb-2">
                                    <label for="paymentFrequency" class="block text-xs font-medium  mb-2">Payment
                                        Frequency</label>
                                    <select name="paymentFrequency" id="paymentFrequency"
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-40 text-center h-10 text-sm hover:bg-blue-500 hover:text-white"
                                        required disabled>
                                        <option value="hourly"
                                            {{ isset($hiringForm) && $hiringForm->paymentFrequency === 'hourly' ? 'selected' : '' }}>
                                            Hourly</option>
                                        <option value="perDay"
                                            {{ isset($hiringForm) && $hiringForm->paymentFrequency === 'perDay' ? 'selected' : '' }}>
                                            Per Day</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>

                                <!-- Payment Method -->
                                <div class="w-full mb-2">
                                    <label for="paymentMethod" class="block text-xs font-medium  mb-2">Payment
                                        Method</label>
                                    <select name="paymentMethod" id="paymentMethod"
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-40 text-center h-10 text-sm hover:bg-blue-500 hover:text-white"
                                        required disabled>
                                        <option value="bankTransfer"
                                            {{ isset($hiringForm) && $hiringForm->paymentMethod === 'bankTransfer' ? 'selected' : '' }}>
                                            Bank Transfer</option>
                                        <option value="cash"
                                            {{ isset($hiringForm) && $hiringForm->paymentmethod === 'cash' ? 'selected' : '' }}>
                                            Cash</option>
                                        <!-- Add more options as needed -->
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Submit button -->
                        <div class="flex mb-2 mt-6 justify-center space-x-1">
                            @if ($hiringForm->status === 'Pending')
                                {{-- <div class="">
                                    <a href="{{ route('acceptStatus', ['id' => $hiringForm->id]) }}"
                                        class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded text-base w-20">
                                        Accept
                                    </a>
                                </div>
                                <div class="">
                                    <a href="{{ route('rejectStatus', ['id' => $hiringForm->id]) }}"
                                        class="bg-red-500 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded text-base">
                                        Reject
                                    </a>
                                </div> --}}
                            @elseif($hiringForm->status === 'Finished' || $hiringForm->status === 'Completed(Pending)')
                                <div class="flex flex-col justify-center">
                                    <div class="flex flex-col justify-center">
                                        @foreach ($hiringForm->employments as $index => $employment)
                                            <div class="flex flex-col mb-6 items-center">
                                                <h1 class="text-2xl font-bold mb-4">Day {{ $index + 1 }} -
                                                    Documentation</h1>
                                                <div
                                                    class="grid grid-rows-1 sm:flex justify-center sm:justify-between gap-5">
                                                    <div class="w-full sm:w-1/3">
                                                        <img src="{{ asset('storage/documentation/' . basename($employment->image1)) }}"
                                                            alt="Image" class="border shadow-xl rounded-xl">
                                                    </div>
                                                    <div class="w-full sm:w-1/3 flex flex-col items-center">
                                                        <img src="{{ asset('storage/documentation/' . basename($employment->image2)) }}"
                                                            alt="Image" class="border shadow-xl rounded-xl">
                                                    </div>
                                                    <div class="w-full sm:w-1/3">
                                                        <img src="{{ asset('storage/documentation/' . basename($employment->image3)) }}"
                                                            alt="Image" class="border shadow-xl rounded-xl">
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @if ($hiringForm->status === 'Completed(Pending)')
                                            {{-- <div>
                                                <a href="{{ route('worker.MarkAsCompleted', ['id' => $hiringForm->id]) }}"
                                                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Mark as Completed
                                                </a>
                                            </div> --}}
                                        @endif

                                    </div>
                                </div>
                            @endif

                        </div>

                    </form>
                </div>

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
            </div>
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
