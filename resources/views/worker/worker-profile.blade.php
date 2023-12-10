<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>

    <style>
        .avatarimg {
            margin-top: -10rem;
        }
    </style>
    <main class="bg-gray-200 min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md p-8 max-w-2xl w-full sm:w-1/2 text-center mt-36 sm:mt-0 rounded-lg">
            <div class="sm:grid sm:grid-cols-3">
            @if (Auth::user()->avatar == 'avatar.png')
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF"
                    alt=""
                    class="w-56 h-auto hover:w-72 transition-all rounded-full shadow-xl avatarimg mx-auto mb-4">
            @else
                <img src="{{ asset('storage/users-avatar/' . basename(Auth::user()->avatar)) }}" alt=""
                    class="w-56 h-auto hover:w-72 transition-all rounded-full shadow-xl avatarimg mx-auto mb-4">
            @endif
        
            
            <div class=" sm:-mr-24 hidden sm:block">
                <a href="{{ route('app.settings') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="ri-edit-line font-normal"></i> Edit
                    Profile</a>
            </div>
            <div class=" sm:-mr-6 hidden sm:block">
                <a href="#"
                class="bg-white border-blue-500 border border-solid hover:bg-blue-500 hover:text-white text-black font-bold py-2 px-6 rounded w-38"><i class="ri-folder-line font-normal"></i> Employments</a>
               </div>
        </div>
            <div class="text-center bg-blue-100 p-8 sm:p-4 rounded-xl divide-y divide-black sm:text-justify">
                <h2 class="text-xl sm:text-4xl font-semibold mb-2">{{ Auth::user()->name }}</h2>
                <p class="text-gray-700 text-xl p-2">{{ Auth::user()->address }}</p>
                @if (Auth::user()->category_id)
                    @php
                        $category = App\Models\Category::find(Auth::user()->category_id);
                    @endphp

                    @if ($category)
                        <p class="text-gray-700 text-xl p-2">{{ $category->name }}</p>
                        <!-- Display other category information as needed -->
                    @else
                        <p class="text-red-500">Category not found</p>
                    @endif
                @endif

            
                
            </div>
            <div class="grid grid-cols-2 py-2 sm:py-0">
            <div class="block lg:hidden">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i class="ri-edit-line font-normal"></i> Edit
                    Profile</button>
            </div>
            <div class="block lg:hidden">
                <button
                class="bg-white border-blue-500 border border-solid hover:bg-blue-500 hover:text-white text-black font-bold py-2 px-4 rounded w-38"><i class="ri-folder-line font-normal"></i> Employments</button>
               </div>
            </div>
        
                <div class="sm:mt-4">
                    <div class="grid grid-rows-1 sm:grid-cols-2 gap-4">
                        <div>
                            <div
                                class="bg-white border-blue-300 border hover:text-blue-300 transition-all p-4 rounded min-h-32 shadow">
                                <h3 class="text-lg font-semibold mb-2">Number of Employments</h3>
                                <p
                                    class="text-gray-700 text-3xl hover:text-blue-300 hover:font-semibold hover:text-5xl hover:p-2 transition-all">
                                    20</p>
                            </div>
                        </div>
                        <div
                            class="text-base p-2 rounded hover:text-black hover:bg-white hover:text-xl hover:font-semibold transition-all">
                            <div class="flex items-center mb-2 bg-blue-300 px-5 py-1 text-gray-700 rounded">
                                <div class="border-t border-black flex-grow mr-4"></div>
                                <!-- Line above Contact Information -->
                                <h3 class="text-sm font-semibold ">Contact Information</h3>
                                <div class="border-t border-black flex-grow ml-4"></div>
                                <!-- Line above Contact Information -->
                            </div>
                            <p class="text-gray-700">{{ Auth::user()->email }}</p>
                            <p class="text-gray-700">{{ Auth::user()->phone }}</p>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
