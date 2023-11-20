<x-app-layout>
    <!-- Start: Main Content -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen transition-all main">

        <!-- Start: Header -->
        <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">

            <!-- Start: Logo / Active Menu -->
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-2-line"></i>
            </button>

            <ul class="flex items-center text-sm ml-4">
                <!-- Logo and Active Menu Section -->
                <li class="mr-2">
                    <a href="#" class="text-gray-800 hover:text-gray-600 font-medium2">TasCo</a>
                </li>
                <li class="text-gray-600 mr-2 font-medium2">/</li>
                <li class="text-gray-600 mr-2 font-medium2">Total Users</li>
            </ul>

            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile -->
            <x-admin-profile-dropdown :user="Auth::user()" />
            <!-- End: Profile -->

        </div>
        <!-- End: Header -->

        <!-- Start: Job Seeker Content -->
        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-10 ml-4 mt-4 mr-4 rounded-md">
            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium2">Total Users</div>
                <!-- Add Profile Button -->
                <button type="button" class="font-medium2 text-gray-600 hover:text-gray-600">
                    <a href="{{ route('admin.addProfile') }}">
                        <i class="ri-add-box-line mr-1"></i> Add Profile
                    </a>
                </button>
            </div>

            <div class="overflow-x-auto">
                <!-- Start: Table -->
                <table class="w-full min-w-[540px]">
                    <thead>
                        <!-- Table Header -->
                        <tr>
                            <!-- Columns in the Table -->
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Address
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Is_Verified
                            </th>
                            <th scope="col" class="relative px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>

                    <!-- Table Body -->
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Loop through users and display information in the table -->
                        @foreach($users as $user)
                            <tr>
                                <!-- User Information -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">

                                        @if ($user->avatar == 'avatar.png')
                                            <!-- Use a default avatar if not set -->
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF" alt="Avatar" class="w-8 h-8 rounded-full object-cover block">
                                        @else
                                            <!-- Display user avatar -->
                                            <img src="{{ asset('storage/users-avatar/' . basename($user->avatar)) }}" alt="Avatar" class="w-8 h-8 rounded-full object-cover block">
                                        @endif
                                        
                                        <div class="ml-4">
                                            <div class="text-sm font-medium2 text-gray-900">
                                                <!-- Display user name -->
                                                {{ $user->name }}
                                            </div>
                                            <div class="text-sm text-gray-800">
                                                <!-- Display user email -->
                                                {{ $user->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                    <!-- Display user address -->
                                    {{ $user->address }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                    <!-- Display user role -->
                                    {{ ucfirst(strtolower($user->role)) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                    <!-- Display user verification status -->
                                    {{ $user->is_verified }}
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium2">
                                    <!-- Edit and Delete links for each user -->
                                    <a href="{{ route('admin.editProfile', ['id' => $user->id]) }}" class="text-blue-400 hover:text-blue-600">Edit</a>
                                    <span class="text-gray-600">/</span>
                                    <a href="#" class="text-gray-600 hover:text-gray-600">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- End: Table -->
            </div>
        </div>
         <!-- End: Job Seeker Content -->

    </main>

    <!-- End: Main Content -->
</x-app-layout>
