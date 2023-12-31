<div>
    <!-- Settings Dropdown -->
    <div class="hidden sm:flex sm:items-center sm:ml-6">
        <div class="mr-6">
            <a href="{{ route('app.chatify') }}" target="_new">
                <i class="ri-message-3-line text-2xl"></i>
            </a>
        </div>

        <div class="mr-6">
            <a href="{{ route('app.notifications') }}">
                <i class="ri-notification-3-line text-2xl"></i>
            </a>
        </div>
        
        <x-dropdown align="right" width="48">
            <x-slot name="trigger">
                <button
                    class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">

                    @if (Auth::user()->avatar == 'avatar.png')
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(Auth::user()->name) }}&color=7F9CF5&background=EBF4FF"
                            alt="" class="w-8 h-8 rounded block object-cover align-middle">
                    @else
                        <img src="{{ asset('storage/users-avatar/' . basename(Auth::user()->avatar)) }}" alt=""
                            class="w-8 h-8 rounded block object-cover align-middle">
                    @endif

                    <div class="ml-1">
                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <!-- Dropdown Content -->
            <x-slot name="content">
                <!-- Profile Link -->
                @if (Auth::user()->role == 'user' && Auth::user()->is_verified == 0)
                    <x-dropdown-link :href="route('user.profile')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                @elseif (Auth::user()->role == 'user' && Auth::user()->is_verified == 1)
                    <x-dropdown-link :href="route('user.profile')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                @elseif (Auth::user()->role == 'worker' && Auth::user()->is_verified == 1)
                    <x-dropdown-link :href="route('worker.profile')">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                @endif

                <x-dropdown-link :href="route('app.settings')">
                    {{ __('Settings') }}
                </x-dropdown-link>

                <!-- Logout Form -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</div>
