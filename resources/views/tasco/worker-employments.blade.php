<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>


    <body>
        <div class="flex flex-col items-center min-h-screen p-4 bg-blue-50">
            <div
                class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 md:p-10 w-full max-w-screen-lg rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium2 text-xl"><i class="ri-briefcase-line mr-2"></i>Employments</div>
                </div>

                <div class="overflow-x-auto">
                    <!-- Employer Table -->
                    <table class="w-full">
                        <thead>
                            <!-- Table Header -->
                            <tr class="border-b">
                                <th scope="col"
                                    class="px-4 md:px-10 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider ml-5">
                                    Title
                                </th>
                                <th scope="col"
                                    class="px-4 md:px-10 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider ml-5">
                                    Start Date
                                </th>
                                <th scope="col"
                                    class="px-4 md:px-10 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider ml-5">
                                    End Date
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-gray-50">
                            <!-- Add an empty row with borders -->
                            <tr class="border-b border-t border-gray-300"></tr>

                            @foreach ($hiringForms as $form)
                                @if ($form->status === 'Completed')
                                    <tr class="border border-gray-300 hover:border-blue-500 cursor-pointer transition-colors duration-300 "
                                        onclick="openModal('{{ $form->id }}')">
                                        <td class="py-2 md:py-4 min-w-[150px] whitespace-nowrap text-left px-4 md:pr-6">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-8 w-8 md:h-10 md:w-10">
                                                    <!-- You can add an icon or image here if needed -->
                                                </div>
                                                <div class="">
                                                    <div class="text-sm md:text-base font-medium2 text-gray-900">
                                                        {{ $form->projectTitle }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-2 md:py-4 min-w-[150px] whitespace-nowrap text-left px-4 md:pr-6">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-8 w-8 md:h-10 md:w-10">
                                                    <!-- You can add an icon or image here if needed -->
                                                </div>
                                                <div class="">
                                                    <div class="text-sm md:text-base font-medium2 text-gray-900">
                                                        {{ $form->startDate->format(' F j, Y') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="py-2 md:py-4 min-w-[150px] whitespace-nowrap text-left px-4 md:pr-6">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-8 w-8 md:h-10 md:w-10">
                                                    <!-- You can add an icon or image here if needed -->
                                                </div>
                                                <div class="">
                                                    <div class="text-sm md:text-base font-medium2 text-gray-900">
                                                        {{ $form->endDate->format(' F j, Y') }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


        <script>
            function openModal(formId) {
                // Close any open dialogs
                const dialogs = document.querySelectorAll('dialog');
                dialogs.forEach(dialog => dialog.close());

                // Open the specific dialog by ID
                const modal = document.getElementById('nameModal-' + formId);
                modal.showModal();
            }
        </script>

        @foreach ($hiringForms as $form)
            <dialog class="content-center shadow-lg rounded-lg m-auto" id="nameModal-{{ $form->id }}"
                style="width: 80vw; max-width: 800px; overflow-y: auto;">
                <div class="rounded-md sm:flex sm:items-start justify-center pt-10 pb-4 sm:pb-2">
                    <div class="grid sm:flex sm:flex-col justify-center items-center">
                        @if (isset($form->employer))
                            @php
                                $employer_id = $form->employer->id;
                                $avatar = $form->employer->avatar;
                            @endphp

                            @if ($avatar == 'avatar.png')
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($form->employer->name) }}&color=7F9CF5&background=EBF4FF"
                                    alt=""
                                    class="sm:w-40 hover:w-48 w-52 h-auto transition-all rounded-full shadow-md avatarimg -mt-40 sm:mt-4 sm:mb-4">
                            @else
                                <img src="{{ asset('storage/users-avatar/' . basename($avatar)) }}" alt=""
                                    class="sm:w-40 w-52 h-auto transition-all rounded-full shadow-md avatarimg mb-4">
                            @endif
                        @endif
                    </div>

                    <div class="sm:ml-10 mt-4 bg-blue-100 p-4 sm:p-6 divide-y-2 divide-gray-500 rounded-xl shadow-md">
                        <h2 class="text-xl font-medium text-gray-800 mb-2">Employer Name:
                            {{ $form->employer->name ?? 'N/A' }}<span class="text-blue-600 text-lg"> </span></h2>
                        <h2 class="text-xl font-medium text-gray-800 mb-2">Email:
                            {{ $form->employer->email ?? 'N/A' }}<span class="text-blue-600 text-lg"></span></h2>
                        <h2 class="text-xl font-medium text-gray-800 mb-2">Address:
                            {{ $form->employer->address ?? 'N/A' }}<span class="text-blue-600 text-lg"></span></h2>
                        <h2 class="text-xl font-medium text-gray-800 mb-2">Phone:
                            {{ $form->employer->phone ?? 'N/A' }}<span class="text-blue-600 text-lg"></span></h2>
                    </div>

                </div>

                <!-- New Section for Project Information with Styled Design -->
                <div class="bg-white rounded-md mt-2 text-center">
                    <h2 class="text-2xl font-bold text-gray-800 pb-4">Project Information</h2>
                    <div class="">
                        <div class="p-2 sm:p-10 rounded-lg bg-gray-100">
                            <div class="w-full mb-2 grid grid-flow-row-dense grid-cols-3">
                                <p class="block text-md sm:text-xl text-left font-medium text-gray-700 pt-2">
                                    Title:</p>
                                <input type="text" name="Username" id="Username" placeholder="Enter UserName"
                                    class="mt-1 p-2 w-full border rounded-md text-xs text-center col-span-2"
                                    value="{{ $form->projectTitle }}" disabled>
                            </div>
                            <div class="w-full mb-2 grid grid-flow-row-dense grid-cols-3">
                                <p class="block text-md sm:text-xl text-left font-medium text-gray-700 pt-2">
                                    Description:</p>
                                <input type="text" name="Username" id="Username" placeholder="Enter UserName"
                                    class="mt-1 p-2 w-full border rounded-md text-xs text-center col-span-2"
                                    value="{{ $form->projectDescription }}" disabled>
                            </div>
                            <div class="w-full mb-2 grid grid-flow-row-dense grid-cols-3">
                                <p class="block  text-md sm:text-xl text-left font-medium text-gray-700 pt-2">
                                    Start Date:</p>
                                <input type="text" name="Username" id="Username" placeholder="Enter UserName"
                                    class="mt-1 p-2 w-full border rounded-md text-xs text-center col-span-2"
                                    value="{{ $form->startDate->format('l, F j, Y') }}" disabled>
                            </div>
                            <div class="w-full mb-2 grid grid-flow-row-dense grid-cols-3">
                                <p class="block  text-md sm:text-xl text-left font-medium text-gray-700 pt-2">
                                    End Date:</p>
                                <input type="text" name="Username" id="Username" placeholder="Enter UserName"
                                    class="mt-1 p-2 w-full border rounded-md text-xs text-center col-span-2"
                                    value="{{ $form->endDate->format('l, F j, Y') }}" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col justify-center">
                    <div class="flex flex-col justify-center">
                        @foreach ($form->employments as $index => $employment)
                            <div class="flex flex-col mb-6 items-center">
                                <h1 class="text-2xl font-bold mb-4">Day {{ $index + 1 }} - Documentation</h1>
                                <div class="flex">
                                    <div class="w-1/3 m-1">
                                        @if ($employment->image1)
                                            <img src="{{ asset('storage/documentation/' . basename($employment->image1)) }}"
                                                alt="Image1">
                                        @else
                                            <p class="text-gray-500">No Image Available</p>
                                        @endif
                                    </div>
                                    <div class="w-1/3 m-1">
                                        @if ($employment->image2)
                                            <img src="{{ asset('storage/documentation/' . basename($employment->image2)) }}"
                                                alt="Image2">
                                        @else
                                            <p class="text-gray-500">No Image Available</p>
                                        @endif
                                    </div>
                                    <div class="w-1/3 m-1">
                                        @if ($employment->image3)
                                            <img src="{{ asset('storage/documentation/' . basename($employment->image3)) }}"
                                                alt="Image3">
                                        @else
                                            <p class="text-gray-500">No Image Available</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </dialog>
        @endforeach

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Add click event listener to open-button
                const openButtons = document.querySelectorAll('.open-button');
                openButtons.forEach((openButton) => {
                    openButton.addEventListener('click', () => {
                        const hiringFormId = openButton.getAttribute('data-id');
                        const modalId = `nameModal-${hiringFormId}`;
                        const modal = document.getElementById(modalId);
                        modal.showModal();
                    });
                });

                // Add click event listener to close the dialog when clicking outside
                const modals = document.querySelectorAll('dialog');
                modals.forEach((modal) => {
                    modal.addEventListener('click', (e) => {
                        if (e.target === modal) {
                            modal.close();
                        }
                    });
                });
            });
        </script>
        <x-footer />
    </body>
</x-app-layout>
