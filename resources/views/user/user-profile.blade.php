<x-app-layout>
    <main class="bg-gray-200 min-h-screen flex items-center justify-center">
        <div class="bg-white shadow-md p-8 max-w-2xl w-full sm:w-1/2 text-center rounded-lg"> <!-- Added rounded-lg class -->
            <!-- Modified: Increased max width to max-w-2xl -->
            @if (Auth::user()->avatar == 'avatar.png')
                <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF"
                    alt="" class="w-48 h-48 rounded-full mx-auto mb-4">
            @else
                <img src="{{ asset('storage/users-avatar/' . basename(Auth::user()->avatar)) }}" alt=""
                class="w-48 h-48 rounded-full mx-auto mb-4">
            @endif
            <!-- Modified: Increased width and height to w-48 and h-48 -->
            <div class="text-center"> <!-- Modified: Changed text-left to text-center -->
                <h2 class="text-xl font-semibold mb-2">Name: {{ Auth::user()->name }}</h2>
                <p class="text-gray-700">Address: {{ Auth::user()->address }}</p>
                <!-- Add more profile details as needed -->
                <div class="mt-4">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Profile</button>
                    <button
                        class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Employments</button>
                </div>
                <div class="mt-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <div class="bg-gray-200 p-4 rounded min-h-32 shadow"> <!-- Added shadow class -->
                                <h3 class="text-lg font-semibold mb-2">Services Employed</h3>
                                <!-- Add services employed details here -->
                                <p class="text-gray-700 text-xl">20</p> <!-- Increased font size to text-xl -->
                            </div>
                        </div>
                        <div>
                            <h3 class="text-2xl font-semibold mb-2">Contacts</h3>
                            <!-- Increased font size to text-2xl -->
                            <!-- Add contacts details here -->
                            <p class="text-gray-700">Email: {{ Auth::user()->email }}</p>
                            <p class="text-gray-700">Phone: {{ Auth::user()->phone }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
