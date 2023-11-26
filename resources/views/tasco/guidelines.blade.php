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
    <!-- End: Logo -->

    <section>
        <nav x-data="flex { open: false }" class="bg-white border-b border-gray-100">
            <!-- Start: Sidebar -->
            <div class="fixed top-30 w-64 h-full p-4 z-50 sidebar-menu bg-white">
                <div class="flex justify-between">
                    <span class="text-lg font-bold ml-2">Settings</span>
                    <i id="settings-icon" class="ri-menu-fold-fill text-xl text-gray-800"></i>
                </div>

                <!-- Start: Logo -->
                <div>
                    <a href="#" class="flex items-center pb-4 border-b">
                    </a>
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
                    <li class="mb-1 group {{ request()->routeIs('app.activitylog') ? 'active' : '' }}">
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
                    <a href="#" class="flex items-center pb-2 border-b">
                    </a>
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
                    <li class="mb-1 group {{ request()->routeIs('app.guidelines') ? 'active' : '' }}">
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
    </section>

    {{-- CONTENT --}}
    <div class="p-2 mt">
        <i id="show-sidebar-icon" class="ri-settings-5-fill text-2xl text-gray-800"></i>
    </div>
    <div
        class="bg-white border border-gray-100 shadow-md shadow-black/5 p-5 md:w-1/2 mx-auto w-full mt-4 rounded-md lg:px-4">
        <div class="pl-4 grid grid-cols-1">
            <span class="titleinfo text-2xl pb-2 pt-2 text-center">Community Guidelines</span>
        </div>
        <div>
            <div class="grid grid-cols-1 p-8 bg-gray-100 rounded-md">
                <div class="prose max-w-none text-justify">
                    <p class="mb-6">
                        Welcome to TasCo! We are committed to fostering a positive and inclusive community. These
                        Community Guidelines outline the expectations and principles that govern your
                        behavior and contributions within the TasCo community. By participating in our community, you
                        agree to adhere to these Guidelines.
                    </p>

                    <div class="mb-6">
                        <h2>1. Respect Each Other</h2>
                        <p>
                            Treat everyone with respect and kindness. Be considerate of diverse opinions and
                            perspectives. Harassment, hate speech, and discriminatory behavior will not be tolerated.
                        </p>
                    </div>

                    <div class="mb-6">
                        <h2>2. Foster a Positive Environment</h2>
                        <p>
                            Contribute to a positive and constructive atmosphere. Encourage and support fellow community
                            members. Avoid engaging in disruptive or negative behavior.
                        </p>
                    </div>

                    <div class="mb-6">
                        <h2>3. Keep It Safe</h2>
                        <p>
                            Ensure the safety of the community by refraining from sharing personal information, engaging
                            in harmful activities, or promoting unsafe practices. Report any suspicious or inappropriate
                            behavior.
                        </p>
                    </div>

                    <div class="mb-6">
                        <h2>4. Respect Privacy</h2>
                        <p>
                            Respect the privacy of others. Do not share personal information about community members
                            without their explicit consent. Be mindful of confidentiality and data protection.
                        </p>
                    </div>

                    <div class="mb-6">
                        <h2>5. Follow Applicable Laws</h2>
                        <p>
                            Abide by all applicable laws and regulations. Do not engage in illegal activities or promote
                            illegal content. Report any unlawful behavior to the appropriate authorities.
                        </p>
                    </div>

                    <div class="mb-6">
                        <h2>6. Report Violations</h2>
                        <p>
                            If you encounter a violation of these Guidelines or witness inappropriate behavior, report
                            it to the community moderators. Your input helps us maintain a healthy and vibrant
                            community.
                        </p>
                    </div>

                    <div class="mb-6">
                        <h2>7. Contribute Meaningfully</h2>
                        <p>
                            Contribute meaningful and relevant content to the community. Avoid spamming, trolling, or
                            engaging in activities that disrupt the flow of communication.
                        </p>
                    </div>

                    <div class="mb-6">
                        <h2>8. Stay Informed</h2>
                        <p>
                            Stay informed about updates to the Community Guidelines and adhere to any changes. Regularly
                            check community announcements and guidelines for important information.
                        </p>
                    </div>

                    <div>
                        <h2>9. Contact Information</h2>
                        <p>
                            If you have any questions about these Community Guidelines, please contact us at [contact
                            email]. Your participation in the TasCo community is also governed by our Terms and
                            Conditions and Privacy Policy.
                        </p>
                    </div>
                </div>
            </div>
        </div>
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
