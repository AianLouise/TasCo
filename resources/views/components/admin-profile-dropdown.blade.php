<!-- profile-dropdown.blade.php -->

@props(['user'])

<ul class="ml-auto flex items-center">
    <div class="mr-6">
        <a href="{{ route('admin.chatify') }}">
            <i class="ri-message-3-line text-2xl"></i>
        </a>
    </div>
    <div class="text-gray-800 hover:text-gray-600 font-medium2">{{ $user->name }}</div>
    <li class="dropdown ml-3">
        <button type="button" class="dropdown-toggle flex items-center">
            @if($user->avatar == 'avatar.png')
                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&color=7F9CF5&background=EBF4FF" 
                alt="" class="w-8 h-8 rounded block object-cover align-middle">
            @else
                <img src="{{ asset('storage/users-avatar/' . basename($user->avatar)) }}" 
                alt="" class="w-8 h-8 rounded block object-cover align-middle">
            @endif
            
        </button>

        <ul class="dropdown-menu shadow-md shadow-black/5 z-30 hidden py-1.5 rounded-md bg-white border border-gray-100 w-full max-w-[140px]">
            <li>
                <a href="{{ route('admin.editProfile', ['id' => $user->id]) }}" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">
                    <i class="ri-user-line mr-1"></i>Profile
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50">
                    <i class="ri-settings-2-line mr-1"></i>Settings
                </a>
            </li>
            <li>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a href="#" class="flex items-center text-[13px] py-1.5 px-4 text-gray-600 hover:text-blue-500 hover:bg-gray-50"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class="ri-logout-box-r-line mr-1"></i>Log out
                    </a>
                </form>
            </li>
        </ul>
    </li>
</ul>
