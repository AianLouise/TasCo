<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div sty>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <section class="side">
                <img src="./img/login.jpg" alt="">
            </section>
    
            <section class="main">
                
                <div class="form-container">
                    <p class="title">Log In</p>
                    <div class="separator"></div>
                    
        
                    <form class="login-form">
                        <div class="form-control">
                            <input type="text" placeholder="Email">
                            <i class="fas fa-envelope"></i>
                        </div>
                    <div class="form-control">
                            <input type="password" placeholder="Password">
                            <i class="fas fa-lock"></i>
                    </div>
                    <p>Don't have an account? <a href="register.html"><span>Register</span></a></p>
                    <button class="submit">Log In</button>
                    </form>
                </div>
            </section>
    
            {{-- <p class="title" style="text-transform: uppercase;font-size: 3em;font-weight: bold;text-align: center;letter-spacing: 1px;margin-bottom: 10px;">Log In</p>
            <div class="separator"></div>
    
            <!-- Email Address -->
            <div class="mt-11" style="margin-top: 2rem;width: 100%;position: relative;margin-bottom: 24px;">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <!-- Password -->
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
    
                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
    
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>
    
            @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
            @endif
    
    
            <div class="flex items-center justify-end mt-4" style="margin-bottom: 2rem">
                <x-primary-button class="mx-auto" style="padding: 1rem; padding-left: 2rem; padding-right: 2rem;">
                    {{ __('Log in') }}
                </x-primary-button>            
            </div>
        </form> --}}
    </div>
   
</x-guest-layout>
