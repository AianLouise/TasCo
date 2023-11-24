<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    
    <style>
        .avatarimg{
            margin-top: -10rem;
        }
    </style>

    <main class="bg-gray-200 min-h-screen flex items-center justify-center">
        @php
            $userId = request()->route('worker');
            $user = \App\Models\User::find($userId);
        @endphp
        <div class="bg-white shadow-md p-8 max-w-2xl w-full sm:w-1/2 text-right rounded-lg">
            <!-- Added rounded-lg class -->
            <!-- Modified: Increased max width to max-w-2xl -->
            @if ($user->avatar == 'avatar.png')
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF"
                    alt="" class="w-56 h-auto hover:w-72 transition-all rounded-full shadow-xl avatarimg mx-auto mb-4">
            @else
                <img src="{{ asset('storage/users-avatar/' . basename($user->avatar)) }}" alt=""
                    class="w-48 h-48 rounded-full mx-auto mb-4">
            @endif
            <!-- Modified: Increased width and height to w-48 and h-48 -->



            <div class="text-center"> <!-- Modified: Changed text-left to text-center -->
                <h2 class="text-xl font-semibold mb-2">Name: {{ $user->name }}</h2>
                <p class="text-gray-700">Address: {{ $user->address }}</p>
                @if (Auth::user()->category_id)
                    @php
                        $category = App\Models\Category::find($user->category_id);
                    @endphp

                    @if ($category)
                        <p class="text-gray-700">Category: {{ $category->name }}</p>
                        <!-- Display other category information as needed -->
                    @else
                        <p class="text-red-500">Category not found</p>
                    @endif
                @endif
                <!-- Add more profile details as needed -->
                <div class="mt-4">
                    <!-- Hire button -->
                    <div class="flex justify-center">

                        <a href="{{ route('worker.hire', ['worker' => $user->id]) }}"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-36">Hire</a>

                        <form action="" class="mr-4">
                            @csrf
                            <button type="submit"
                                class="border hover:border-blue-700 hover:text-blue-500 text-gray font-bold py-2 px-4 rounded w-36">Message</button>
                        </form>
                    </div>


                    <div class="mt-4">
                        <button
                            class="bg-white border-blue-500 border border-solid hover:bg-blue-500 hover:text-white text-black font-bold py-2 px-4 rounded w-36">Employments</button>
                    </div>

                </div>
                <div class="mt-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="bg-white border-blue-400 border hover:text-blue-400 transition-all p-4 rounded min-h-32 shadow"> <!-- Added shadow class -->
                                <h3 class="text-lg font-semibold mb-2">Number of Employment</h3>
                                <!-- Add services employed details here -->
                                <p class="text-gray-700 text-4xl  hover:text-blue-400 hover:text-6xl hover:p-6 transition-all">20</p> <!-- Increased font size to text-xl -->
                            </div>
                        </div>
                        <div class="text-lg border p-2 rounded bg-blue-400 text-white hover:text-black hover:bg-white hover:text-2xl transition-all">
                            <h3 class="text-2xl font-semibold mb-2">Contacts</h3>
                            <!-- Increased font size to text-2xl -->
                            <!-- Add contacts details here -->
                            <p class="">Email: {{ $user->email }}</p>
                            <p class="">Phone: {{ $user->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
