<x-app-layout>

    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>

    <style>
        .template {
            background-color: #fff;
            margin-top: 1rem;
            text-align: left;
            /* width: 60%; */
            height: auto;
            margin-left: 30rem;
        }

        .span-left {
            margin-left: 1.5rem;
        }

        .titleinfo {
            font-weight: bold;
            color: rgb(96, 165, 250)
        }

        #modal,
        #editModal,
        #verify-modal {
            /* padding: 5em; */
            /* max-width: 20rem; */
            top: 40%;
            left: 45%;
            right: 50%;
            /* & > *{
            margin: 0 0 0 0.5rem 0;
        } */
        }
    </style>

    <nav x-data="flex { open: false }" class="fixed z-50 top-0 bg-white border-b border-gray-100">
        <!-- Start: Sidebar -->
        <div class="fixed top-30 w-64 h-full p-4 z-50 sidebar-menu bg-white">
            <div class="flex justify-between mt-20">
                <span class="text-lg font-bold ml-2">Settings</span>
                <i id="settings-icon"
                    class="ri-menu-fold-fill text-xl text-gray-800 cursor-pointer transition-all 
                    hover:pr-2
                    hover:font-bold
                    hover:text-blue-400
            "></i>
            </div>

            <!-- Start: Logo -->
            <div>
                <span class="flex items-center pb-2 pt-2 border-b">
                </span>
            </div>
            <!-- End: Logo -->

            <!-- Start: Menu -->
            <ul class="mt-4">

                <!-- Information Detail/Dashboard Link -->
                <li class="mb-1 group {{ request()->routeIs('app.settings') ? 'active' : '' }}">
                    <a href="{{ route('app.settings') }}"
                        class="flex items-center py-2 px-4 text-gray-800 
                                    hover:bg-blue-400 hover:text-white rounded-md
                                    group-[.active]:bg-blue-600 group-[.active]:text-white
                                    group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                        <i class="ri-user-line mr-3 text-lg"></i>
                        <span class="text-sm">Information Details</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>

                <!-- Activity Log Link -->
                <li class="mb-1 group">
                    <a href="{{ route('app.activitylog') }}"
                        class="flex items-center py-2 px-4 text-gray-800 
                                    hover:bg-blue-400 hover:text-white rounded-md 
                                    group-[.active]:bg-blue-600 group-[.active]:text-white 
                                    group-[.selected]:bg-blue-600 group-[.selected]:text-white">
                        <i class="ri-history-line mr-3 text-lg"></i>
                        <span class="text-sm">Activity Log</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>
            </ul>
            <span class="flex text-lg font-bold ml-3 border-t items-center pb-2 pt-2 mt-2">Community</span>
            <!-- Start: Logo -->
            <div>
                <span class="flex items-center pb-2 border-b">
                </span>
            </div>


            <ul class="mt-4">

                <!-- Terms and Conditions Link -->
                <li class="mb-1 group">
                    <a href="{{ route('app.terms') }}"
                        class="flex items-center py-2 px-4 text-gray-800 
                                    hover:bg-blue-400 hover:text-gray-100 rounded-md 
                                    group-[.active]:bg-blue-500 group-[.active]:text-white 
                                    group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                        <i class="ri-book-read-line mr-3 text-lg"></i>
                        <span class="text-sm">Terms and Conditions</span>
                        <i class="ri-arrow-right-s-line ml-auto"></i>
                    </a>
                </li>

                <!-- Guidelines Link -->
                <li class="mb-1 group ">
                    <a href="{{ route('app.guidelines') }}"
                        class="flex items-center py-2 px-4 text-gray-800 
                                    hover:bg-blue-400 hover:text-gray-100 rounded-md 
                                    group-[.active]:bg-blue-500 group-[.active]:text-white 
                                    group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                        <i class="ri-shake-hands-line mr-3 text-lg"></i>
                        <span class="text-sm">Community Guideline</span>
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

    <div class="">
        <i id="show-sidebar-icon"
            class="fixed ri-settings-5-fill text-2xl text-gray-800 bg-white p-4 round-lg mt-64 cursor-pointer transition-all 
                hover:text-blue-300
                hover:pl-6
                hover:text-4xl
        "></i>
    </div>
    <div
        class="bg-white border border-gray-100 shadow-md shadow-black/5 p-5 md:w-1/2 mx-auto w-full mt-4 rounded-md lg:px-4">
        <div class="pl-4 grid grid-cols-1">
            <span class="titleinfo text-2xl pb-2 pt-2">Personal Information</span>
        </div>
        {{-- Name --}}
        <div>
            <div
                class="open-button flex items-center py-2 text-gray-800 rounded-lg
                hover:bg-blue-400 hover:text-white
                group-[.active]:bg-blue-600 group-[.active]:text-white
                group-[.selected]:bg-blue-600 group-[.selected]:text-white
                cursor-pointer
                ">
                <i class="ri-price-tag-3-line text-2xl p-1 ml-3"></i>
                <div class="grid grid-cols-1 pl-4">
                    <span>Name:</span>
                    <span>{{ Auth::user()->name }}</span>
                </div>
                <div class="flex items-end">
                    {{-- <i class="ri-arrow-right-s-line text-4xl ml-auto"></i> --}}
                </div>

            </div>

            <!-- Updated HTML Structure for First Name and Last Name -->
            <dialog class="content-center shadow-lg rounded-lg w-96" id="nameModal" style="margin: auto;">
                <div class="text-center grid grid-rows-6 divide-y divide-gray-200 h-48 mt-4">
                    <div>
                        <i class="ri-user-line text-blue-400 text-base"></i>
                        <span class="tracking-wider font-semibold text-base">Edit Name</span>
                        <button class="text-3xl close-button">
                            <i class="ri-close-line absolute top-2 right-2 close-button hover:text-blue-400"></i>
                        </button>
                    </div>
                    <div>
                        <form class="mt-2 p-4" id="updateNameForm" action="{{ route('update.name') }}" method="POST">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <input class="rounded-lg w-full p-2 text-base border-gray-200 tracking-wide"
                                    type="text" id="fname" name="first_name" placeholder="First Name"
                                    value="{{ Auth::user()->first_name }}">
                                <input class="rounded-lg w-full p-2 text-base border-gray-200 tracking-wide"
                                    type="text" id="lname" name="last_name" placeholder="Last Name"
                                    value="{{ Auth::user()->last_name }}">
                            </div>

                            <button type="submit"
                                class="edit-button border rounded-lg border-gray-200 border-solid p-2 mt-2 w-72 text-base
                    hover:bg-blue-400 hover:text-gray-100 group-[.active]:bg-blue-500 group-[.active]:text-white 
                    group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                                <span class="rounded-lg w-full text-base tracking-wide">
                                    <i class="ri-save-line font-bold mr-2 saveButton"></i>Save
                                </span>
                            </button>
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </dialog>



            <script>
                // Add click event listener to open-button
                const openButton = document.querySelector('.open-button');
                openButton.addEventListener('click', () => {
                    const modal = document.getElementById('nameModal');
                    modal.showModal();
                });

                // Add click event listener to close-button in View Dialog
                const closeButton = document.querySelector('.close-button');
                closeButton.addEventListener('click', () => {
                    const modal = document.getElementById('nameModal');
                    modal.close();
                });

                // Add click event listener to saveButton in Edit Dialog
                const saveButton = document.querySelector('.saveButton');
                saveButton.addEventListener('click', () => {
                    // Add your logic to save the first name and last name
                    const firstName = document.getElementById('fname').value;
                    const lastName = document.getElementById('lname').value;
                    console.log('First Name:', firstName);
                    console.log('Last Name:', lastName);

                    // Close the dialog after saving
                    const modal = document.getElementById('nameModal');
                    modal.close();
                });
            </script>

        </div>

        {{-- Address --}}
        <div>
            <div
                class="open-button flex items-center py-2 text-gray-800 rounded-lg
        hover:bg-blue-400 hover:text-white
        group-[.active]:bg-blue-600 group-[.active]:text-white
        group-[.selected]:bg-blue-600 group-[.selected]:text-white
        cursor-pointer
        ">
                <i class="ri-home-2-line text-2xl p-1 ml-3"></i>
                <div class="grid grid-cols-1 pl-4">
                    <span>Address:</span>
                    <span>{{ Auth::user()->address }}</span>
                </div>
            </div>

            <!-- Updated HTML Structure for Address -->
            <dialog class="content-center shadow-lg rounded-lg w-96" id="addressModal" style="margin: auto;">
                <div class="text-center grid grid-rows-6 divide-y divide-gray-200 h-48 mt-4">
                    <div>
                        <i class="ri-user-line text-blue-400 text-base"></i>
                        <span class="tracking-wider font-semibold text-base">Edit Address</span>
                        <button class="text-3xl close-button">
                            <i class="ri-close-line absolute top-2 right-2 hover:text-blue-400"></i>
                        </button>
                    </div>
                    <div>
                        <form class="mt-2 p-4" action="{{ route('update.address') }}" method="POST">
                            @csrf
                            <div class="grid gap-4">
                                <input class="rounded-lg w-full p-2 text-base border-gray-200 tracking-wide"
                                    type="text" id="address" name="address" placeholder="Address"
                                    value="{{ Auth::user()->address }}">
                            </div>
                            <button
                                class="edit-button border rounded-lg border-gray-200 border-solid p-2 mt-2 w-72 text-base
                hover:bg-blue-400 hover:text-gray-100 group-[.active]:bg-blue-500 group-[.active]:text-white 
                group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100 saveButton">
                                <span class="rounded-lg w-full text-base tracking-wide">
                                    <i class="ri-save-line font-bold mr-2"></i>Save
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </dialog>



            <script>
                // Add click event listener to open-button for Address
                const openAddressButton = document.querySelectorAll('.open-button')[1]; // Selecting the second open-button
                openAddressButton.addEventListener('click', () => {
                    const modal = document.getElementById('addressModal');
                    modal.showModal();
                });

                // Add click event listener to close-button in Address Dialog
                const closeAddressButton = document.querySelector('#addressModal .close-button');
                closeAddressButton.addEventListener('click', () => {
                    const modal = document.getElementById('addressModal');
                    modal.close();
                });
            </script>
        </div>

        {{-- Email --}}
        <div>
            <div
                class="open-button flex items-center py-2 text-gray-800 rounded-lg
        hover:bg-blue-400 hover:text-white
        group-[.active]:bg-blue-600 group-[.active]:text-white
        group-[.selected]:bg-blue-600 group-[.selected]:text-white
        cursor-pointer
        ">
                <i class="ri-mail-line text-2xl p-1 ml-3"></i>
                <div class="grid grid-cols-1 pl-4">
                    <span>Email:</span>
                    <span>{{ Auth::user()->email }}</span>
                </div>
            </div>

            <!-- Updated HTML Structure for Email -->
            <dialog class="content-center shadow-lg rounded-lg w-96" id="emailModal" style="margin: auto;">
                <div class="text-center grid grid-rows-6 divide-y divide-gray-200 h-48 mt-4">
                    <div>
                        <i class="ri-user-line text-blue-400 text-base"></i>
                        <span class="tracking-wider font-semibold text-base">Edit Email</span>
                        <button class="text-3xl close-button">
                            <i class="ri-close-line absolute top-2 right-2 hover:text-blue-400"></i>
                        </button>
                    </div>
                    <div>
                        <form class="mt-2 p-4" method="POST" action="{{ route('update.email') }}">
                            @csrf
                            <div class="grid gap-4">
                                <input class="rounded-lg w-full p-2 text-base border-gray-200 tracking-wide"
                                    type="text" id="email" name="email" placeholder="Email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            <button type="submit"
                                class="edit-button border rounded-lg border-gray-200 border-solid p-2 mt-2 w-72 text-base
                    hover:bg-blue-400 hover:text-gray-100 group-[.active]:bg-blue-500 group-[.active]:text-white 
                    group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100 saveButton">
                                <span class="rounded-lg w-full text-base tracking-wide">
                                    <i class="ri-save-line font-bold mr-2"></i>Save
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </dialog>


            <script>
                // Add click event listener to open-button for Email
                const openEmailButton = document.querySelectorAll('.open-button')[2]; // Selecting the third open-button
                openEmailButton.addEventListener('click', () => {
                    const modal = document.getElementById('emailModal');
                    modal.showModal();
                });

                // Add click event listener to close-button in Phone Dialog
                const closeEmailButton = document.querySelector('#emailModal .close-button');
                closeEmailButton.addEventListener('click', () => {
                    const modal = document.getElementById('emailModal');
                    modal.close();
                });
            </script>
        </div>

        {{-- Phone --}}
        <div>
            <div
                class="open-button flex items-center py-2 text-gray-800 rounded-lg
        hover:bg-blue-400 hover:text-white
        group-[.active]:bg-blue-600 group-[.active]:text-white
        group-[.selected]:bg-blue-600 group-[.selected]:text-white
        cursor-pointer
        ">
                <i class="ri-phone-line text-2xl p-1 ml-3"></i>
                <div class="grid grid-cols-1 pl-4">

                    <span>Phone:</span>
                    <span>{{ Auth::user()->phone }}</span>
                </div>
            </div>

            <!-- Updated HTML Structure for Phone -->
            <dialog class="content-center shadow-lg rounded-lg w-96" id="phoneModal" style="margin: auto;">
                <div class="text-center grid grid-rows-6 divide-y divide-gray-200 h-48 mt-4">
                    <div>
                        <i class="ri-user-line text-blue-400 text-base"></i>
                        <span class="tracking-wider font-semibold text-base">Edit Phone</span>
                        <button class="text-3xl close-button">
                            <i class="ri-close-line absolute top-2 right-2 hover:text-blue-400"></i>
                        </button>
                    </div>
                    <div>
                        <form class="mt-2 p-4" method="POST" action="{{ route('update.phone') }}">
                            @csrf
                            <div class="grid gap-4">
                                <input class="rounded-lg w-full p-2 text-base border-gray-200 tracking-wide"
                                    type="text" id="phone" name="phone" placeholder="Phone"
                                    value="{{ Auth::user()->phone }}">
                            </div>
                            <button type="submit"
                                class="edit-button border rounded-lg border-gray-200 border-solid p-2 mt-2 w-72 text-base
                    hover:bg-blue-400 hover:text-gray-100 group-[.active]:bg-blue-500 group-[.active]:text-white 
                    group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100 saveButton">
                                <span class="rounded-lg w-full text-base tracking-wide">
                                    <i class="ri-save-line font-bold mr-2"></i>Save
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </dialog>



            <script>
                // Add click event listener to open-button for Phone
                const openPhoneButton = document.querySelectorAll('.open-button')[3]; // Selecting the third open-button
                openPhoneButton.addEventListener('click', () => {
                    const modal = document.getElementById('phoneModal');
                    modal.showModal();
                });

                // Add click event listener to close-button in Phone Dialog
                const closePhoneButton = document.querySelector('#phoneModal .close-button');
                closePhoneButton.addEventListener('click', () => {
                    const modal = document.getElementById('phoneModal');
                    modal.close();
                });
            </script>
        </div>
    </div>

    <div
        class="bg-white border border-gray-100 shadow-md shadow-black/5 p-5 md:w-1/2 mx-auto w-full mt-4 rounded-md lg:px-4">
        <div class="pl-4 grid grid-cols-1">
            <span class="titleinfo text-2xl pb-2 pt-2">Password and Security</span>
        </div>
        {{-- Name --}}
        <div>
            <div
                class="open-button flex items-center py-2 text-gray-800 rounded-lg
                hover:bg-blue-400 hover:text-white
                group-[.active]:bg-blue-600 group-[.active]:text-white
                group-[.selected]:bg-blue-600 group-[.selected]:text-white
                cursor-pointer
                ">
                <i class="ri-lock-line text-2xl p-1 ml-3"></i>
                <div class="grid grid-cols-1 pl-4">
                    <span>Change Password</span>
                    {{-- <span>{{ Auth::user()->name }}</span> --}}
                </div>
            </div>
            <div
                class="open-button flex items-center py-2 text-gray-800 rounded-lg
            hover:bg-blue-400 hover:text-white
            group-[.active]:bg-blue-600 group-[.active]:text-white
            group-[.selected]:bg-blue-600 group-[.selected]:text-white
            cursor-pointer
            ">
                <i class="ri-mail-check-line text-2xl p-1 ml-3"></i>
                <div class="grid grid-cols-1 pl-4">
                    <span>Two Factor Authentication</span>
                    {{-- <span>{{ Auth::user()->name }}</span> --}}
                </div>
            </div>

            <!-- Updated HTML Structure for Change Password -->
            <dialog class="content-center shadow-lg rounded-lg w-96 h-80" id="passwordModal" style="margin: auto;">
                <div class="text-center grid grid-rows-6 divide-y divide-gray-200 h-48 mt-4">
                    <div>
                        <i class="ri-lock-password-line text-blue-400 text-base"></i>
                        <span class="tracking-wider font-semibold text-base">Change Password</span>
                        <button class="text-3xl close-button">
                            <i class="ri-close-line absolute top-2 right-2 close-button hover:text-blue-400"></i>
                        </button>
                    </div>
                    <div>
                        <form class="mt-2 p-4">
                            <div class="grid grid-cols-1 gap-4">
                                <input class="rounded-lg w-full p-2 text-base border-gray-200 tracking-wide"
                                    type="password" id="currentPassword" name="currentPassword"
                                    placeholder="Current Password">
                                <input class="rounded-lg w-full p-2 text-base border-gray-200 tracking-wide"
                                    type="password" id="newPassword" name="newPassword" placeholder="New Password">
                                <input class="rounded-lg w-full p-2 text-base border-gray-200 tracking-wide"
                                    type="password" id="confirmPassword" name="confirmPassword"
                                    placeholder="Confirm Password">
                            </div>
                        </form>

                        <button
                            class="edit-button border rounded-lg border-gray-200 border-solid p-2 mt-2 w-72 text-base
                    hover:bg-blue-400 hover:text-gray-100 group-[.active]:bg-blue-500 group-[.active]:text-white 
                    group-[.selected]:bg-blue-600 group-[.selected]:text-gray-100">
                            <span class="rounded-lg w-full text-base tracking-wide">
                                <i class="ri-save-line font-bold mr-2 saveButton"></i>Save
                            </span>
                        </button>
                    </div>
                </div>
            </dialog>

        </div>
    </div>

    <script>
        // Add click event listener to open-button for Change Password
        const openPasswordButton = document.querySelectorAll('.open-button')[4]; // Selecting the fourth open-button
        openPasswordButton.addEventListener('click', () => {
            const modal = document.getElementById('passwordModal');
            modal.showModal();
        });

        // Add click event listener to close-button in Change Password Dialog
        const closePasswordButton = document.querySelector('#passwordModal .close-button');
        closePasswordButton.addEventListener('click', () => {
            const modal = document.getElementById('passwordModal');
            modal.close();
        });
    </script>


    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const settingsSidebar = document.querySelector('.sidebar-menu');
            const sidebarOverlay = document.querySelector('.sidebar-overlay');
            const showSidebarIcon = document.getElementById('show-sidebar-icon');

            function toggleSidebar() {
                settingsSidebar.classList.toggle('hidden');
                sidebarOverlay.classList.toggle('hidden');
            }

            // Event listener for the settings icon click
            const settingsIcon = document.getElementById('settings-icon');
            if (settingsIcon) {
                settingsIcon.addEventListener('click', toggleSidebar);
            }

            // Event listener for the show sidebar icon click
            if (showSidebarIcon) {
                showSidebarIcon.addEventListener('click', toggleSidebar);
            }

            // Event listener for the sidebar overlay click to close the sidebar
            sidebarOverlay.addEventListener('click', toggleSidebar);
        });
    </script>
</x-app-layout>
