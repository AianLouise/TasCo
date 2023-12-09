<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>


    <body>
        <div class="flex justify-center min-h-screen pb-4 bg-blue-50">
            <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-10 ml-4 mt-4 mr-4 rounded-md w-1/2">
                <div class="flex justify-between mb-4 items-start">
                    <div class="font-medium2 text-xl"><i class="ri-notification-3-line mr-2"></i>Notification</div>
                </div>
        
                <div class="overflow-x-auto">
                    <!-- Employer Table -->
                    <table class="w-full min-w-[540px]">
                        <thead>
                            <!-- Table Header -->
                            <tr class="border-b">
                                <th scope="col"
                                    class="px-10 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider ml-5">
                                    Notification
                                </th>
                                <th scope="col"
                                    class="px-10 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Created at
                                </th>
                            </tr>
                        </thead>
        
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($notifications as $notification)
                                <tr>
                                    <td class="py-4 whitespace-nowrap text-left pr-6">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                            </div>
                                            <div class="">
                                                <div class="text-base font-medium2 text-gray-900">
                                                    {{ $notification->data['message'] }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 whitespace-nowrap text-left pr-6">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                            </div>
                                            <div class="">
                                                <div class="text-base text-gray-800">
                                                    {{ $notification->created_at->format('M d, Y h:i A') }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </body>
</x-app-layout>
