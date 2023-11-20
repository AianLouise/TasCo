<x-app-layout>
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
                <li class="text-gray-600 mr-2 font-medium2">Inbox</li>
            </ul>

            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile -->
            <x-admin-profile-dropdown :user="Auth::user()" />
            <!-- End: Profile -->

        </div>
        <!-- End: Header -->

        <!-- Start: Document Table -->
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-10 ml-4 mt-4 mr-4 rounded-md">
            <div class="flex justify-between mb-4 items-start">
                <!-- Heading for Application Section -->
                <div class="font-medium2">Inbox</div>
            </div>

            <!-- Inbox Table -->
            <div class="overflow-x-auto">
                <table class="w-full min-w-[540px]">
                    <thead>
                        <!-- Table Header Row -->
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Subject
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Date Posted
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 ">
                        <!-- Iterate through messages and create table rows -->
                        @foreach ($messages as $message)
                            <tr>
                                <!-- Table Data for Name -->
                                <td class="px-6 py-4 whitespace-nowrap ">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <!-- Display User Avatar -->
                                            @if ($message->avatar == 'avatar.png')
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($message->user->name) }}&color=7F9CF5&background=EBF4FF"
                                                    alt=""
                                                    class="w-8 h-8 rounded block object-cover align-middle">
                                            @else
                                                <img src="{{ asset('storage/users-avatar/' . basename($message->user->avatar)) }}"
                                                    alt=""
                                                    class="w-8 h-8 rounded block object-cover align-middle">
                                            @endif
                                        </div>
                                        <!-- User Name and Email -->
                                        <div class="ml-4">
                                            <div class="text-sm font-medium2 text-gray-900">
                                                {{ $message->user->name }}
                                            </div>
                                            <div class="text-sm text-gray-800">
                                                {{ $message->user->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Table Data for Subject -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                                    <i class="ri-user-3-line mr-1"></i> Sample User
                                </td>

                                <!-- Table Data for Date Posted -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                                    <i class="ri-time-line mr-1"></i> 24 hrs ago
                                </td>

                                <!-- Table Data for Actions (View and Delete) -->
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                                    <a href="{{ route('admin.showEmailView', ['user' => $message->user_id]) }}" class="text-blue-400 hover:text-blue-600">View</a>
                                    <span class="text-gray-600">/</span>
                                    <a href="#" class="text-gray-600 hover:text-gray-600">Delete</a>
                                </td>                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End: Document Table -->
    </main>
    <!-- End: Main Content -->
</x-app-layout>
