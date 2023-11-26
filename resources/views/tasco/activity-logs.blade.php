<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    <style>
        .template {
            background-color: #fff;
            margin-top: 1rem;
            text-align: left;
            /* width: 60%; */
            height: auto;
            margin-left: 30rem;
        }

        .span-left {
            margin-left: 1.5rem;
        }

        .titleinfo {
            font-weight: bold;
            color: rgb(96, 165, 250)
        }

        #modal,
        #editModal,
        #verify-modal {
            /* padding: 5em; */
            /* max-width: 20rem; */
            top: 40%;
            left: 45%;
            right: 50%;
            /* & > *{
            margin: 0 0 0 0.5rem 0;
        } */
        }
    </style>
    <!-- End: Logo -->

    <section>
        <nav x-data="flex { open: false }" class="bg-white border-b border-gray-100">
            <!-- Start: Sidebar -->
            <div class="fixed top-30 w-64 h-full p-4 z-50 sidebar-menu bg-white">
                <div class="flex justify-between">
                    <span class="text-lg font-bold ml-2">Settings</span>
                    <i id="settings-icon" class="ri-menu-fold-fill text-xl text-gray-800"></i>
                </div>

                <!-- Start: Logo -->
                <div>
                    <a href="#" class="flex items-center pb-4 border-b">
                    </a>
                </div>
                <!-- End: Logo -->

                <!-- Start: Menu -->
                <ul class="mt-4">

                    <!-- Information Detail/Dashboard Link -->
                    <li class="mb-1 group {{ request()->routeIs('app.settings') ? 'active' : '' }}">
                        <a href="{{ route('app.settings') }}"
                            class="flex items-center py-2 px-4 text-gray-800 
                                            hover:bg-blue-400 hover:text-white rounded-md
                                            group-[.active]:bg-blue-600 group-[.active]:text-white
                                            group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                            <i class="ri-user-line mr-3 text-lg"></i>
                            <span class="text-sm">Information Details</span>
                            <i class="ri-arrow-right-s-line ml-auto"></i>
                        </a>
                    </li>

                    <!-- Activity Log Link -->
                    <li class="mb-1 group {{ request()->routeIs('app.activitylog') ? 'active' : '' }}">
                        <a href="{{ route('app.activitylog') }}"
                            class="flex items-center py-2 px-4 text-gray-800 
                                            hover:bg-blue-400 hover:text-white rounded-md 
                                            group-[.active]:bg-blue-600 group-[.active]:text-white 
                                            group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                            <i class="ri-history-line mr-3 text-lg"></i>
                            <span class="text-sm">Activity Log</span>
                            <i class="ri-arrow-right-s-line ml-auto"></i>
                        </a>
                    </li>
                </ul>
                <span class="flex text-lg font-bold ml-3 border-t items-center pb-2 pt-2 mt-2">Community</span>
                <!-- Start: Logo -->
                <div>
                    <a href="#" class="flex items-center pb-2 border-b">
                    </a>
                </div>


                <ul class="mt-4">

                    <!-- Terms and Conditions Link -->
                    <li class="mb-1 group">
                        <a href="{{ route('app.terms') }}"
                            class="flex items-center py-2 px-4 text-gray-800 
                                            hover:bg-blue-400 hover:text-gray-100 rounded-md 
                                            group-[.active]:bg-blue-500 group-[.active]:text-white 
                                            group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                            <i class="ri-book-read-line mr-3 text-lg"></i>
                            <span class="text-sm">Terms and Conditions</span>
                            <i class="ri-arrow-right-s-line ml-auto"></i>
                        </a>
                    </li>

                    <!-- Guidelines Link -->
                    <li class="mb-1 group ">
                        <a href="{{ route('app.guidelines') }}"
                            class="flex items-center py-2 px-4 text-gray-800 
                                            hover:bg-blue-400 hover:text-gray-100 rounded-md 
                                            group-[.active]:bg-blue-500 group-[.active]:text-white 
                                            group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                            <i class="ri-shake-hands-line mr-3 text-lg"></i>
                            <span class="text-sm">Community Guideline</span>
                            <i class="ri-arrow-right-s-line ml-auto"></i>
                        </a>
                    </li>
                </ul>
                <!-- End: Menu -->
                <div class="fixed top-5 left-0 w-full h-full z-40 sm:hidden md:hidden sidebar-overlay ml-53">
                    <!-- Mobile Sidebar Overlay Icon -->
                    <i class="ri-menu-line text-xl text-gray-800"></i>
                </div>

            </div>
            <!-- End: Sidebar -->
        </nav>
    </section>


    {{-- Content --}}
    <div class="p-2 mt">
        <i id="show-sidebar-icon" class="ri-settings-5-fill text-2xl text-gray-800"></i>
    </div>
    <div
        class="bg-white border border-gray-100 shadow-md shadow-black/5 p-5 md:w-1/2 mx-auto w-full mt-4 rounded-md lg:px-4">
        <div class="pl-4 grid grid-cols-1">
            <span class="titleinfo text-2xl pb-2 pt-2">Activity Log</span>
        </div>

        <table class="border-collapse w-full mt-4">
            <thead>
                <tr>
                    <th class="py-2 px-2 md:px-4">Name</th>
                    <th class="py-2 px-2 md:px-4">Action</th>
                    <th class="py-2 px-2 md:px-4">Description</th>
                    <th class="py-2 px-2 md:px-4">Timestamp</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activityLogs->reverse() as $log)
                    <tr class="open-button cursor-pointer hover:text-white group-[.active]:bg-blue-600 group-[.active]:text-white group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                        <td class="py-2 px-2 md:px-4 border-b border-b-gray-50 text-center">
                            <div class="flex items-center">
                                @php
                                    $user = \App\Models\User::find($log->causer_id);
                                @endphp
                                @if ($user->avatar == 'avatar.png')
                                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF"
                                        alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                @else
                                    <img src="{{ asset('storage/users-avatar/' . basename($user->avatar)) }}"
                                        alt="" class="w-8 h-8 rounded block object-cover align-middle">
                                @endif
                                <a href="#" class="text-gray-600 text-xs md:text-sm font-medium2 hover:text-blue-500 ml-2 truncate">
                                    {{ $user ? $user->name : 'Unknown User' }}
                                </a>
                            </div>
                        </td>
                        <td class="py-2 px-2 md:px-4 border-b border-b-gray-50 text-center">
                            <span class="text-[12px] md:text-[13px] font-medium2 text-gray-400">{{ $log->log_name }}</span>
                        </td>
                        <td class="py-2 px-2 md:px-4 border-b border-b-gray-50 text-center">
                            <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium2 text-xs md:text-[12px] leading-none">
                                {{ $log->description }}
                            </span>
                        </td>
                        <td class="py-2 px-2 md:px-4 border-b border-b-gray-50 text-center">
                            <span class="text-[12px] md:text-[13px] font-medium2 text-gray-400">{{ $log->created_at->tz('Asia/Manila')->format('M d, Y, h:i A') }}</span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        



    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const settingsSidebar = document.querySelector('.sidebar-menu');
            const sidebarOverlay = document.querySelector('.sidebar-overlay');
            const showSidebarIcon = document.getElementById('show-sidebar-icon');

            function toggleSidebar() {
                settingsSidebar.classList.toggle('hidden');
                sidebarOverlay.classList.toggle('hidden');
            }

            // Event listener for the settings icon click
            const settingsIcon = document.getElementById('settings-icon');
            if (settingsIcon) {
                settingsIcon.addEventListener('click', toggleSidebar);
            }

            // Event listener for the show sidebar icon click
            if (showSidebarIcon) {
                showSidebarIcon.addEventListener('click', toggleSidebar);
            }

            // Event listener for the sidebar overlay click to close the sidebar
            sidebarOverlay.addEventListener('click', toggleSidebar);
        });
    </script>
</x-app-layout>
