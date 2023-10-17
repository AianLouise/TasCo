<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <p class="title" style="text-transform: uppercase;font-size: 3em;font-weight: bold;text-align: center;letter-spacing: 1px;margin-bottom: 10px;">Register</p>
        <div class="separator"></div>

       <!-- First Name -->
        <div class="relative">
            <div class="form-control">
                <x-text-input id="fname" placeholder="First Name" class="add-pad i-1 block mt-1 w-full" type="text" name="fname" :value="old('fname')" required autofocus autocomplete="fname" />
                <i class="fas fa-user absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none custom-padding"></i>
            </div>
            <x-input-error :messages="$errors->get('fname')" class="mt-2" />
        </div>

        <!-- Last Name -->
        <div class="relative">
            <div class="form-control">
                <x-text-input id="lname" placeholder="Last Name" class="add-pad i-1 block mt-1 w-full" type="text" name="lname" :value="old('lname')" required autofocus autocomplete="lname" />
                <i class="fas fa-user absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none custom-padding"></i>
            </div>
            <x-input-error :messages="$errors->get('lname')" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="relative">
            <div class="form-control">
                <x-text-input id="address" placeholder="Address" class="add-pad i-1 block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus autocomplete="address" />
                <i class="fas fa-address-card"></i>
            </div>
            <x-input-error :messages="$errors->get('address')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="relative">
            <div class="form-control">
                <x-text-input id="email" placeholder="Email" class="add-pad i-1 block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="email" />
                <i class="fas fa-envelope"></i>
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
                <i class="fas fa-lock"></i>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="relative">
            <div class="">
                <x-text-input id="password_confirmation" placeholder="Confirm Password" class="add-pad i-1 block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />
                <i class="fas fa-lock"></i>
            </div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1" />
        </div>

        @if (Route::has('login'))
            <div class="text-left mt-2"> <!-- Change text-center to text-left, and reduce mt value -->
                <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __("Already have an account?") }} <span>Log In</span>
                </a>
            </div>
        @endif
        

        <div class="flex items-center justify-center "> <!-- Center the button horizontally and vertically -->
            <button class="submit">Register</button>
        </div>
    </form>
</x-guest-layout>
