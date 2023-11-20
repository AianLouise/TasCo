<x-app-layout>
    <!-- Start: Dashboard -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
        
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
                <li class="text-gray-600 mr-2 font-medium2">Dashboard</li>
            </ul>

            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile -->

            <x-admin-profile-dropdown :user="Auth::user()" />

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->

        <!-- Start: Dashboard Analytics -->

        <div class="w-full min-h-screen p-6 bg-blue-50">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-6">

                <!-- Start: Dashboard Analytics: Job Seeker -->

                <div class="bg-white rounded-md border border-gray-200 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-4">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-2xl font-semibold">{{ $jobSeekersCount }}</div>
                                <div
                                    class="p-1 rounded bg-rose-500/10 text-rose-500 text-[12px] font-semibold leading-none ml-2">
                                    -1%</div>
                            </div>
                            <div class="text-sm font-medium text-gray-800">Job Seekers</div>
                        </div>
                        <div>
                            <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i
                                    class="ri-more-fill"></i></button>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <!-- Display avatars or other content based on your needs -->
                        @php $maxAvatars = 5; @endphp
                        @foreach ($workers->take($maxAvatars) as $worker)
                            @if ($worker->avatar == 'avatar.png')
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($worker->name) }}&color=7F9CF5&background=EBF4FF"
                                    alt="" class="w-8 h-8 rounded block object-cover align-middle">
                            @else
                                <img src="{{ asset('storage/users-avatar/' . basename($worker->avatar)) }}"
                                    alt="" class="w-8 h-8 rounded block object-cover align-middle">
                            @endif
                        @endforeach

                    </div>


                </div>


                <!-- End: Dashboard Analytics: Job Seeker -->

                <!-- Start: Dashboard Analytics: Employer-->

                <div class="bg-white rounded-md border p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-4">
                        <div>
                            <div class="flex items-center mb-1">
                                <div class="text-2xl font-semibold">{{ $employersCount }}</div>
                                <div
                                    class="p-1 rounded bg-blue-500/10 text-blue-500 text-[12px] font-semibold leading-none ml-2">
                                    +1%</div>
                            </div>
                            <div class="text-sm font-medium text-gray-800">Employers</div>
                        </div>
                        <div>
                            <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i
                                    class="ri-more-fill"></i></button>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <!-- Display avatars or other content based on your needs -->
                        @php $maxAvatars = 5; @endphp
                        @foreach ($employers->take($maxAvatars) as $employer)
                            @if ($employer->avatar == 'avatar.png')
                                <img src="https://ui-avatars.com/api/?name={{ urlencode($employer->name) }}&color=7F9CF5&background=EBF4FF"
                                    alt="" class="w-8 h-8 rounded block object-cover align-middle">
                            @else
                                <img src="{{ asset('storage/users-avatar/' . basename($employer->avatar)) }}"
                                    alt="" class="w-8 h-8 rounded block object-cover align-middle">
                            @endif
                        @endforeach
                    </div>

                </div>

                <!-- End: Dashboard Analytics: Employer -->

                <!-- Start: Dashboard Analytics: All Users -->

                <div class="bg-white rounded-md border border-gray-200 p-6 shadow-md shadow-black/5">
                    <div class="flex justify-between mb-6">
                        <div>
                            <div class="text-2xl font-semibold mb-1">{{ $allUsersCount }}</div>
                            <div class="text-sm font-medium text-gray-800">Total Users</div>
                        </div>
                        <div>
                            <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i
                                    class="ri-more-fill"></i></button>
                        </div>
                    </div>
                    <a href="{{ route('admin.viewAllUsers') }}"
                        class="text-blue-500 font-medium text-sm hover:text-blue-600">View all</a>
                </div>

                <!-- End: Dashboard Analytics: All Users -->

            </div>

            <!-- End: Dashboard Analytics -->


            <!-- Start: Documents Preview -->

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">

                <div class="bg-white border border-gray-200 shadow-md shadow-black/5 p-6 rounded-md">
                    <div class="flex justify-between mb-4 items-start">

                        <div class="font-medium">Application</div>

                        <div>
                            <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i
                                    class="ri-more-fill"></i></button>
                            <ul
                                class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-200 w-full max-w-[140px]">
                            </ul>
                        </div>

                    </div>

                    <form action="" class="flex items-center mb-4">
                        <div class="relative w-full mr-2">
                            <input type="text"
                                class="py-2 pr-4 pl-10  w-full outline-none border border-gray-200 rounded-md text-sm focus:border-blue-500"
                                placeholder="Search...">
                            <i class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-800"></i>
                        </div>
                        <select
                            class="text-sm py-2 pl-4 pr-10 border bg-gray-200 border-gray-200 rounded-md focus:border-blue-500 outline-none appearance-none bg-select-arrow bg-no-repeat bg-[length:16px_16px] bg-[right_16px_center]">
                            <option value="">All</option>
                        </select>
                    </form>

                    <div class="overflow-x-auto">
                        <table class="w-full min-w-[540px]">
                            <thead>
                                <tr>
                                    <th
                                        class="text-[12px] uppercase tracking-wide font-medium text-gray-800 py-2 px-4 text-left rounded-tl-md rounded-bl-md">
                                        Name</th>
                                    <th
                                        class="text-[12px] uppercase tracking-wide font-medium text-gray-800 py-2 px-4 text-left">
                                        File Type</th>
                                    <th
                                        class="text-[12px] uppercase tracking-wide font-medium text-gray-800 py-2 px-4 text-left">
                                        Time</th>
                                    <th
                                        class="text-[12px] uppercase tracking-wide font-medium text-gray-800 py-2 px-4 text-left rounded-tr-md rounded-br-md">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-300">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-6">
                                                <i class="ri-attachment-2"></i>
                                            </div>
                                            <a href="#"
                                                class="text-gray-800 text-sm font-medium hover:text-blue-500 truncate">User
                                                No.1 Application for Job Seeking</a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-300">
                                        <span class="text-[13px] font-medium text-gray-800">PDF</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-300">
                                        <span class="text-[13px] font-medium text-gray-800">12:20 PM</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-300">
                                        <div>
                                            <button type="button"
                                                class="dropdown-toggle text-gray-800 hover:text-gray-600 text-sm w-6 h-6 rounded flex items-center justify-center"><i
                                                    class="ri-more-2-fill"></i></button>
                                            <ul
                                                class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-200 w-full max-w-[140px]">
                                            </ul>
                                        </div>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- End: Documents Preview -->

                <!-- Start: Inbox Preview -->

                <div class="bg-white border border-gray-200 shadow-md shadow-black/5 p-6 rounded-md">
                    <div class="flex justify-between mb-4 items-start">
                        <div class="font-medium">Inbox</div>
                        <div>
                            <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i
                                    class="ri-more-fill"></i></button>
                            <ul
                                class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-200 w-full max-w-[140px]">
                            </ul>
                        </div>
                    </div>
                    <form action="" class="flex items-center mb-4">
                        <div class="relative w-full mr-2">
                            <input type="text"
                                class="py-2 pr-4 pl-10 w-full outline-none border border-gray-200 rounded-md text-sm focus:border-blue-500"
                                placeholder="Search...">
                            <i class="ri-search-line absolute top-1/2 left-4 -translate-y-1/2 text-gray-800"></i>
                        </div>
                        <select
                            class="text-sm py-2 pl-4 pr-10 bg-gray-200 border border-gray-200 rounded-md focus:border-blue-500 outline-none appearance-none bg-select-arrow bg-no-repeat bg-[length:16px_16px] bg-[right_16px_center]">
                            <option value="">All</option>
                            <option value="">Unread</option>
                        </select>
                    </form>

                    <div class="overflow-x-auto overflow-y-auto">
                        <table class="w-full min-w-[540px]">
                            <thead>
                                <tr>
                                    <th
                                        class="text-[12px] uppercase tracking-wide font-medium text-gray-800 py-2 px-4 text-left rounded-tl-md rounded-bl-md">
                                        User</th>
                                    <th
                                        class="text-[12px] uppercase tracking-wide font-medium text-gray-800 py-2 px-4 text-left">
                                        Subject</th>
                                    <th
                                        class="text-[12px] uppercase tracking-wide font-medium text-gray-800 py-2 px-4 text-left">
                                        Time</th>
                                    <th
                                        class="text-[12px] uppercase tracking-wide font-medium text-gray-800 py-2 px-4 text-left rounded-tr-md rounded-br-md">
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-300">
                                        <div class="flex items-center">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="w-8 h-8 rounded object-cover block">
                                            <a href="#"
                                                class="text-gray-600 text-sm font-medium hover:text-blue-500 ml-2 truncate">John
                                                Doe</a>
                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-300">
                                        <span class="text-[13px] font-medium text-gray-800">Job Application</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-300">
                                        <span class="text-[13px] font-medium text-gray-800">12:20 PM</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-300">
                                        <div>
                                            <button type="button"
                                                class="dropdown-toggle text-gray-800 hover:text-gray-600 text-sm w-6 h-6 rounded flex items-center justify-center"><i
                                                    class="ri-more-2-fill"></i></button>
                                            <ul
                                                class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-200 w-full max-w-[140px]">
                                            </ul>
                                        </div>
                                    </td>
                                </tr>


                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

            <!-- End: Inbox Preview -->

            <!-- Start: Audit Trail Preview -->

            <div class="bg-white border border-gray-200 shadow-md shadow-black/5 p-6 rounded-md">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium">Audit Trail</div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full min-w-[540px]">
                        <thead>
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
                                    class="relative px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Timestamp
                                </th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($activityLogs->reverse() as $log)
                                <tr>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <div class="flex items-center">
                                            <img src="https://placehold.co/32x32" alt=""
                                                class="w-8 h-8 rounded object-cover block">
                                            <a href="#"
                                                class="text-gray-600 text-sm font-medium2 hover:text-blue-500 ml-2 truncate">
                                                @php
                                                    $user = \App\Models\User::find($log->causer_id);
                                                @endphp
                                                {{ $user ? $user->name : 'Unknown User' }}
                                            </a>

                                        </div>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span
                                            class="text-[13px] font-medium2 text-gray-400 ml-6">{{ $log->causer_id }}</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span
                                            class="text-[13px] font-medium2 text-gray-400">{{ $log->log_name }}</span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span
                                            class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium2 text-[12px] leading-none">
                                            {{ $log->description }}
                                        </span>
                                    </td>
                                    <td class="py-2 px-4 border-b border-b-gray-50">
                                        <span
                                            class="text-[13px] font-medium2 text-gray-400">{{ $log->created_at->tz('Asia/Manila')->format('M d, Y, h:i A') }}</span>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <!-- End: Dashboard -->
</x-app-layout>
