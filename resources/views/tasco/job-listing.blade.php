<x-app-layout class="bg-white">
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>

    <section class="relative md:pb-0 bg-white">

        <div class="bg-blue-50 w-full py-0.5">
            <div class="container xl:max-w-6xl mx-auto px-4">
                <!-- Start: Heading-->
                <div class="text-center mx-auto mb-12 lg:px-20 mt-10">
                    <h2 class="text-4xl font-bold text-black leading-normal mb-2">Job Listing</h2>
                    <p class="text-xl text-gray-500 font-light leading-relaxed mx-auto pb-2">Search for workers and services</p>
                </div>
                
                <!-- End: Heading -->
                <!-- Your updated form -->
                <form class="mb-12 w-full" action="{{ route('app.jobListing') }}#top" method="get">
                    <div class="flex relative" >
                        <!-- Your existing button -->
                        <button id="dropdown-button" onclick="toggleDropdown()"
                            class="flex-shrink-0 z-10 inline-flex items-center py-2.5 px-4 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-s-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100"
                            type="button">
                            @if (request()->has('category'))
                                {{ $categories->firstWhere('id', request('category'))->name }}
                            @else
                                All categories
                            @endif
                            <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 4 4 4-4" />
                            </svg>
                        </button>

                        <!-- Dropdown content -->
                        <div id="dropdown-content"
                            class="hidden absolute z-10 mt-10 bg-white border border-gray-300 rounded-lg shadow-md p-3">
                            <!-- Add "All categories" option -->
                            <a href="{{ route('app.jobListing') }}#top"
                                class="block text-sm font-medium text-gray-900 hover:bg-gray-200 p-2">All
                                categories</a>
                            <!-- Add your dynamic categories here -->
                            @foreach ($categories as $category)
                                <a href="{{ route('app.jobListing', ['category' => $category->id]) }}#top"
                                    class="block text-sm font-medium text-gray-900 hover:bg-gray-200 p-2">{{ $category->name }}</a>
                            @endforeach
                        </div>

                        <!-- Your updated search input and button -->
                        <div class="relative w-full">
                            <input type="search" id="search-dropdown" name="search"
                                class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-e-lg border-s-gray-50 border-s-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Search for Workers, Category..." required value="{{ old('search') }}" />
                            <button type="submit"
                                class="absolute top-0 end-0 p-2.5 text-sm font-medium h-full text-white bg-blue-500 rounded-e-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300"
                                onclick="scrollToElement('top')">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="sr-only">Search</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <script>
            function toggleDropdown() {
                var dropdownContent = document.getElementById('dropdown-content');
                dropdownContent.classList.toggle('hidden');
            }

            // Function to scroll to a specific element by ID
            function scrollToElement(elementId) {
                var element = document.getElementById(elementId);
                if (element) {
                    element.scrollIntoView({
                        behavior: 'smooth'
                    });
                }
            }
        </script>

        <div class="container xl:max-w-6xl mx-auto px-4 mt-10">
            <!-- Start: Worker Section Row -->
            <div class="flex flex-wrap flex-row -mx-4 text-center">

                @foreach ($workerUsers as $worker)
                    <div class="flex-shrink px-4 max-w-full w-full sm:w-1/2 lg:w-1/3 lg:px-6 wow fadeInUp"
                        data-wow-duration="1s"
                        style="visibility: visible; animation-duration: 1s; animation-name: fadeInUp;">

                        <!-- Worker Profile -->
                        <div
                            class="py-8 px-12 mb-12 border rounded-lg shadow-md transform transition duration-300 ease-in-out hover:-translate-y-2">
                            <div class="flex flex-col items-center pb-10">
                                @if ($worker->avatar == 'avatar.png')
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                                        src="https://ui-avatars.com/api/?name={{ urlencode($worker->name) }}&color=7F9CF5&background=EBF4FF"
                                        alt="{{ $worker->name }}" />
                                @else
                                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg"
                                        src="{{ asset('storage/users-avatar/' . basename($worker->avatar)) }}"
                                        alt="{{ $worker->name }}">
                                @endif

                                <h5 class="mb-1 text-xl font-medium text-gray-900">{{ $worker->name }}</h5>
                                <span class="text-sm text-gray-500 ">{{ $worker->category->name }}</span>
                                <div class="flex mt-4 md:mt-6">
                                    <a href="{{ route('app.workerprofile', ['worker' => $worker->id]) }}"
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-500 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        View Profile
                                    </a>
                                    <a href=""
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 ms-3">
                                        Message
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End: Worker Profile -->

                    </div>
                @endforeach
            </div>
            <!-- end row -->
        </div>
        <x-footer />
    </section>
</x-app-layout>
