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
                <li class="text-gray-600 mr-2 font-medium2">Edit Profile</li>
            </ul>
            
            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile -->

            <x-admin-profile-dropdown :user="Auth::user()" />

            <!-- End: Profile -->

        </div>

        <!-- End: Header -->   

        
         
        <div class="w-full min-h-screen py-1 ">
            <div class="p-2 ">
                @if($user)
                <div class="w-full px-6 pb-8 mt-8 ">
                    <h2 class="pl-6 text-2xl font-bold ">Profile</h2>

                    <div class="grid max-w-2xl mx-auto mt-8">
                        <form enctype="multipart/form-data" method="POST" action="{{ route('update.profile', ['id' => $user->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="flex flex-col items-center space-y-5">
                                <div class="flex flex-col items-center space-y-5">
                                    @if ($user->avatar == 'avatar.png')
                                        <img id="profile-picture" class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-blue-300 500"
                                             src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF"
                                             alt="Bordered avatar">
                                    @else
                                        <img id="profile-picture" class="object-cover w-40 h-40 p-1 rounded-full ring-2 ring-blue-300 500"
                                        src="{{ asset('storage/users-avatar/' . basename($user->avatar)) }}" alt="Custom Avatar">
                                    @endif
                                </div>

                                <div class="flex flex-col space-y-5">
                                    <label for="upload-input" class="py-3.5 px-7 text-base font-medium text-indigo-900 focus:outline-none bg-white rounded-lg border border-indigo-200 hover:bg-indigo-100 hover:text-[#202142] focus:z-10 focus:ring-4 focus:ring-indigo-200 cursor-pointer">
                                        Upload New Picture
                                        <input id="upload-input" class="chatify-d-none" accept="image/*" name="avatar" type="file" onchange="previewImage(this)">
                                    </label>
                                    
                                    <button type="button"
                                        class="py-3.5 px-7 text-base font-medium text-indigo-900 focus:outline-none bg-white rounded-lg border border-indigo-200 hover:bg-indigo-100 hover:text-[#202142] focus:z-10 focus:ring-4 focus:ring-indigo-200">
                                        Delete Picture
                                    </button>
                                </div>
                            </div>
                            
                            <script>
                            function previewImage(input) {
                                var reader = new FileReader();
                                reader.onload = function (e) {
                                    document.getElementById('profile-picture').src = e.target.result;
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                            </script>
                            

                            <div class="items-center mt-8  text-[#202142]">
                                
                                <div class="flex flex-col items-center w-full mb-2 space-x-0 space-y-2 sm:flex-row sm:space-x-4 sm:space-y-0 sm:mb-6">
                                    <div class="w-full">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-indigo-900 ">First Name</label>
                                        <input type="text" id="fname" name="fname"
                                            class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                            placeholder="First name" value="{{$user->first_name}}" required>
                                    </div>

                                    <div class="w-full">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-indigo-900 ">Last Name</label>
                                        <input type="text" id="lname" name="lname"
                                            class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                            placeholder="First name" value="{{$user->last_name}}" required>
                                    </div>

                                </div>

                                <div class="mb-2 sm:mb-6">
                                    <label for="address"
                                        class="block mb-2 text-sm font-medium text-indigo-900 ">Address
                                    </label>
                                    <input type="text" id="address" name="address"
                                        class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5"
                                        placeholder="Address" value="{{$user->address}}" required>
                                </div>

                                <div class="mb-2 sm:mb-6">
                                    <label for="email"
                                        class="block mb-2 text-sm font-medium text-indigo-900 ">Email
                                    </label>
                                    <input type="email" id="email" name="email"
                                        class="bg-indigo-50 border border-indigo-300 text-indigo-900 text-sm rounded-lg focus:ring-indigo-500 focus:border-indigo-500 block w-full p-2.5 "
                                        placeholder="Email Address" value="{{$user->email}}" required>
                                </div>

                                <div class="flex justify-end">
                                    <button type="submit"
                                    class="text-white mt-2 bg-blue-400 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-indigo-600 dark:hover:bg-indigo-700 dark:focus:ring-indigo-800">Save Changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                @else
                    <!-- Handle the case when $worker is null -->
                    Worker not found
                @endif
            </div>
        </div>
        
    </main>
</x-app-layout>