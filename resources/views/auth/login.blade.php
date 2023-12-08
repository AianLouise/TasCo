<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <link rel="stylesheet" href="guest.blade.php">

    <div class="p-4 sm:p-4"> <!-- Padding adjustments for small screens -->
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <p class="uppercase text-5xl font-bold text-center mb-5">Log In</p>

            <!-- Email Address -->
            <div class="mb-5">
                <div class="relative">
                    <x-text-input id="email" placeholder="Email" class="pl-12 py-2 w-full" type="email"
                        name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <i class="ri-mail-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-500 text-xs"></x-input-error>
            </div>


            <!-- Password -->
            <div class="relative mb-5">
                <x-text-input id="password" placeholder="Password" class="pl-12 py-2 w-full" type="password"
                    name="password" required autocomplete="current-password" />
                <i class="ri-lock-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500"></i>
                <span id="togglePassword" class="absolute top-1/2 right-4 transform -translate-y-1/2 cursor-pointer">
                    <i class="ri-eye-line" id="toggleIcon" style="color: #777;"></i>
                </span>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <script>
                const passwordInput = document.getElementById('password');
                const togglePasswordButton = document.getElementById('togglePassword');
                const toggleIcon = document.getElementById('toggleIcon');

                togglePasswordButton.addEventListener('click', function() {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    // Change eye icon based on password visibility
                    toggleIcon.className = type === 'password' ? 'ri-eye-line' : 'ri-eye-off-line';
                });
            </script>


            @if (Route::has('password.request'))
                <a class="text-sm text-gray-600 hover:text-gray-900 block text-left"
                    href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <div class="flex items-center justify-center">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 w-full rounded mt-5">Log
                    In</button>
            </div>

            <div class="flex items-center justify-center mt-3 text-center">
                <a class="bg-transparent text-blue-500 font-semibold hover:text-blue-500 py-2 px-6 border border-blue-500 rounded w-full"
                    href="{{ route('welcome') }}">Back</a>
            </div>

            @if (Route::has('login'))
                <div class="mt-4 text-center">
                    <a class="text-sm text-gray-600 hover:text-gray-900 block" href="{{ route('register') }}">
                        {{ __("Don't have an account?") }} <span class="text-blue-500">Register</span>
                    </a>
                </div>
            @endif
        </form>
    </div>
</x-guest-layout>
