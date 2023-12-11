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
                                Action
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Description
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Timestamp
                            </th>
                        </tr>
                    </thead>
        
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Loop through SOS alerts to populate the table rows dynamically -->
                        @foreach($sosAlerts as $sosAlert)
                            <tr>
                                <!-- User Column -->
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <div class="flex items-center">
                                        <img src="{{ $sosAlert->user->avatar_url }}" alt="User Avatar" class="w-6 h-6 rounded-full mr-2">
                                        <span class="text-gray-800 font-medium2">{{ $sosAlert->user->name }}</span>
                                    </div>
                                </td>
        
                                <!-- User Id Column -->
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-gray-400 text-[13px] font-medium2 ml-6">{{ $sosAlert->user->id }}</span>
                                </td>
        
                                <!-- Action Column -->
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-gray-400 text-[13px] font-medium2">{{ $sosAlert->action }}</span>
                                </td>
        
                                <!-- Description Column -->
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="inline-block p-1 rounded bg-{{ $sosAlert->status === 'emergency' ? 'red' : 'green' }}-500/10 text-{{ $sosAlert->status === 'emergency' ? 'red' : 'green' }}-500 font-medium2 text-[12px] leading-none">
                                        {{ $sosAlert->description }}
                                    </span>
                                </td>
        
                                <!-- Timestamp Column -->
                                <td class="py-2 px-4 border-b border-b-gray-50">
                                    <span class="text-gray-800 text-[13px] font-medium2">{{ $sosAlert->created_at->format('Y-m-d h:i A') }}</span>
                                </td>
                            </tr>
                        @endforeach
                        <!-- End of loop -->
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- End: Main Content -->
</x-app-layout>
