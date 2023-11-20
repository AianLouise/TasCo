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
                <li class="text-gray-600 mr-2 font-medium2">Job Seeker</li>
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
                <div class="font-medium2">Job Seeker Profile</div>
                <!-- Add Profile Button -->
                <button type="button" class="font-medium2 text-gray-600 hover:text-gray-600">
                    <a href="{{ route('admin.addProfile') }}">
                        <i class="ri-add-box-line mr-1"></i> Add Profile
                    </a>
                </button>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full min-w-[540px]">
                    <thead>
                        <!-- Table Header Row -->
                        <tr class="border-b">
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Job Position
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Availability
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                Action
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Iterate through workers and create table rows -->
                        @foreach ($workers as $worker)
                            <tr>
                                <!-- Table Data for Name -->
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <!-- Worker Avatar and Details -->
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <!-- Display Avatar -->
                                            @if ($worker->avatar == 'avatar.png')
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($worker->name) }}&color=7F9CF5&background=EBF4FF"
                                                    alt=""
                                                    class="w-8 h-8 rounded block object-cover align-middle">
                                            @else
                                                <img src="{{ asset('storage/users-avatar/' . basename($worker->avatar)) }}"
                                                    alt=""
                                                    class="w-8 h-8 rounded block object-cover align-middle">
                                            @endif
                                        </div>
                                        <!-- Worker Name and Email -->
                                        <div class="ml-4">
                                            <div class="text-sm font-medium2 text-gray-900">
                                                {{ $worker->name }}
                                            </div>
                                            <div class="text-sm text-gray-800">
                                                {{ $worker->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>

                                <!-- Table Data for Job Position -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                    {{ $worker->category->name }}
                                </td>

                                <!-- Table Data for Availability -->
                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                    Available
                                </td>

                                <!-- Table Data for Actions (Edit and Delete) -->
                                <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium2">
                                    <!-- Edit Profile Link -->
                                    <a href="{{ route('admin.editProfile', ['id' => $worker->id]) }}"
                                        class="text-blue-400 hover:text-blue-600">Edit</a>
                                    <span class="text-gray-600">/</span>
                                    <!-- Delete Profile Form -->
                                    <form action="{{ route('admin.deleteProfile', ['id' => $worker->id]) }}"
                                        method="POST" class="inline"
                                        onsubmit="return confirm('Are you sure you want to delete this profile?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-gray-600 hover:text-gray-600">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- End: Job Seeker Content -->
    </main>
    <!-- End: Main Content -->
</x-app-layout>
