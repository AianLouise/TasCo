<x-app-layout>
    <!-- Start: Main Content -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-gray-50 min-h-screen">

        <!-- Start: Header -->

        <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">

            <!-- Start: Logo / Active Menu -->

            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-2-line"></i>
            </button>

            <ul class="flex items-center text-sm ml-4">
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

        <div class="w-full min-h-screen bg-blue-50">


            <!-- Start: Job Seeker Table -->

            <div class="grid lg:grid-cols-1  md:grid-cols-1 p-6 gap-3">

                <!-- Start: Add Profile Button -->

                <div class="col-span-2 flex flex-auto items-center justify-between p-3 text-sm">

                    <div class="font-bold text-gray-600">Profiles</div>
                    <button type="button" class="font-medium2 text-gray-600 hover:text-gray-600">
                        <a href="{{ route('admin.addProfile') }}">
                            <i class="ri-add-box-line mr-1"></i> Add Profile
                        </a>
                    </button>

                </div>

                <!-- End: Add Profile Button -->


                <div class="col-span-2 flex flex-auto items-center justify-between bg-white rounded-md border p-4 shadow-md shadow-black/5">


                    <table class="min-w-full divide-y divide-gray-200 table-auto ">

                        <!-- Start: Table Column Name -->

                        <thead>
                            <tr>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Name
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Address
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Role
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Is_Verified
                                </th>
                                <th scope="col" class="relative px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>

                        <!-- End: Table Column Name -->

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">

                                            @if ($user->avatar == 'avatar.png')
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF" alt="Avatar" class="w-8 h-8 rounded-full object-cover block">
                                            @else
                                                <img src="{{ asset('storage/users-avatar/' . basename($user->avatar)) }}" alt="Avatar" class="w-8 h-8 rounded-full object-cover block">
                                            @endif
                                            
                                            <div class="ml-4">
                                                <div class="text-sm font-medium2 text-gray-900">
                                                    {{ $user->name }}
                                                </div>
                                                <div class="text-sm text-gray-800">
                                                    {{ $user->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                        {{ $user->address }}

                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                        {{ ucfirst(strtolower($user->role)) }}

                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                        {{ $user->is_verified }}
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium2">
                                        <a href="{{ route('admin.editProfile', ['id' => $user->id]) }}" class="text-blue-400 hover:text-blue-600">Edit</a>
                                        <span class="text-gray-600">/</span>
                                        <a href="#" class="text-gray-600 hover:text-gray-600">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>                        
                    </table>
                </div>
            </div>

            <!-- End: Job Seeker Table -->

        </div>

         <!-- End: Job Seeker Content -->

    </main>

    <!-- End: Main Content -->

    {{-- <script src="https://unpkg.com/@popperjs/core@2"></script>
    @vite(['resources/js/script.js']) --}}
</x-app-layout>