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
                    <a href="#" class="text-gray-800 hover:text-gray-400 font-medium2">TasCo</a>
                </li>
                <li class="text-gray-600 mr-2 font-medium2">/</li>
                <li class="text-gray-600 mr-2 font-medium2">Audit Trail</li>
            </ul>
            
            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile -->

                <x-admin-profile-dropdown :user="Auth::user()" />

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->  
        





        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-6 rounded-md ">
            <div class="flex justify-between mb-4 items-start">
                <div class="font-medium2">Audit Trail</div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full min-w-[540px]">
                    <thead>
                        <tr>
                            <th class="text-[12px] uppercase tracking-wide font-medium2 text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tl-md rounded-bl-md">User</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium2 text-gray-400 py-2 px-4 bg-gray-50 text-left">Entity Id</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium2 text-gray-400 py-2 px-4 bg-gray-50 text-left">Action</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium2 text-gray-400 py-2 px-4 bg-gray-50 text-left rounded-tr-md rounded-br-md">Status</th>
                            <th class="text-[12px] uppercase tracking-wide font-medium2 text-gray-400 py-2 px-4 bg-gray-50 text-left">Timestamp</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                    <a href="#" class="text-gray-600 text-sm font-medium2 hover:text-blue-500 ml-2 truncate">John Doe</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">3xdo090</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">POST</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium2 text-[12px] leading-none">Active</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">NOV 8, 2023, 12:20 PM</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                    <a href="#" class="text-gray-600 text-sm font-medium2 hover:text-blue-500 ml-2 truncate">John Doe</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">3xdo091</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">POST</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-gray-500/10 text-emerald-500 font-medium2 text-[12px] leading-none">Offline</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">NOV 8, 2023, 12:20 PM</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                    <a href="#" class="text-gray-600 text-sm font-medium2 hover:text-blue-500 ml-2 truncate">John Doe</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">3xdo092</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">POST</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium2 text-[12px] leading-none">Offline</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">NOV 8, 2023, 12:20 PM</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                    <a href="#" class="text-gray-600 text-sm font-medium2 hover:text-blue-500 ml-2 truncate">John Doe</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">3xdo093</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">GET</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium2 text-[12px] leading-none">Offline</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">NOV 8, 2023, 12:20 PM</span>
                            </td>
                        </tr>

                        <tr>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <div class="flex items-center">
                                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover block">
                                    <a href="#" class="text-gray-600 text-sm font-medium2 hover:text-blue-500 ml-2 truncate">John Doe</a>
                                </div>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">3xdo091</span>
                            </td>
                            
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">POST</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="inline-block p-1 rounded bg-emerald-500/10 text-emerald-500 font-medium2 text-[12px] leading-none">Offline</span>
                            </td>
                            <td class="py-2 px-4 border-b border-b-gray-50">
                                <span class="text-[13px] font-medium2 text-gray-400">NOV 8, 2023, 12:20 PM</span>
                            </td>
                        </tr>

                    
                    </tbody>
                </table>
                
            </div>
        </div>




    </main>
    <!-- end: Main -->

<script src="https://unpkg.com/@popperjs/core@2"></script>
    @vite(['resources/js/script.js'])
</x-app-layout>