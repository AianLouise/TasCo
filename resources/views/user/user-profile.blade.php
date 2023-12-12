<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>

    <style>
        .avatarimg {
            margin-top: -10rem;
        }
    </style>

    <main class="bg-gray-200 min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md p-8 max-w-2xl w-full sm:w-1/2 text-center mt-36 sm:mt-0 rounded-lg">
            <div class="sm:grid grid-cols-3">
                @if (Auth::user()->avatar == 'avatar.png')
                    <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF"
                        alt=""
                        class="w-56 h-56 hover:w-72 transition-all rounded-full shadow-xl avatarimg mx-auto mb-4">
                @else
                    <img src="{{ asset('storage/users-avatar/' . basename(Auth::user()->avatar)) }}" alt=""
                        class="w-56 h-56 hover:w-72 transition-all rounded-full shadow-xl avatarimg mx-auto mb-4">
                @endif

                <div class=" sm:-mr-24 hidden sm:block">
                    <a href="{{ route('app.settings') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><i
                            class="ri-edit-line font-normal"></i> Edit
                        Profile</a>
                </div>
                <div class=" sm:-mr-6 hidden sm:block">
                    <a href="{{ route('app.employments', ['worker' => Auth::user()->id]) }}"
                        class="bg-white border-blue-500 border border-solid hover:bg-blue-500 hover:text-white text-black font-bold py-2 px-6 rounded w-38"><i
                            class="ri-folder-line font-normal"></i> Employments</a>
                </div>

            </div>

            <div
                class="text-center bg-blue-100 p-8 sm:p-4 rounded-xl divide-y divide-gray-400 sm:text-justify mb-4 sm:mb-0">
                <h2 class="text-gray-700 text-2xl sm:text-2xl font-semibold mb-2">{{ Auth::user()->name }}</h2>
                <p class="text-gray-700 text-base p-1 mb-1">{{ Auth::user()->address }}</p>
            </div>

            <div class="grid grid-cols-2 py-2 sm:py-0">
                <div class="block lg:hidden">
                    <a href="{{ route('app.settings') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded px-4 py-2 h-10"><i
                            class="ri-edit-line font-normal"></i> Edit
                        Profile</a>
                    @php
                        $isVerified = Auth::user()->is_verified;
                        $buttonClass = $isVerified ? 'bg-white border-blue-500 border border-solid hover:bg-blue-500 hover:text-white text-black font-bold py-2 px-4 rounded w-38' : 'hidden'; // Use the 'hidden' class to hide the button if not verified
                    @endphp
                </div>
                @if (Auth::user()->is_verified != 0)
                    <div class="block lg:hidden">
                        <a href="{{ route('app.employments', ['worker' => Auth::user()->id]) }}"
                            class="bg-white border-blue-500 border border-solid hover:bg-blue-500 hover:text-white text-gray-700 font-bold rounded px-4 py-2 h-10">
                            <i class="ri-folder-line font-normal"></i> Employments
                        </a>
                    </div>
                @endif

            </div>

            <div class="mt-4">
                <div class="grid grid-rows-1 sm:grid-cols-2 gap-4">
                    <div>
                        <div
                            class="bg-white border-blue-400 border hover:text-blue-400 transition-all p-4 rounded min-h-32 shadow">
                            <!-- Added shadow class -->
                            <h3 class="text-lg font-semibold mb-2 text-center">Number of Employment</h3>
                            <!-- Add services employed details here -->
                            <p
                                class="text-gray-700 text-xl hover:text-blue-400 hover:font-semibold hover:text-4xl hover:p-2 transition-all text-center">
                                20</p> <!-- Increased font size to text-xl -->
                        </div>

                    </div>
                    <div
                        class="text-base p-2 rounded hover:text-black hover:bg-white md:hover:text-lg hover:font-semibold transition-all text-center">
                        <div>
                            <div class="flex items-center mb-2 bg-blue-100 px-5 py-1 text-gray-700 rounded">
                                <div class="border-t border-black flex-grow mr-4"></div>
                                <!-- Line above Contact Information -->
                                <h3 class=" md:text-lg font-semibold text-gray-700 text-center">Contact Information</h3>
                                <div class="border-t border-black flex-grow ml-4"></div>
                                <!-- Line above Contact Information -->
                            </div>
                            <p class="">Email: {{ Auth::user()->email }}</p>
                            <p class="">Phone: {{ Auth::user()->phone }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
