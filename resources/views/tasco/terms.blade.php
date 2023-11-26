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
                    <li class="mb-1 group {{ request()->routeIs('app.terms') ? 'active' : '' }}">
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
    </section>

    {{-- CONTENT --}}
    <div class="p-2 mt">
        <i id="show-sidebar-icon" class="ri-settings-5-fill text-2xl text-gray-800"></i>
    </div>
    <div
        class="bg-white border border-gray-100 shadow-md shadow-black/5 p-5 md:w-1/2 mx-auto w-full mt-4 rounded-md lg:px-4">
        <div class="grid grid-cols-1">
            <div class="pl-4 grid grid-cols-1">
                <span class="titleinfo text-2xl pb-2 pt-2 text-center">Terms & Condition</span>
            </div>
            <div>
                <div class="grid grid-cols-1 p-8 bg-gray-100 rounded-md">
                    <div class="prose max-w-none text-justify">
                        <p class="mb-6">
                            Welcome to TasCo! These Terms and Conditions govern your use of TasCo and all of its associated services, features, content, and technologies (collectively referred to as "TasCo" or "the platform"). By accessing or using TasCo in any manner, you agree to be bound by these Terms and our Privacy Policy. If you do not accept all of these Terms, then you may not use TasCo.
                        </p>
                        <h2>1. Acceptance of Terms</h2>
                        <p>
                            Welcome to TasCo! These terms and conditions govern your use of TasCo and all of its
                            associated services, features, content, and technologies .
                            By accessing or using TasCo in any manner, you agree to be bound by these terms and
                            conditions and our Privacy Policy. If you do not accept all of these terms, then you may not
                            use TasCo.
                        </p>
                        <br>
                        <h2>2. Changes to Terms</h2>
                        <p>
                            TasCo reserves the right, at its sole discretion, to modify or replace these terms at any
                            time. The most current version of these terms will be posted on the TasCo website. It is
                            your responsibility to check these terms periodically for changes.
                            Your continued use of TasCo following the posting of any changes to these terms constitutes
                            acceptance of those changes.
                        </p>
                        <br>
                        <h2>3. User Eligibility</h2>
                        <p>
                            TasCo is intended solely for users who are 18 years of age or older. Any use or access to
                            TasCo by anyone under 18 is expressly prohibited. By using TasCo, you represent and warrant
                            that you are 18 years or older.
                            If you are under 18, you may use TasCo only with the involvement and supervision of a parent
                            or guardian.
                        </p>
                        <br>
                        <h2>4. User Accounts</h2>
                        <p>
                            To use certain features of TasCo, you may be required to create a user account. You agree to
                            provide accurate, current, and complete information during the registration process and to
                            update such information to keep it accurate, current, and complete.
                            TasCo reserves the right to suspend or terminate your account if any information provided
                            during the registration process or thereafter is discovered to be inaccurate, false, or
                            incomplete.
                        </p>
                        <br>
                        <h2>5. User Content</h2>
                        <p>
                            TasCo allows users to post, link, store, share, and otherwise make available certain
                            information, text, graphics, videos, or other material. You are solely responsible for the
                            content that you post on TasCo.
                            By posting content on TasCo, you grant TasCo a non-exclusive, worldwide, royalty-free,
                            irrevocable, sub-licensable, perpetual license to use, display, edit, modify, reproduce,
                            distribute, store, and prepare derivative works of your content.
                        </p>
                        <br>
                        <h2>6. Code of Conduct</h2>
                        <p>
                            While using TasCo, you agree not to engage in any prohibited conduct, including but not
                            limited to:
                        <ul class="list-disc pl-6">
                            <li>violating any applicable laws or regulations;</li>
                            <li>posting unauthorized commercial communications;</li>
                            <li>collecting users' content or information;</li>
                            <li>bullying, intimidating, or harassing any user;</li>
                            <li>interfering with the proper working of TasCo;</li>
                            <li>using TasCo for any unauthorized or illegal purpose;</li>
                            <li>violating intellectual property rights;</li>
                            <li>encouraging or facilitating any violations of these terms.</li>
                        </ul>
                        </p>
                        <br>
                        <h2>7. Termination</h2>
                        <p>
                            TasCo reserves the right to suspend or terminate your account and refuse any and all current
                            or future use of TasCo for any reason at any time. Such termination will result in the
                            deactivation or deletion of your account and the forfeiture and relinquishment of all
                            content in your account.
                            TasCo reserves the right to refuse service to anyone for any reason at any time.
                        </p>
                        <br>
                        <h2>8. Limitation of Liability</h2>
                        <p>
                            In no event shall TasCo or its affiliates, directors, officers, employees, or agents be
                            liable for any indirect, incidental, special, consequential, or punitive damages, or any
                            loss of profits or revenues, whether incurred directly or indirectly, or any loss of data,
                            use, goodwill, or other intangible losses, resulting from:
                        <ul class="list-disc pl-6">
                            <li>your access to or use of or inability to access or use TasCo;</li>
                            <li>any conduct or content of any third party on TasCo;</li>
                            <li>any content obtained from TasCo; and</li>
                            <li>unauthorized access, use, or alteration of your transmissions or content, whether based
                                on warranty, contract, tort (including negligence), or any other legal theory, whether
                                or not we have been informed of the possibility of such damage.</li>
                        </ul>
                        </p>
                        <br>
                        <h2>9. Governing Law</h2>
                        <p>
                            These terms shall be governed and construed in accordance with the laws of [Your Country],
                            without regard to its conflict of law provisions.
                            Our failure to enforce any right or provision of these terms will not be considered a waiver
                            of those rights. If any provision of these terms is held to be invalid or unenforceable by a
                            court, the remaining provisions of these terms will remain in effect.
                        </p>
                        <br>
                        <h2>10. Contact Information</h2>
                        <p>
                            If you have any questions about these Terms and Conditions, please contact us at [contact
                            email]. Your use of TasCo is also governed by our Privacy Policy, which can be found [link
                            to privacy policy].
                        </p>
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
