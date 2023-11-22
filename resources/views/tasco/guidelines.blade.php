<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    
    <nav x-data="flex { open: false }" class="bg-white border-b border-gray-100">
        <!-- Start: Sidebar -->
        <div class="fixed top-30 w-64 h-full p-4 z-50 sidebar-menu bg-white">
            <span class="fixed text-lg font-bold h-full ml-3">Settings</span>
            <!-- Start: Logo -->
        <div>
            <a href="#" class="flex items-center pb-4 border-b mt-8">
            </a>
    </div>       
    
    <style>
        .template{
            background-color: #fff; 
            margin-top: 1rem;
            text-align: left;
            width: 60%;
            height: auto;
            margin-left: 30rem;
        }

        span{
            margin-left: 1.5rem;
        }

        .titleinfo{
            font-weight: bold;
            color: rgb(96, 165, 250)
        }


    </style>
            <!-- End: Logo -->  
          
            <!-- Start: Menu -->
            <ul class="mt-4">
               
                <!-- Information Detail/Dashboard Link -->
                <li class="mb-1 group">
                    <a href="{{ route('app.settings') }}" class="flex items-center py-2 px-4 text-gray-800 
                        hover:bg-blue-400 hover:text-white rounded-md
                        group-[.active]:bg-blue-600 group-[.active]:text-white
                        group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                        <i class="ri-user-line mr-3 text-lg"></i>
                        <span class="text-sm">Information Details</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>
    
                <!-- Activity Log Link -->
                <li class="mb-1 group">
                    <a href="{{ route('app.activitylog') }}" class="flex items-center py-2 px-4 text-gray-800 
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
                    <a href="{{ route('app.terms') }}" class="flex items-center py-2 px-4 text-gray-800 
                    hover:bg-blue-400 hover:text-gray-100 rounded-md 
                    group-[.active]:bg-blue-500 group-[.active]:text-white 
                    group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                        <i class="ri-book-read-line mr-3 text-lg"></i>
                        <span class="text-sm">Terms and Conditions</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>
    
                <!-- Guidelines Link -->
                <li class=" ">
                    <a href="{{ route('app.guidelines') }}" class="flex items-center py-2 px-4 text-gray-800 
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

  {{-- CONTENT --}}
  <div class="h-56 grid grid-col-3 divide-y content-center shadow-lg template">
    <div class="grid grid-cols-1">
        <span class="titleinfo text-center text-2xl pb-2 pt-2">Guidelines</span>
    </div>
    <div>  
        <div class="grid grid-cols-1 p-8">
            <span>Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Molestias eum assumenda qui error dicta aut maxime illum porro earum repellat, veritatis magni architecto,
                 maiores dignissimos ex rem quisquam aliquam? Quisquam. Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                 Autem obcaecati nam voluptas ea ex architecto, quam fuga nemo cumque. Hic assumenda molestiae nesciunt delectus 
                 sit natus voluptas reprehenderit facere magni! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, 
                 delectus distinctio architecto cum eaque atque soluta. Aperiam, omnis veniam unde natus sint repellendus tempora inventore. 
                 Eveniet minus quia sed ad. Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            </span>
            <ul class="ml-6 mt-4">
                <li>-Listed rule</li>
                <li>-Listed rule</li>
                <li>-Listed rule</li>
                <li>-Listed rule</li>
                <li>-Listed rule</li>
                <li>-Listed rule</li>
                <li>-Listed rule</li>
            </ul>

            <span class="mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. 
                Molestias eum assumenda qui error dicta aut maxime illum porro earum repellat, veritatis magni architecto,
                 maiores dignissimos ex rem quisquam aliquam? Quisquam. Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                 Autem obcaecati nam voluptas ea ex architecto, quam fuga nemo cumque. Hic assumenda molestiae nesciunt delectus 
                 sit natus voluptas reprehenderit facere magni! Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam, 
                 delectus distinctio architecto cum eaque atque soluta. Aperiam, omnis veniam unde natus sint repellendus tempora inventore. 
                 Eveniet minus quia sed ad. Lorem ipsum dolor sit, amet consectetur adipisicing elit.
            </span>

            <ul class="ml-6 mt-4">
                <li>-Listed punishment</li>
                <li>-Listed punishment</li>
                <li>-Listed punishment</li>
                <li>-Listed punishment</li>
                <li>-Listed punishment</li>
                <li>-Listed punishment</li>
            </ul>


        </div>
        </a>
    </div>
<div>    


</x-app-layout>    