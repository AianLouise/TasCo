<x-guest-layout>
    <div class="p-4">
        <form method="POST" action="{{ route('password.store') }}">
            @csrf
    
            <p class="title" style="text-transform: uppercase;font-size: 1.5em;font-weight: bold;text-align: center;letter-spacing: 1px;margin-bottom: 10px;">Reset Your Password</p>
            <div class="separator"></div>
    
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
    
            <!-- Email Address -->
            <div class="relative">
                <div class="form-control">
                    <x-text-input id="email" placeholder="Email" class="add-pad i-1 block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="email" />
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
    
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="submit">
                    {{ __('Reset Password') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    
</x-guest-layout>
