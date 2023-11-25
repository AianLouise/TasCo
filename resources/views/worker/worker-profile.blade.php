<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>

    <style>
        .avatarimg {
            margin-top: -10rem;
        }
    </style>
    <main class="bg-gray-200 min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md p-8 max-w-2xl w-full sm:w-1/2 text-center rounded-lg">
            @if (Auth::user()->avatar == 'avatar.png')
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF"
                    alt=""
                    class="w-56 h-auto hover:w-72 transition-all rounded-full shadow-xl avatarimg mx-auto mb-4">
            @else
                <img src="{{ asset('storage/users-avatar/' . basename(Auth::user()->avatar)) }}" alt=""
                    class="w-56 h-auto hover:w-72 transition-all rounded-full shadow-xl avatarimg mx-auto mb-4">
            @endif
            <div class="text-center">
                <h2 class="text-xl font-semibold mb-2">Name: {{ Auth::user()->name }}</h2>
                <p class="text-gray-700">Address: {{ Auth::user()->address }}</p>
                @if (Auth::user()->category_id)
                    @php
                        $category = App\Models\Category::find(Auth::user()->category_id);
                    @endphp

                    @if ($category)
                        <p class="text-gray-700">Category: {{ $category->name }}</p>
                        <!-- Display other category information as needed -->
                    @else
                        <p class="text-red-500">Category not found</p>
                    @endif
                @endif

                <div class="mt-4">
                    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit
                        Profile</button>
                    <button
                    class="bg-white border-blue-500 border border-solid hover:bg-blue-500 hover:text-white text-black font-bold py-2 px-4 rounded w-36">Employments</button>
                </div>
                <div class="mt-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="bg-white border-blue-400 border hover:text-blue-400 transition-all p-4 rounded min-h-32 shadow">
                                <h3 class="text-lg font-semibold mb-2">Number of Employments</h3>
                                <p class="text-gray-700 text-4xl hover:text-blue-400 hover:font-semibold hover:text-5xl hover:p-2 transition-all">20</p>
                            </div>
                        </div>
                        <div class="text-lg border p-2 rounded bg-blue-400 text-white hover:text-black hover:bg-white hover:text-xl hover:font-semibold transition-all">
                            <h3 class="text-2xl font-semibold mb-2">Contacts</h3>
                            <p class="text-gray-700">Email: {{ Auth::user()->email }}</p>
                            <p class="text-gray-700">Phone: {{ Auth::user()->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
