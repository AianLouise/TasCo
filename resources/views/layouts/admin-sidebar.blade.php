<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Start: Sidebar -->
    <div class="fixed left-0 top-0 w-64 h-full p-4 z-50 sidebar-menu bg-white">
        
        <!-- Start: Logo -->
<div>
        <a href="#" class="flex items-center pb-4 border-b">
            <!-- Logo Image -->
            <img src="https://placehold.co/32x32" alt="" class="w-8 h-8 rounded object-cover">
            <!-- Company Name -->
            <span class="text-lg font-bold ml-3">Tas<span class="text-blue-500">Co</span></span>
            <button type="button" class="text-lg text-gray-600 sidebar-close">
                <i class="ri-menu-fold-fill h-full w-64  blue ml-28"></i>
            </button>
        </a>
</div>        
        <!-- End: Logo -->  
      
        <!-- Start: Menu -->
        <ul class="mt-4">
           
            <!-- Dashboard Link -->
            <li class="mb-1 group {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center py-2 px-4 text-gray-800 
                    hover:bg-blue-400 hover:text-white rounded-md
                    group-[.active]:bg-blue-600 group-[.active]:text-white
                    group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                    <i class="ri-speed-up-line mr-3 text-lg"></i>
                    <span class="text-sm">Dashboard</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <!-- Job Seeker Link -->
            <li class="mb-1 group {{ request()->routeIs('admin.jobSeeker') ? 'active' : '' }}">
                <a href="{{ route('admin.jobSeeker') }}" class="flex items-center py-2 px-4 text-gray-800 
                hover:bg-blue-400 hover:text-white rounded-md 
                group-[.active]:bg-blue-600 group-[.active]:text-white 
                group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                    <i class="ri-user-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Job Seeker</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <!-- Employer Link -->
            <li class="mb-1 group {{ request()->routeIs('admin.employer') ? 'active' : '' }}">
                <a href="{{ route('admin.employer') }}" class="flex items-center py-2 px-4 text-gray-800 
                hover:bg-blue-400 hover:text-gray-100 rounded-md 
                group-[.active]:bg-blue-500 group-[.active]:text-white 
                group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                    <i class="ri-briefcase-line mr-3 text-lg"></i>
                    <span class="text-sm">Employer</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <!-- Services Link -->
            <li class="mb-1 group {{ request()->routeIs('admin.services') ? 'active' : '' }}">
                <a href="{{ route('admin.services') }}" class="flex items-center py-2 px-4 text-gray-800 
                hover:bg-blue-400 hover:text-gray-100 rounded-md 
                group-[.active]:bg-blue-500 group-[.active]:text-white 
                group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                    <i class="ri-shake-hands-line mr-3 text-lg"></i>
                    <span class="text-sm">Services</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <!-- Application Link -->
            <li class="mb-1 group {{ request()->routeIs('admin.application') ? 'active' : '' }}">
                <a href="{{ route('admin.application') }}" class="flex items-center py-2 px-4 text-gray-800 
                hover:bg-blue-400 hover:text-gray-100 rounded-md 
                group-[.active]:bg-blue-500 group-[.active]:text-white 
                group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                    <i class="ri-inbox-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Application</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>
 
            <!-- Inbox Link -->
            <li class="mb-1 group {{ request()->routeIs('admin.inbox') ? 'active' : '' }}">
                <a href="{{ route('admin.inbox') }}" class="flex items-center py-2 px-4 text-gray-800 
                hover:bg-blue-400 hover:text-gray-100 rounded-md 
                group-[.active]:bg-blue-500 group-[.active]:text-white 
                group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                    <i class="ri-mail-line mr-3 text-lg"></i>
                    <span class="text-sm">Inbox</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

            <!-- Audit Trail Link -->
            <li class="mb-1 group {{ request()->routeIs('admin.auditTrail') ? 'active' : '' }}">
                <a href="{{ route('admin.auditTrail') }}" class="flex items-center py-2 px-4 text-gray-800 
                    hover:bg-blue-400 hover:text-gray-100 rounded-md 
                    group-[.active]:bg-blue-500 group-[.active]:text-white 
                    group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                    <i class="ri-git-commit-line mr-3 text-lg"></i>
                    <span class="text-sm">Audit Trail</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>
            
            <!-- Settings Link -->
            <li class="mb-1 group {{ request()->routeIs('admin.settings') ? 'active' : '' }}">
                <a href="{{ route('admin.settings') }}" class="flex items-center py-2 px-4 text-gray-800 
                hover:bg-blue-400 hover:text-gray-100 rounded-md 
                group-[.active]:bg-blue-500 group-[.active]:text-white 
                group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                    <i class="ri-settings-2-line mr-3 text-lg"></i>
                    <span class="text-sm">Settings</span>
                    <i class="ri-arrow-right-s-line ml-auto"></i>
                </a>
            </li>

        </ul>
        <!-- End: Menu -->
        <div class="fixed top-5 left-0 w-full h-full z-40 sm:hidden md:hidden sidebar-overlay ml-53">
            <!-- Mobile Sidebar Overlay Icon -->
            <i class="ri-menu-line text-xl text-gray-800"></i>
        </div>
        
    </div>
    <!-- End: Sidebar -->
</nav>
