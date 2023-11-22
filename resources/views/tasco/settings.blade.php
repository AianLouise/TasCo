<x-app-layout>

    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>

    <style>
        .template{
            background-color: #fff; 
            margin-top: 1rem;
            text-align: left;
            /* width: 60%; */
            height: auto;
            margin-left: 30rem;
        }

        .span-left{
            margin-left: 1.5rem;
        }

        .titleinfo{
            font-weight: bold;
            color: rgb(96, 165, 250)
        }

        #modal,
        #editModal,
        #verify-modal{
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

                <section>
                    <div>   
                        <nav x-data="flex { open: false }" class="bg-white border-b border-gray-100">
                            <!-- Start: Sidebar -->
                            <div class="fixed top-30 w-64 h-full p-4 z-50 sidebar-menu bg-white">
                                <span class="fixed text-lg font-bold h-full ml-3">Settings</span>
                                <!-- Start: Logo -->
                            <div>
                                <a href="#" class="flex items-center pb-4 border-b mt-8">
                                </a>
                        </div>        
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
                   <div>  
            

        <div class="h-56 w-3/5 divide-y content-center shadow-lg template">
            <div class="pl-4 grid grid-cols-1">
                <span class="titleinfo text-2xl pb-2 pt-2">Contact Info</span>
            </div>

            {{-- EMAIL --}}
            <div>
                <div class="open-button flex items-center py-2 text-gray-800 
                hover:bg-blue-400 hover:text-white
                group-[.active]:bg-blue-600 group-[.active]:text-white
                group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                <div class="grid grid-cols-1 pl-4">
                    <span>Email</span>
                    <span>example</span>
                </div>    
                </div>
                
                <dialog class="content-center shadow-lg rounded-lg w-1/4" id="modal">
                    <div class="text-center grid grid-rows-6 divide-y divide-gray-200 h-56 mt-4">
                        <div>
                            <i class="ri-mail-line text-blue-400 text-2xl"></i>
                            <span class="tracking-wider font-semibold text-2xl ">Email</span>
                    <button class="text-3xl">
                        <i class="ri-close-line absolute top-2 right-2 close-button
                        hover:text-blue-400"></i>
                    </button>
                      </div>
                    <div>
                        <form class="mt-2 p-4">
                            <input class="rounded-lg w-full p-4 text-2xl border-gray-200 tracking-wide" type="text" id="fname" name="fname" placeholder="Email">
                        </form>

                    <button class="edit-button border rounded-lg border-gray-200 border-solid p-2 mt-2 w-72 h-34 text-gray-600
                    hover:bg-blue-400 hover:text-gray-100
                    group-[.active]:bg-blue-500 group-[.active]:text-white 
                    group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                        <span class="rounded-lg w-full text-xl tracking-wide">
                            <i class="ri-edit-box-line font-bold mr-2 editButton"></i>Edit
                        </span>
                    </button>    
                    
                    </div>
                    </div>
                </dialog>

                    <dialog class="content-center shadow-lg rounded-lg w-1/4" id="editModal">
                        <div class="text-center grid grid-rows-6 divide-y divide-gray-200 h-56 mt-4">
                            <div>
                                <i class="ri-edit-box-line text-blue-400 text-2xl"></i>
                                <span class="tracking-wider font-semibold text-2xl">Edit Email</span>
                        <button class="text-3xl">
                            <i class="ri-close-line absolute top-2 right-2 hover:text-blue-400 editClose"></i>
                        </button>
                          </div>
                        <div>
                            <form class="mt-2 p-4">
                                <input class="rounded-lg w-full p-4 text-2xl border-gray-200 tracking-wide" type="text" id="fname" name="fname" placeholder="Email">
                            </form>
    
                        <button class="edit-button border rounded-lg border-gray-200 border-solid p-2 mt-2 w-72 h-34 text-gray-600
                        hover:bg-blue-400 hover:text-gray-100
                        group-[.active]:bg-blue-500 group-[.active]:text-white 
                        group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                            <span class="rounded-lg w-full text-xl tracking-wide">
                                <i class="ri-shield-check-line font-bold mr-2 verifyButton"></i>Authenticate
                            </span>
                        </button>    
                        
                        </div>
                        </div>
                    </dialog>

                    <dialog class="content-center shadow-lg rounded-lg w-1/4" id="verifyModal">
                      <span>example</span>
                    </dialog>
            </div>

            {{-- END OF EMAIL --}}
            <div class="open-button flex items-center py-2 text-gray-800 
            hover:bg-blue-400 hover:text-white
            group-[.active]:bg-blue-600 group-[.active]:text-white
            group-[.selected]:bg-blue-600 group-[.selected]:text-white">
            <div class="grid grid-cols-1 pl-4">
                <span>Email</span>
                <span>example</span>
            </div>    
            </div>
            
            <dialog class="content-center shadow-lg rounded-lg w-1/4" id="modal">
                <div class="text-center grid grid-rows-6 divide-y divide-gray-200 h-56 mt-4">
                    <div>
                        <i class="ri-mail-line text-blue-400 text-2xl"></i>
                        <span class="tracking-wider font-semibold text-2xl ">Email</span>
                <button class="text-3xl">
                    <i class="ri-close-line absolute top-2 right-2 close-button
                    hover:text-blue-400"></i>
                </button>
                  </div>
                <div>
                    <form class="mt-2 p-4">
                        <input class="rounded-lg w-full p-4 text-2xl border-gray-200 tracking-wide" type="text" id="fname" name="fname" placeholder="Email">
                    </form>

                <button class="edit-button border rounded-lg border-gray-200 border-solid p-2 mt-2 w-72 h-34 text-gray-600
                hover:bg-blue-400 hover:text-gray-100
                group-[.active]:bg-blue-500 group-[.active]:text-white 
                group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                    <span class="rounded-lg w-full text-xl tracking-wide">
                        <i class="ri-edit-box-line font-bold mr-2 editButton"></i>Edit
                    </span>
                </button>    
                
                </div>
                </div>
            </dialog>

                <dialog class="content-center shadow-lg rounded-lg w-1/4" id="editModal">
                    <div class="text-center grid grid-rows-6 divide-y divide-gray-200 h-56 mt-4">
                        <div>
                            <i class="ri-edit-box-line text-blue-400 text-2xl"></i>
                            <span class="tracking-wider font-semibold text-2xl">Edit Email</span>
                    <button class="text-3xl">
                        <i class="ri-close-line absolute top-2 right-2 hover:text-blue-400 editClose"></i>
                    </button>
                      </div>
                    <div>
                        <form class="mt-2 p-4">
                            <input class="rounded-lg w-full p-4 text-2xl border-gray-200 tracking-wide" type="text" id="fname" name="fname" placeholder="Email">
                        </form>

                    <button class="edit-button border rounded-lg border-gray-200 border-solid p-2 mt-2 w-72 h-34 text-gray-600
                    hover:bg-blue-400 hover:text-gray-100
                    group-[.active]:bg-blue-500 group-[.active]:text-white 
                    group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                        <span class="rounded-lg w-full text-xl tracking-wide">
                            <i class="ri-shield-check-line font-bold mr-2 verifyButton"></i>Authenticate
                        </span>
                    </button>    
                    
                    </div>
                    </div>
                </dialog>

                <dialog class="content-center shadow-lg rounded-lg w-1/4" id="verifyModal">
                  <span>example</span>
                </dialog>
        </div>
    </div>

            {{-- !! PASSWORD AND SECURITY --}}

        {{-- <div class="h-56 w-3/5 grid grid-col-3 divide-y content-center shadow-lg template">
            <div class="grid grid-cols-1">
                <span class="titleinfo text-2xl pl-4 pb-2 pt-2">Password and Security</span>
            </div>
            <div>
                <a href=" " class="flex items-center py-2 text-gray-800 
                hover:bg-blue-400 hover:text-white
                group-[.active]:bg-blue-600 group-[.active]:text-white
                group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                <div class="grid grid-cols-1 pl-4">
                    <span>Name</span>
                    <span>example</span>
                </div>
                </a>
            </div>
            <div>
                <a href=" " class="flex items-center py-2 text-gray-800 
                hover:bg-blue-400 hover:text-white
                group-[.active]:bg-blue-600 group-[.active]:text-white
                group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                <div class="grid grid-cols-1 pl-4">
                    <span>Name</span>
                    <span>example</span>
                </div>
                </a>
            </div>
        </div>    

         {{-- !! END OF PASSWORD AND SECURITY --}}

          {{-- !! LEGAL INFORMATION --}}

      {{--  <div class="h-56 w-3/5 grid grid-col-3 divide-y content-center shadow-lg template">
            <div class="grid grid-cols-1">
                <span class="titleinfo text-2xl pb-2 pt-2 pl-4">Legal Information</span>
            </div>
            <div>
                <a href=" " class="flex items-center py-2 text-gray-800 
                hover:bg-blue-400 hover:text-white
                group-[.active]:bg-blue-600 group-[.active]:text-white
                group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                <div class="grid grid-cols-1 pl-4">
                    <span>Name</span>
                    <span>example</span>
                </div>
                </a>
            </div>
            <div>
                <a href=" " class="flex items-center py-2 text-gray-800 
                hover:bg-blue-400 hover:text-white
                group-[.active]:bg-blue-600 group-[.active]:text-white
                group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                <div class="grid grid-cols-1 pl-4">
                    <span>Name</span>
                    <span>example</span>
                </div>
                </a>
            </div>
            <div>
                <a href=" " class="flex items-center py-2 text-gray-800 
                hover:bg-blue-400 hover:text-white
                group-[.active]:bg-blue-600 group-[.active]:text-white
                group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                <div class="grid grid-cols-1 pl-4">
                    <span>Name</span>
                    <span>example</span>
                </div>
                </a>
            </div>
            <div>
                <a href=" " class="flex items-center py-2 text-gray-800 
                hover:bg-blue-400 hover:text-white
                group-[.active]:bg-blue-600 group-[.active]:text-white
                group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                <div class="grid grid-cols-1 pl-4">
                    <span>Name</span>
                    <span>example</span>
                </div>
                </a>
            </div>
        </div>     --}}

                  {{-- !! END OF LEGAL INFORMATION --}}

        {{-- SCRIPT FOR MODALS/POP UP --}}

        <script>

        // Email
            const modal = document.querySelector('#modal');
            const openModal = document.querySelector('.open-button');
            const closeModal = document.querySelector('.close-button');
            const editButton = document.querySelector('.edit-button');
            const editModal = document.querySelector('#editModal');
            const editClose = document.querySelector('.editClose')
            const verifyButton = document.querySelector('.verifyButton');
            const verifyModal = document.querySelector('#verifyModal');
            const verifyClose = document.querySelector('.verifyClose')
        
            openModal.addEventListener('click', () => {
                modal.showModal();
            }) 

            closeModal.addEventListener('click', () => {
                modal.close();
            })

            editButton.addEventListener('click', () => {
                editModal.showModal();
                modal.close();
            }) 

            editClose.addEventListener('click', () => {
                editModal.close();
            })

            verifyButton.addEventListener('click', () => {
                verifyModal.showModal();
                editModal.close();
            }) 

            verifyClose.addEventListener('click', () => {
                verifyModal.close();
            })
        // Email


        </script>
        

</x-app-layout>