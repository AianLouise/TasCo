<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <link rel="stylesheet" href="guest.blade.php">

    <div>
        <form method="POST" action="{{ route('login') }}">
            @csrf
    
            <p class="uppercase text-5xl font-bold text-center mb-5">Log In</p>
    
            <!-- Email Address -->
            <div class="relative">
                <div class="w-full relative mb-5">
                    <x-text-input id="email" placeholder="Email" class="pl-12 py-2 block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <i class="ri-mail-line"> <!-- Add a custom class for padding -->
                    </i>
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="relative">
                {{-- <x-input-label for="password" :value="__('Password')" /> --}}
                <div class="w-full relative mb-1">
                    <x-text-input id="password" placeholder="Password" class="pl-12 py-2 block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    <i class="ri-lock-line"></i>
                    <span id="togglePassword" class="absolute top-1/2 right-4 transform -translate-y-1/2 cursor-pointer">
                        <i class="ri-eye-line" id="toggleIcon" style="color: #777;"></i>
                    </span>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <script>
                const passwordInput = document.getElementById('password');
                const togglePassword = document.getElementById('togglePassword');
                const toggleIcon = document.getElementById('toggleIcon');

                togglePassword.addEventListener('click', () => {
                    const type = passwordInput.type === 'password' ? 'text' : 'password';
                    passwordInput.type = type;
                    toggleIcon.className = type === 'password' ? 'ri-eye-line' : 'ri-eye-off-line';
                });
            </script>


    
            @if (Route::has('password.request'))
                    <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
            @endif
    
    
            <div class="flex items-center justify-center " >
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 w-full rounded mt-5">Log In</button>
            </div>

            <div class="flex items-center justify-center "> 
                <a class="bg-transparent text-blue-500 font-semibold hover:text-blue-500 py-2 px-54 w-full border border-blue-500 rounded mt-3" href="{{ route('welcome') }}">Back</a>
            </div>

            @if (Route::has('login'))
                <div class="mt-4 text-center"> <!-- Add text-center class to center the content -->
                    <a class="text-sm text-gray-600 color hover:text-gray-900 rounded-md" href="{{ route('register') }}">
                        {{ __("Don't have an account?") }}
                    </a>
                </div>
            @endif
        </form>
    </div>
</x-guest-layout>
