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
                    <li class="text-gray-600 mr-2 font-medium2">serv</li>
                </ul>
                
                <!-- End: Logo / Active Menu -->
    
                <!-- Start: Profile -->
    
                    <x-admin-profile-dropdown :user="Auth::user()" />
    
                <!-- End: Profile -->
    
            </div>
    
            <!-- End: Header -->    
    
            <!-- Start: serv Content -->
    
            <div class="w-full min-h-screen bg-blue-50">
    
    
                <!-- Start: serv Table -->
    
                <div class="grid lg:grid-cols-1  md:grid-cols-1 p-6 gap-3">
    
                    <!-- Start: Add Profile Button -->
    
                    <div class="col-span-2 flex flex-auto items-center justify-between p-3 text-sm">
    
                        <div class="font-bold text-gray-600">Services</div>
                        <button type="button"
                            class="font-medium2 text-gray-600 hover:text-gray-600"><i class="ri-add-box-line mr-1"></i>
                            Add Profile
                        </button>
    
                    </div>
    
                    <!-- End: Add Profile Button -->
            
            <div class="col-span-2 flex flex-auto items-center justify-between bg-white rounded-md border p-4 shadow-md shadow-black/5">
    
                        
                <table class="min-w-full divide-y divide-gray-200 table-auto">
                    
                    <!-- Start: Table Column Name -->
    
                    <thead class="">
                        <tr>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                              Title
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                              Description
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                              Category
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                              Author
                            </th>
                            <th scope="col"
                              class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                              Price
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">Action                      
                            </th>
                        </tr>
                    </thead>
                    
                    <tbody class="bg-white divide-y divide-gray-200 ">
                        @foreach($services as $serv)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                {{ Illuminate\Support\Str::limit($serv->title, $limit = 30, $end = '...') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                {{ Illuminate\Support\Str::limit($serv->description, $limit = 30, $end = '...') }}
                            </td>
    
                            <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                {{ $serv->category->name }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                {{ $serv->provider->name }}
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                {{ $serv->price }}
                            </td>
    
                            <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium2 ">
                                <a href="editUser.html" class="text-blue-400 hover:text-blue-600">Edit</a>
                                <span class="text-gray-600">/</span>
                                <a href="#" class="text-gray-600 hover:text-gray-600">Delete</a>
                            </td>
                        </tr>
                        @endforeach    
                    </tbody>
            </table>
        </div>
    </div>
    
    <!-- End: serv Table -->
    
    </div>
    
    <!-- End: serv Content -->
    
    </main>
    
    <!-- End: Main Content -->
        
       
        {{-- <script src="https://unpkg.com/@popperjs/core@2"></script>
        @vite(['resources/js/script.js']) --}}
</x-app-layout>