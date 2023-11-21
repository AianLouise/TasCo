<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

<link rel="stylesheet" href="guest.blade.php">

        <p class="uppercase text-5xl font-bold text-center mb-5">Register</p>
        
        <div class="flex gap-4">
       <!-- First Name -->
        <div class="relative">
            <div class="w-full relative mb-5">
                <x-text-input id="fname" placeholder="First Name" class="pl-12 py-2 i-1 block mt-1 w-full" type="text" name="fname" :value="old('fname')" required autofocus autocomplete="fname" />
                <i ><x-healthicons-f-F class="h-5 w-5"/></i>
            </div>
            <x-input-error :messages="$errors->get('fname')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="relative">
            <div class="w-full relative mb-5">
                <x-text-input id="lname" placeholder="Last Name" class="pl-12 py-2 i-1 block mt-1 w-full" type="text" name="lname" :value="old('lname')" required autofocus autocomplete="lname" />
                <i><x-healthicons-f-L class="h-5 w-5"/></i>
            </div>
            <x-input-error :messages="$errors->get('lname')" class="mt-2" />
        </div>
</div>
        <!-- Address -->
        <div class="relative">
            <div class="w-full relative mb-5">
                <x-text-input id="address" placeholder="Address" class="pl-12 py-2 i-1 block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                <i class="ri-map-pin-line"></i>
            </div>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="relative">
            <div class="w-full relative mb-5">
                <x-text-input id="email" placeholder="Email" class="pl-12 py-2 i-1 block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                <i class="ri-mail-line"></i>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

       <!-- Password -->
        <div class="relative">
            <div class="w-full relative mb-5">
                <x-text-input id="password" placeholder="Password" class="pl-12 py-2 i-1 block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
                <i class="ri-lock-line"></i>
                <span id="togglePassword" class="absolute top-1/2 right-4 transform -translate-y-1/2 cursor-pointer">
                    <i class="ri-eye-line" id="toggleIconPassword" style="color: #777;"></i>
                </span>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="relative">
            <div class="w-full relative mb-2">
                <x-text-input id="password_confirmation" placeholder="Confirm Password" class="sliders pl-12 py-2 block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <i class="ri-pass-valid-line"></i>
                <span id="toggleConfirmPassword" class="absolute top-1/2 right-4 transform -translate-y-1/2 cursor-pointer">
                    <i class="ri-eye-line" id="toggleIconConfirmPassword" style="color: #777;"></i>
                </span>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        <script>
            const passwordInput = document.getElementById('password');
            const confirmInput = document.getElementById('password_confirmation');
            const togglePassword = document.getElementById('togglePassword');
            const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');
            const toggleIconPassword = document.getElementById('toggleIconPassword');
            const toggleIconConfirmPassword = document.getElementById('toggleIconConfirmPassword');

            togglePassword.addEventListener('click', () => {
                toggleVisibility(passwordInput, toggleIconPassword);
            });

            toggleConfirmPassword.addEventListener('click', () => {
                toggleVisibility(confirmInput, toggleIconConfirmPassword);
            });

            function toggleVisibility(inputElement, iconElement) {
                const type = inputElement.type === 'password' ? 'text' : 'password';
                inputElement.type = type;
                iconElement.className = type === 'password' ? 'ri-eye-line' : 'ri-eye-off-line';
            }
        </script>


        @if (Route::has('login'))
            <div class="text-left"> <!-- Change text-center to text-left, and reduce mt value -->
                <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none" href="{{ route('login') }}">
                    {{ __("Already have an account?") }} <span class="text-blue-500 font-medium">Log In</span>
                </a>
            </div>
        @endif
        

        <div class="flex items-center justify-center "> <!-- Center the button horizontally and vertically -->
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 w-full border border-blue-700 rounded mt-5">Register</button>
        </div>

        <div class="flex items-center justify-center "> 
            <a class="bg-transparent text-blue-500 font-semibold hover:text-blue-500 py-2 px-54 border border-blue-500 rounded mt-3 w-full mb-5" href="{{ route('welcome') }}">Back</a>
        </div>
        
    </form>
</x-guest-layout>
