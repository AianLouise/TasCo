<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

<link rel="stylesheet" href="guest.blade.php">

        <p class="title" style="text-transform: uppercase;font-size: 3em;font-weight: bold;text-align: center;letter-spacing: 1px;margin-bottom: 10px;">Register</p>
        <div class="separator"></div>

       <!-- First Name -->
        <div class="relative">
            <div class="form-control">
                <x-text-input id="fname" placeholder="First Name" class="add-pad i-1 block mt-1 w-full" type="text" name="fname" :value="old('fname')" required autofocus autocomplete="fname" />
                <i class="ri-user-line"></i>
            </div>
            <x-input-error :messages="$errors->get('fname')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="relative">
            <div class="form-control">
                <x-text-input id="lname" placeholder="Last Name" class="add-pad i-1 block mt-1 w-full" type="text" name="lname" :value="old('lname')" required autofocus autocomplete="lname" />
                <i class="ri-user-line"></i>
            </div>
            <x-input-error :messages="$errors->get('lname')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="relative">
            <div class="form-control">
                <x-text-input id="address" placeholder="Address" class="add-pad i-1 block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                <i class="ri-map-pin-line"></i>
            </div>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="relative">
            <div class="form-control">
                <x-text-input id="email" placeholder="Email" class="add-pad i-1 block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                <i class="ri-mail-line"></i>
            </div>
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

       <!-- Password -->
        <div class="relative">
            <div class="form-control">
                <x-text-input id="password" placeholder="Password" class="add-pad i-1 block mt-1 w-full"
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
            <div class="">
                <x-text-input id="password_confirmation" placeholder="Confirm Password" class="sliders add-pad i-1 block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <i class="ri-lock-line"></i>
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
            <div class="text-left mt-2"> <!-- Change text-center to text-left, and reduce mt value -->
                <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __("Already have an account?") }} <span>Log In</span>
                </a>
            </div>
        @endif
        

        <div class="flex items-center justify-center "> <!-- Center the button horizontally and vertically -->
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-16 border border-blue-700 rounded mt-5">Register</button>
        </div>

        <div class="flex items-center justify-center "> 
            <a class="bg-transparent hover:bg-blue-500 text-blue-500 font-semibold hover:text-blue-500 py-4 px-16" href="{{ route('welcome') }}">Back</a>
        </div>
        
    </form>
</x-guest-layout>
