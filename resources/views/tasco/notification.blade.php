<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>


    <body>
        <div class="flex justify-center min-h-screen p-4 bg-blue-50">
            <div
                class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 md:p-10 w-full max-w-screen-lg rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium2 text-xl"><i class="ri-notification-3-line mr-2"></i>Notification</div>
                </div>

                <div class="overflow-x-auto">
                    <!-- Employer Table -->
                    <table class="w-full">
                        <thead>
                            <!-- Table Header -->
                            <tr class="">
                                <th scope="col"
                                    class="px-4 md:px-10 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider ml-5">
                                    Title
                                </th>
                                <th scope="col"
                                    class="px-4 md:px-10 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider ml-5">
                                    Date
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-gray-50">
                            @forelse ($notifications as $notification)
                                <tr class="border border-gray-300 hover:border-blue-500 cursor-pointer transition-colors duration-300 "
                                    onclick="markAsRead('{{ $notification->id }}', this); openModal('{{ $notification->id }}')">
                                    <td class="py-2 md:py-4 min-w-[150px] whitespace-nowrap text-left px-4 md:pr-6">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-8 w-8 md:h-10 md:w-10 p-2">
                                                <i class="ri-notification-3-line text-blue-500"></i>
                                                <!-- Replace ri-notification-3-line with your desired Remixicon and customize the icon color as needed -->
                                            </div>
                                            <div class="">
                                                <div class="text-sm md:text-base font-medium2 text-gray-900">
                                                    {{ $notification->data['subject'] }}
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
                                                    <i class="ri-time-line"></i>
                                                    {{ $notification->created_at->diffForHumans() }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="2" class="py-4 text-center text-gray-500">No notifications available</td>
                                </tr>
                            @endforelse
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

        @foreach ($notifications as $notification)
            <dialog class="content-center shadow-lg rounded-lg m-auto" id="nameModal-{{ $notification->id }}"
                style="width: 80vw; max-width: 800px; overflow-y: auto;">
                <div class="rounded-md sm:flex sm:items-start justify-center p-10 sm:p-6">
                    <div class="bg-white w-full sm:w-3/4 p-8 rounded-md">
                        <h2 class="text-3xl font-bold mb-4">{{ $notification->data['subject'] }}</h2>
                        <p class="text-gray-600">{{ $notification->data['greeting'] }}</p>
                        <p class="text-gray-800 leading-7 mt-4">{{ $notification->data['message'] }}</p>

                        <!-- You can add additional data here -->
                        @if (!empty($notification->data['additional_data']))
                            <ul class="list-disc pl-6 mt-4">
                                @foreach ($notification->data['additional_data'] as $key => $value)
                                    <li>{{ $key }}: {{ $value }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <p class="text-gray-600 mt-4">{{ $notification->data['closing'] }}</p>
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

        <script>
            function markAsRead(notificationId, row) {
                // Send an AJAX request to mark the notification as read
                fetch(`/mark-as-read/${notificationId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({}),
                    })
                    .then(response => response.json())
                    .then(data => {
                        // Update the UI if the notification was marked as read successfully
                        if (data.success) {
                            row.classList.add('bg-gray-100'); // Change the background color to indicate read
                            // ... Any other UI changes you want to make ...

                            // If you want to ensure the modal opens after marking the notification as read
                            openModal(notificationId);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            }
        </script>



        <x-footer />
    </body>
</x-app-layout>
