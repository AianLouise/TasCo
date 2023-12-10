<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>

    <style>
        .avatarimg {
            margin-top: -10rem;
        }
    </style>

    <main class="bg-gray-200 min-h-screen flex items-center justify-center">
        {{-- @php
            $userId = request()->route('worker');
            $user = \App\Models\User::find($userId);
        @endphp --}}
        <div class="bg-white shadow-md p-8 max-w-2xl w-full sm:w-1/2 text-right rounded-lg mt-36 sm:mt-20">
            <!-- Added rounded-lg class -->
            <!-- Modified: Increased max width to max-w-2xl -->
            <div class="md:grid grid-cols-2">
                @if ($worker->avatar == 'avatar.png')
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($worker->name) }}&color=7F9CF5&background=EBF4FF"
                        alt=""
                        class="w-56 h-auto hover:w-60 transition-all rounded-full shadow-xl avatarimg mx-auto md:mx-0 mb-4">
                @else
                    <img src="{{ asset('storage/users-avatar/' . basename($worker->avatar)) }}" alt=""
                        class="w-56 h-auto hover:w-72 transition-all rounded-full shadow-xl avatarimg mx-auto md:mx-0 mb-4">
                @endif

                <div class="mr-8 hidden md:block">
                    <!-- Hire button -->
                    <div class="flex justify-center space-x-4">
                        @if (Auth::user()->is_verified)
                            @php
                                $previousApplication = \App\Models\HiringForm::where('employer_id', Auth::user()->id)
                                    ->where('worker_id', $worker->id)
                                    ->latest() // Assuming you want to get the latest application
                                    ->first();

                                $previousApplicationExists = $previousApplication !== null;
                            @endphp

                            @if ($previousApplicationExists && $previousApplication->status === 'Completed')
                                <a href="{{ route('worker.hire', ['worker' => $user->id]) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-36">
                                    Hire Again
                                </a>
                            @elseif ($previousApplicationExists)
                                <span
                                    class="inline-block text-center bg-blue-400 text-white font-bold py-2 px-4 rounded">
                                    Application Sent
                                </span>
                            @else
                                <a href="{{ route('worker.hire', ['worker' => $worker->id]) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded w-36">
                                    Hire
                                </a>
                            @endif
                        @else
                            <button
                                class="button open-button bg-blue-500 hover:bg-red-500 text-white font-bold py-2 px-8 rounded w-36 transition-colors">Hire</button>

                        @endif


                        <a href="{{ route('user.chatify', ['user_id' => $worker->id]) }}" target="_new"
                            class="border hover:bg-blue-500 hover:text-white text-gray border-blue-400 font-semibold py-2 px-4 rounded w-36 open-button">
                            Message
                        </a>

                        <button
                            class="text-sm font-medium bg-white border-blue-500 border border-solid hover:bg-blue-500 hover:text-white text-black py-2 px-4 rounded w-36">Employments</button>
                    </div>
                </div>
            </div>
            <!-- Modified: Increased width and height to w-48 and h-48 -->



            <div class="text-center sm:text-justify"> <!-- Modified: Changed text-left to text-center -->
                <div class="bg-blue-100 p-4 rounded-lg gird grid-rows-1 divide-y divide-gray-400">
                    <h2 class="text-gray-700 text-md sm:text-2xl font-bold mb-2">{{ $worker->name }} | @if ($worker->category_id)
                            @php
                                $category = App\Models\Category::find($worker->category_id);
                            @endphp

                            @if ($category)
                                <span class="text-blue-700">{{ $category->name }}</span>
                            @else
                                <p class="text-red-500">Category not found</p>
                            @endif

                        @endif
                    </h2>
                    <p class="text-gray-700 p-1 mb-1">{{ $worker->address }}</p>

                    <p class="text-blue-600 p-1 font-semibold pt-2">Available for Hiring</p>
                </div>
                <!-- Add more profile details as needed -->


                <div class="md:hidden">
                    <!-- Hire button -->
                    <div class="flex justify-center space-x-4 mt-4 sm:mt-0">
                        @if (Auth::user()->is_verified)
                            @php
                                $previousApplication = \App\Models\HiringForm::where('employer_id', Auth::user()->id)
                                    ->where('worker_id', $worker->id)
                                    ->latest() // Assuming you want to get the latest application
                                    ->first();

                                $previousApplicationExists = $previousApplication !== null;
                            @endphp

                            @if ($previousApplicationExists && $previousApplication->status === 'Completed')
                                <a href="{{ route('worker.hire', ['worker' => $user->id]) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded w-36">
                                    Hire Again
                                </a>
                            @elseif ($previousApplicationExists)
                                <span class="inline-block bg-blue-400 text-white font-bold py-2 px-4 rounded">
                                    Application Sent
                                </span>
                            @else
                                <a href="{{ route('worker.hire', ['worker' => $worker->id]) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded w-36">
                                    Hire
                                </a>
                            @endif
                        @else
                            <button
                                class="button open-button bg-blue-500 hover:bg-red-500 text-white font-bold py-2 px-4 md:px-8 rounded w-36 m-open-button">Hire</button>

                        @endif


                        <a href="{{ route('user.chatify', ['user_id' => $worker->id]) }}" target="_new"
                            class="border hover:bg-blue-500 hover:text-white text-gray border-blue-400 font-semibold py-2 px-4 rounded w-36">
                            Message
                        </a>


                        <button
                            class="text-sm font-medium bg-white border-blue-500 border border-solid hover:bg-blue-500 hover:text-white text-black py-2 px-4 rounded w-36">Employments</button>
                    </div>
                </div>

                <dialog class="w-96 h-50 sm:h-44 mx-auto my-auto modal rounded-lg">
                    <div class="">
                        <div class="bg-red-500 grid grid-cols-2">
                            <h3 class="p-2 text-center text-white text-md -mr-48"><i class="ri-mail-line"></i> Message
                            </h3>
                            <i class="ri-close-line cursor-pointer p-2 flex justify-end text-white close-button"></i>
                        </div>
                        <div class="grid justify-center grid-rows-1 divide-y">
                            <p class="grid p-4 sm:p-6 text-red-400 font-semibold border-b border-red-400 mb-2">You are
                                not yet verified to Hire a Job Seeker </p>
                            <button
                                class="bg-red-500 hover:bg-blue-500 transition-colors flex justify-center rounded-md px-4 py-2 mx-20 text-white sm:mb-0 mb-4"><i
                                    class="ri-question-line"></i> | Apply now</button>
                        </div>
                    </div>

                </dialog>

                {{-- MOBILE DIALOGUE --}}

                {{-- SCRIPT --}}

                <script>
                    const modal = document.querySelector('.modal');
                    const openButton = document.querySelector('.open-button');
                    const closeButton = document.querySelector('.close-button');

                    openButton.addEventListener("click", () => {
                        modal.showModal();
                    })

                    closeButton.addEventListener("click", () => {
                        modal.close();
                    })

                    const mobilemodal = document.querySelector('m-modal');
                    const mobileopenButton = document.querySelector('.m-open-button');
                    const mobilecloseButton = document.querySelector('.m-close-button');

                    mobileopenButton.addEventListener("click", () => {
                        modal.showModal();
                    })

                    mobilecloseButton.addEventListener("click", () => {
                        modal.close();
                    })
                </script>

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
                        class="text-base p-2 rounded hover:text-black hover:bg-white hover:text-xl hover:font-semibold transition-all text-center">
                        <div class="flex items-center mb-2 bg-blue-300 px-5 py-1 text-gray-700 rounded">
                            <div class="border-t border-black flex-grow mr-4"></div>
                            <!-- Line above Contact Information -->
                            <h3 class="text-sm font-semibold ">Contact Information</h3>
                            <div class="border-t border-black flex-grow ml-4"></div>
                            <!-- Line above Contact Information -->
                        </div>
                        <p class="">{{ $worker->email }}</p>
                        <p class="">{{ $worker->phone }}</p>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>
</x-app-layout>
