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
                        class="w-56 h-auto hover:w-72 transition-all rounded-full shadow-xl avatarimg mx-auto mb-4">
                @else
                    <img src="{{ asset('storage/users-avatar/' . basename(Auth::user()->avatar)) }}" alt=""
                        class="w-56 h-auto hover:w-72 transition-all rounded-full shadow-xl avatarimg mx-auto mb-4">
                @endif

                <div class="-mr-20 hidden lg:block">
                    <a href="{{ route('app.settings') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2.5 px-4 rounded"><i
                            class="ri-edit-line font-normal"></i> Edit
                        Profile</a>
                    @php
                        $isVerified = Auth::user()->is_verified;
                        $buttonClass = $isVerified ? 'bg-white border-blue-500 border border-solid hover:bg-blue-500 hover:text-white text-black font-bold py-2 px-4 rounded w-38' : 'hidden'; // Use the 'hidden' class to hide the button if not verified
                    @endphp
                </div>
                <div class="sm:-mr-6 sm:-mt-2 hidden lg:block">
                    <button class="{{ $buttonClass }}"><i
                            class="ri-folder-line font-normal"></i> Employments</button>
                </div>

            </div>

            <div
                class="text-center bg-blue-100 p-8 sm:p-4 rounded-xl divide-y divide-black sm:text-justify mb-4 sm:mb-0">
                <h2 class="text-gray-700 text-2xl sm:text-2xl font-semibold mb-2">{{ Auth::user()->name }}</h2>
                <p class="text-gray-700 text-xl p-2">{{ Auth::user()->address }}</p>
            </div>

            <div class="grid grid-cols-2 py-2 sm:py-0">
                <div class="block lg:hidden">
                    <a href="{{ route('app.settings') }}"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold rounded px-4 py-2"><i
                            class="ri-edit-line font-normal"></i> Edit
                        Profile</a>
                    @php
                        $isVerified = Auth::user()->is_verified;
                        $buttonClass = $isVerified ? 'bg-white border-blue-500 border border-solid hover:bg-blue-500 hover:text-white text-black font-bold py-2 px-4 rounded w-38' : 'hidden'; // Use the 'hidden' class to hide the button if not verified
                    @endphp
                </div>
                @if (Auth::user()->is_verified != 0)
                    <div class="block -mt-1 lg:hidden">
                        <a href="{{ route('app.employments', ['worker' => Auth::user()->id]) }}"
                            class="bg-white border-blue-500 border border-solid hover:bg-blue-500 hover:text-white text-gray-700 font-bold rounded px-4 py-2">
                            <i class="ri-folder-line font-normal"></i> Employments
                        </a>
                    </div>
                @endif

            </div>

            <div class="mt-4">
                @php
                    $isVerified = Auth::user()->is_verified;
                    $gridColsClass = $isVerified ? 'grid-cols-2' : 'grid-cols-1';
                @endphp

                <div class="grid grid-rows-1 {{ $gridColsClass }} gap-4">
                    @if ($isVerified)
                        <div>
                            <div
                                class="bg-white border-blue-400 border hover:text-blue-400 transition-all p-4 rounded min-h-32 shadow">
                                <h3 class="text-lg font-semibold mb-2">Services Employed</h3>
                                <!-- Add services employed details here -->
                                <p
                                    class="text-gray-700 text-4xl hover:text-blue-400 hover:font-semibold hover:text-5xl hover:p-2 transition-all">
                                    20
                                </p>
                            </div>
                        </div>
                    @endif

                    <div
                        class="text-base p-2 rounded hover:text-black hover:bg-white hover:text-xl hover:font-semibold transition-all">
                        <div class="flex items-center mb-2 bg-blue-400 px-5 py-1 text-gray-700 rounded">
                            <div class="border-t border-black flex-grow mr-4"></div>
                            <!-- Line above Contact Information -->
                            <h3 class="text-lg font-semibold text-white">Contact Information</h3>
                            <div class="border-t border-black flex-grow ml-4"></div>
                            <!-- Line above Contact Information -->
                        </div>
                        <p class="">Email: {{ Auth::user()->email }}</p>
                        <p class="">Phone: {{ Auth::user()->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
