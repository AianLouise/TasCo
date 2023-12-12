<x-guest-layout>
    <div class="p-4">
        <div class="mb-4 text-sm text-gray-600">
            {{ __("Lost your password? No worries! Simply provide us with your email address, and we'll send you a secure link to reset your password and set a new one.") }}
        </div>
    
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />
    
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
    
            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
    
            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="submit bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 rounded" style=" font-size: 12px">
                    {{ __('Email Password Reset Link') }}
                </x-primary-button>
            </div>
        </form>
    </div>
    
</x-guest-layout>
