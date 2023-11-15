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
                <li class="text-gray-600 mr-2 font-medium2">Application</li>
            </ul>
            
            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile -->

              <x-admin-profile-dropdown :user="Auth::user()" />

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->  

        <!-- Start: Documents Content -->

        <div class="w-full min-h-screen bg-blue-50">


            <!-- Start: Document Table -->
        <div class="grid lg:grid-cols-1  md:grid-cols-1 p-6 gap-3">
            <div class="col-span-2 flex flex-auto items-center justify-between bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/5  ">
              <table class="min-w-full divide-y divide-gray-200 table-auto "> 
                <thead>
                    <tr>
                      <th scope="col"
                          class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                          Pending Documents
                      </th>
                      <th scope="col"
                          class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                          Author
                        </th>
                        <th scope="col"
                          class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                          Date Posted
                        </th>

                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">Action                      
                        </th>
                    </tr>
                  </thead>             
                <tbody class="bg-white divide-y divide-gray-200 ">
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap ">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 w-6">
                            <i class="ri-attachment-2 "></i>
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            User No.1 Application for Job Seeking
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                        <i class="ri-user-3-line mr-1"></i> Sample User
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                        <i class="ri-time-line mr-1"></i> 24 hrs ago
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium ">
                        <a href="editUser.html" class="text-blue-400 hover:text-blue-600">View</a>
                        <span class="text-gray-600">/</span>
                        <a href="#" class="text-gray-600 hover:text-gray-600">Delete</a>
                    </td>
                  </tr>
                  
                  <tr>
                    <td class="px-6 py-4 whitespace-nowrap ">
                      <div class="flex items-center">
                        <div class="flex-shrink-0 w-6">
                            <i class="ri-attachment-2 "></i>
                        </div>
                        <div class="ml-4">
                          <div class="text-sm font-medium text-gray-900">
                            User No.2 Application for Job Seeking
                          </div>
                        </div>
                      </div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                        <i class="ri-user-3-line mr-1"></i> Sample User
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap font-medium text-sm text-gray-800">
                        <i class="ri-time-line mr-1"></i> 24 hrs ago
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium ">
                        <a href="editUser.html" class="text-blue-400 hover:text-blue-600">View</a>
                        <span class="text-gray-600">/</span>
                        <a href="#" class="text-gray-600 hover:text-gray-600">Delete</a>
                    </td>
                  </tr>
  
                  <!-- More people... -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





    </main>
    <!-- end: Main -->
   
    {{-- <script src="https://unpkg.com/@popperjs/core@2"></script>
    @vite(['resources/js/script.js']) --}}
</x-app-layout>