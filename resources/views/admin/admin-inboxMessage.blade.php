<x-app-layout>
    <!-- Start: Main Content -->
    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 bg-blue-50 min-h-screen transition-all main">

        <!-- Start: Header -->
        <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/5 sticky top-0 left-0 z-30">

            <!-- Start: Logo / Active Menu -->
            <button type="button" class="text-lg text-gray-600 sidebar-toggle">
                <i class="ri-menu-2-line"></i>
            </button>

            <!-- Breadcrumb Navigation -->
            <ul class="flex items-center text-sm ml-4">
                <li class="mr-2">
                    <a href="#" class="text-gray-800 hover:text-gray-600 font-medium2">TasCo</a>
                </li>
                <li class="text-gray-600 mr-2 font-medium2">/</li>
                <li class="text-gray-600 mr-2 font-medium2"><a href="{{ route('admin.inbox') }}">Inbox</a></li>
                <li class="text-gray-600 mr-2 font-medium2">/</li>
                <li class="text-gray-600 mr-2 font-medium2">View</li>
            </ul>

            <!-- End: Logo / Active Menu -->

            <!-- Start: Profile -->
            <x-admin-profile-dropdown :user="Auth::user()" />
            <!-- End: Profile -->

        </div>
        <!-- End: Header -->

        <div class="bg-white border border-gray-100 shadow-md shadow-black/5 p-10 ml-4 mt-4 mr-4 rounded-md">
            <div class="flex justify-between mb-4 items-start">
                <!-- Heading for Application Section -->
                <div class="font-medium2">Inbox</div>
            </div>

            <!-- Inbox Table -->
            <div class="overflow-x-auto">
                @if ($user)
                    <div class="w-full px-6 pb-8 mt-8 ">

                        <div class="grid max-w-2xl mx-auto mt-8">
                            <div class="flex flex-col items-center space-y-5">
                                <!-- Display User Information -->
                                <div class="flex flex-col items-center space-y-5">
                                    <h3 class="text-xl font-semibold">{{ $user->name }}</h3>
                                    <p class="text-gray-600">{{ $user->email }}</p>
                                </div>

                                <!-- Fetch All Emails from Database -->
                                @php
                                    $emails = App\Models\CustomerServiceMessage::where('user_id', $user->id)->get();
                                @endphp

                                <!-- Display All Emails with Reply and Delete Buttons -->
                                @if ($emails->isNotEmpty())
                                    @foreach ($emails as $email)
                                        <div class="border p-4 rounded-md mb-4">
                                            <div class="flex flex-col space-y-5">
                                                <h4 class="text-lg font-semibold">{{ $email->subject }}</h4>
                                                <p class="text-gray-600" style="width: 600px;">{{ $email->message }}</p>
                                            </div>
                                            <!-- Reply and Delete Buttons -->
                                            <div class="flex justify-center mt-2">
                                                <button class="bg-blue-500 text-white px-4 py-2 rounded-md reply-btn"
                                                    data-email-id="{{ $email->id }}">Reply
                                                </button>
                                                <button
                                                    class="bg-red-500 text-white px-4 py-2 rounded-md ml-2">Delete</button>
                                            </div>
                                            <!-- Reply Form -->
                                            <form action="{{ route('admin.replyEmail', ['emailId' => $email->id]) }}"
                                                method="post" class="mt-2 reply-form" style="display: none;"
                                                data-email-id="{{ $email->id }}">
                                                @csrf
                                                <!-- ... reply form fields ... -->
                                                <textarea name="reply_message" class="w-full h-16 border rounded-md p-2 mt-2" placeholder="Type your reply here"></textarea>
                                                <div class="flex justify-end mt-2">
                                                    <button type="submit"
                                                        class="bg-green-500 text-white px-4 py-2 rounded-md">Submit
                                                        Reply
                                                    </button>
                                                </div>
                                            </form>



                                        </div>
                                    @endforeach
                                @else
                                    <p class="text-gray-600">No emails found for this user.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                @else
                    <!-- Handle the case when $user is null -->
                    User not found
                @endif
            </div>
        </div>

    </main>
    <!-- End: Main Content -->
    <!-- Add this script at the end of your HTML file, before the closing </body> tag -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.reply-btn').forEach(function(button) {
                button.addEventListener('click', function() {
                    const emailId = button.getAttribute('data-email-id');
                    const replyForm = document.querySelector('.reply-form[data-email-id="' +
                        emailId + '"]');
                    if (replyForm) {
                        replyForm.style.display = (replyForm.style.display === 'none' || replyForm
                            .style.display === '') ? 'block' : 'none';
                    }
                });
            });
        });
    </script>
</x-app-layout>
