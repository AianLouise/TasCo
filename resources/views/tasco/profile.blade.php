<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>

    <style>
        .avatarimg {
            margin-top: -10rem;
        }
    </style>

    <main class="bg-gray-200 min-h-screen flex items-center justify-center">
        @php
            $userId = request()->route('worker');
            $user = \App\Models\User::find($userId);
        @endphp
        <div class="bg-white shadow-md p-8 max-w-2xl w-full sm:w-1/2 text-right rounded-lg mt-20">
            <!-- Added rounded-lg class -->
            <!-- Modified: Increased max width to max-w-2xl -->
            @if ($user->avatar == 'avatar.png')
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF"
                    alt=""
                    class="w-56 h-auto hover:w-72 transition-all rounded-full shadow-xl avatarimg mx-auto mb-4">
            @else
                <img src="{{ asset('storage/users-avatar/' . basename($user->avatar)) }}" alt=""
                    class="w-56 h-auto hover:w-72 transition-all rounded-full shadow-xl avatarimg mx-auto mb-4">
            @endif
            <!-- Modified: Increased width and height to w-48 and h-48 -->



            <div class="text-center"> <!-- Modified: Changed text-left to text-center -->
                <h2 class="text-xl font-semibold mb-2">{{ $user->name }}</h2>
                <p class="text-gray-700 mb-2">{{ $user->address }}</p>
                @if (Auth::user()->category_id)
                    @php
                        $category = App\Models\Category::find($user->category_id);
                    @endphp

                    @if ($category)
                        <p
                            class="bg-white border-blue-500 border border-solid hover:bg-blue-500 hover:text-white text-black font-medium text-xs py-2 px-4 rounded-lg w-32 mx-auto">
                            {{ $category->name }}</p>
                        <!-- Display other category information as needed -->
                    @else
                        <p class="text-red-500">Category not found</p>
                    @endif
                @endif
                <!-- Add more profile details as needed -->
                <div class="mt-4">
                    <!-- Hire button -->
                    <div class="flex justify-center space-x-4">
                        @if (Auth::user()->is_verified)
                            @php
                                $previousApplication = \App\Models\HiringForm::where('employer_id', Auth::user()->id)
                                    ->where('worker_id', $user->id)
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
                                <span class="inline-block bg-green-400 text-white font-bold py-2 px-4 rounded">
                                    Application Sent
                                </span>
                            @else
                                <a href="{{ route('worker.hire', ['worker' => $user->id]) }}"
                                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-36">
                                    Hire
                                </a>
                            @endif
                        @else
                            <span
                                class="inline-block hover:bg-red-400 hover:text-white text-black font-bold py-2 px-4 rounded">You
                                are not
                                verified to Hire</span>
                        @endif

                        <a href="{{ route('user.chatify', ['user_id' => $user->id]) }}" target="_new"
                            class="border hover:border-blue-700 hover:text-blue-500 text-gray font-bold py-2 px-4 rounded w-36">
                            Message
                        </a>
                    </div>

                </div>
                <div class="mt-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div
                                class="bg-white border-blue-400 border hover:text-blue-400 transition-all p-4 rounded min-h-32 shadow">
                                <!-- Added shadow class -->
                                <h3 class="text-lg font-semibold mb-2">Number of Employment</h3>
                                <!-- Add services employed details here -->
                                <p
                                    class="text-gray-700 text-4xl hover:text-blue-400 hover:font-semibold hover:text-5xl hover:p-2 transition-all">
                                    20</p> <!-- Increased font size to text-xl -->
                            </div>
                            <div class="mt-2">
                                <button
                                    class="text-sm font-medium bg-white border-blue-500 border border-solid hover:bg-blue-500 hover:text-white text-black py-2 px-4 rounded w-36">Employments</button>
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
                            <p class="">{{ $user->email }}</p>
                            <p class="">{{ $user->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
