<x-app-layout>
    <!-- Start: Main Content -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-blue-50 min-h-screen">

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
                <li class="text-gray-600 mr-2 font-medium2">Inbox</li>
            </ul>
            
            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile -->

                <x-admin-profile-dropdown :user="Auth::user()" />

            <!-- End: Profile -->

              
        </div>

        <!-- End: Header -->   

        <div class="flex flex-row h-screen bg-gray-100">
          
            <div class="flex flex-row flex-auto bg-white rounded-tl-xl">
              <div class="flex flex-col w-1/5">
       
                <div class="flex-auto overflow-y-auto">
          
                  <a class="block border-b">
                    <div class="border-l-2 border-transparent hover:bg-gray-100 p-3 space-y-4">
                      <div class="flex flex-row items-center space-x-2">
                        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                        <strong class="flex-grow text-sm">John Doe</strong>
                        <div class="text-sm text-gray-600">5hr</div>
                      </div>
          
                      <div class="flex flex-row items-center space-x-1">
                        <div class="flex-grow truncate text-1xl">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus impedit veritatis culpa sapiente id velit dolorum veniam. </div>
                      </div>
                    </div>
                  </a>
          
                  <a class="block border-b">
                    <div class="border-l-2 border-blue-500 bg-blue-100 p-3 space-y-4">
                      <div class="flex flex-row items-center space-x-2">
                        <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
                        <strong class="flex-grow text-sm">John Doe</strong>
                        <div class="text-sm text-gray-600">5hr</div>
                      </div>
          
                      <div class="flex flex-row items-center space-x-1">
                        
                        <div class="flex-grow truncate text-xs">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloribus impedit veritatis culpa sapiente id velit dolorum veniam.</div>
                      </div>
                    </div>
                  </a>
          
                </div>
              </div>
          
              <div class="w-4/5 border-l border-r border-gray-400 flex flex-col">
                <div class="flex-none h-20 flex flex-row justify-between items-center p-5 border-b">
                  <div class="flex flex-col space-y-1">
                    <strong>John Doe</strong>
                    <input type="text" placeholder="Subject" class="text-sm outline-none border-b text-black placeholder-gray-600"/>
                  </div>
                  
                </div>
          
                <div
                  class="flex-auto overflow-y-auto p-5 space-y-4"
                >
                  <div class="flex flex-row space-x-2">
                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
          
                    <div class="flex flex-col">
                      <div class="bg-gray-200 rounded p-5">
                        Some message text
                      </div>
                      <div class="text-sm text-gray-600">4hr ago</div>
                    </div>
                  </div>

          
                  <div class="flex space-x-2 flex-row-reverse space-x-reverse">
                    <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded block object-cover align-middle">
          
                    <div class="flex flex-col">
                      <div class="bg-blue-100 rounded p-5">
                        Some message text
                      </div>
                      <div class="text-sm text-gray-600">5hr ago</div>
                    </div>
                  </div>
          
                  <div class="flex-none h-40 p-4 pt-0">
                    <textarea class="w-full h-full outline-none border focus:border-blue-600 hover:border-blue-600 rounded p-4 shadow-lg">Hi</textarea>
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