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
                <li class="text-gray-600 mr-2 font-medium2">Emergency Assistance</li>
            </ul>

            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile Dropdown -->
            <x-admin-profile-dropdown :user="Auth::user()" />
            <!-- End: Profile Dropdown -->

        </div>
        <!-- End: Header -->

        <!-- Add this to the head of your HTML file -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA9GCnilYsXt550QxIM0lj_XyLun_DmNvM&libraries=places">
        </script>

        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-10 ml-4 mt-4 mr-4 rounded-md">
            <div class="flex justify-between mb-4 items-start">
                <!-- Heading for SOS Alerts Section -->
                <div class="font-medium2">SOS Alerts</div>
            </div>

            <div class="overflow-x-auto">
                <!-- SOS Alerts Table -->
                <table class="w-full min-w-[540px]">
                    <thead>
                        <!-- Table Header -->
                        <tr class="border-b">
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                User
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                User Id
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Location
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Details
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Timestamp
                            </th>
                        </tr>
                    </thead>

                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Loop through SOS alerts to populate the table rows dynamically -->
                        @foreach ($sosAlerts as $sosAlert)
                            <tr class="border border-gray-300 hover:border-blue-500 hover:bg-blue-50 cursor-pointer transition-colors duration-300 "
                                onclick="openModal('{{ $sosAlert->id }}')">
                                <!-- User Column -->
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <span class="text-gray-800 font-medium2">{{ $sosAlert->user->name }}</span>
                                    </div>
                                </td>

                                <!-- User Id Column -->
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span
                                        class="text-gray-400 text-[13px] font-medium2 ml-6">{{ $sosAlert->user->id }}</span>
                                </td>

                                <!-- Location Column -->
                                <td class="py-2 border-b border-b-gray-50">
                                    <div>
                                        <span class="text-gray-400 text-[13px] font-medium2 ml-6">Latitude:
                                            {{ $sosAlert->latitude }}</span>
                                    </div>
                                    <div>
                                        <span class="text-gray-400 text-[13px] font-medium2 ml-6">Longitude:
                                            {{ $sosAlert->longitude }}</span>
                                    </div>
                                </td>

                                <!-- Description Column -->
                                <td class="py-2  border-b border-b-gray-50">
                                    <span
                                        class="text-gray-400 text-[13px] font-medium2 ml-6">{{ $sosAlert->details }}</span>
                                </td>

                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span
                                        class="inline-block p-1 rounded bg-red-500/10 text-{{ $sosAlert->status === 'emergency' ? 'red' : 'green' }}-500 font-medium2 text-[12px] leading-none">
                                        {{ $sosAlert->status }}
                                    </span>
                                </td>

                                <!-- Timestamp Column -->
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span
                                        class="text-gray-800 text-[13px] font-medium2">{{ $sosAlert->created_at->format('Y-m-d h:i A') }}</span>
                                </td>
                            </tr>

                            <!-- Modal for each SOS alert -->
                            <!-- Modal for each SOS alert -->
                            <dialog class="content-center bg-blue-50 shadow-lg rounded-lg m-auto"
                                id="nameModal-{{ $sosAlert->id }}"
                                style="width: 80vw; max-width: 800px; overflow-y: auto;">
                                <div class="rounded-md sm:flex sm:items-start justify-center p-10 sm:p-6">
                                    <!-- Inside your dialog content -->
                                    <div class="bg-white w-full sm:w-3/4 p-8 rounded-md">
                                        <!-- Display Google Map with latitude and longitude -->
                                        <div id="map-{{ $sosAlert->id }}"
                                            style="height: 300px; border-radius: 8px; overflow: hidden;"></div>

                                        <!-- Other modal content goes here -->

                                        <!-- Example: Display SOS alert details -->
                                        <h2 class="text-2xl font-bold mb-4 text-gray-800">{{ $sosAlert->details }}</h2>
                                        <p class="text-gray-600 mb-4">
                                            {{ $sosAlert->created_at->format('Y-m-d h:i A') }}</p>

                                        <!-- You can add more SOS alert details here -->

                                        <!-- Example: Display map script -->
                                        <script>
                                            // Initialize the map
                                            function initMap{{ $sosAlert->id }}() {
                                                const sosAlertLocation = {
                                                    lat: {{ $sosAlert->latitude }},
                                                    lng: {{ $sosAlert->longitude }}
                                                };

                                                // Create a map centered at the SOS alert location
                                                const map = new google.maps.Map(document.getElementById('map-{{ $sosAlert->id }}'), {
                                                    center: sosAlertLocation,
                                                    zoom: 15, // Adjust the zoom level as needed
                                                    styles: [{
                                                            "featureType": "poi",
                                                            "stylers": [{
                                                                "visibility": "off"
                                                            }]
                                                        },
                                                        {
                                                            "featureType": "transit",
                                                            "stylers": [{
                                                                "visibility": "off"
                                                            }]
                                                        }
                                                        // Add more map styles as needed
                                                    ]
                                                });

                                                // Add a marker at the SOS alert location
                                                const marker = new google.maps.Marker({
                                                    position: sosAlertLocation,
                                                    map: map,
                                                    title: 'SOS Alert Location',
                                                });
                                            }

                                            // Call the initMap function when the page is loaded
                                            google.maps.event.addDomListener(window, 'load', initMap{{ $sosAlert->id }});
                                        </script>
                                    </div>
                                </div>
                            </dialog>
                        @endforeach
                        <!-- End of loop -->
                    </tbody>
                </table>
            </div>
        </div>

        <script>
            function openModal(sosAlertId) {
                // Close any open dialogs
                const dialogs = document.querySelectorAll('dialog');
                dialogs.forEach(dialog => dialog.close());

                // Open the specific dialog by ID
                const modal = document.getElementById('nameModal-' + sosAlertId);
                modal.showModal();
            }

            document.addEventListener('DOMContentLoaded', function() {
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



    </main>
    <!-- End: Main Content -->
</x-app-layout>
