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


    <main class="bg-blue-50">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-4 pt-4 px-10">

            <!-- Start: Dashboard Analytics - Active Hires Section -->
            <div class="bg-white rounded-md border border-gray-200 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-4">
                    <div>
                        @php
                            $statusCount = $hiringForms->whereIn('status', ['Finished', 'Ongoing', 'Accepted', 'Completed(Pending)'])->count();
                        @endphp

                        <div class="flex items-center mb-1">
                            <div class="text-3xl font-semibold">{{ $statusCount }}</div>
                        </div>
                        <div class="text-sm font-medium text-gray-800">Active Hires</div>
                    </div>
                    <div>
                        <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i
                                class="ri-more-fill"></i></button>
                    </div>
                </div>

                <div class="flex items-center">
                    <!-- Additional content if needed -->
                </div>
            </div>
            <!-- End: Dashboard Analytics - Active Hires Section -->

            <!-- Start: Dashboard Analytics - Hiring Applications Section -->
            <div class="bg-white rounded-md border p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-4">
                    <div>
                        <div class="flex items-center mb-1">
                            @php
                                $pendingCount = $hiringForms->where('status', 'Pending')->count();
                            @endphp

                            <div class="text-3xl font-semibold">{{ $pendingCount }}</div>
                        </div>
                        <div class="text-sm font-medium text-gray-800">Hiring Applications</div>
                    </div>
                    <div>
                        <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i
                                class="ri-more-fill"></i></button>
                    </div>
                </div>
                <div class="flex items-center">
                    <!-- Additional content if needed -->
                </div>
            </div>
            <!-- End: Dashboard Analytics - Hiring Applications Section -->

            <!-- Start: Dashboard Analytics - Total Employments Section -->
            <div class="bg-white rounded-md border border-gray-200 p-6 shadow-md shadow-black/5">
                <div class="flex justify-between mb-6">
                    <div>
                        @php
                            $completedCount = $hiringForms->where('status', 'Completed')->count();
                        @endphp

                        <div class="text-3xl font-semibold mb-1">{{ $completedCount }}</div>
                        <div class="text-sm font-medium text-gray-800">Total Employments</div>
                    </div>
                    <div>
                        <button type="button" class="dropdown-toggle text-gray-800 hover:text-gray-600"><i
                                class="ri-more-fill"></i></button>
                    </div>
                </div>
                <a href="{{ route('admin.viewAllUsers') }}"
                    class="text-blue-500 font-medium text-sm hover:text-blue-600">View all</a>
            </div>
            <!-- End: Dashboard Analytics - Total Employments Section -->
        </div>


        <div class="grid grid-cols-1 p-4  md:grid-cols-2 mx-auto">
            <!-- Left Column (Calendar) -->
            <div class="flex-1 mb-4 p-5">
                <div id='full-calendar' class="bg-white p-4 shadow-md rounded-md"></div>
            </div>

            <!-- Right Column (Upcoming Schedule) -->
            <div class="flex-1 bg-white p-6 rounded-md divide-y mb-10 mt-5 md:mr-10 md:p-10">
                <div class="flex justify-between mb-1 items-start">
                    <h2 class="font-medium2 mb-1 text-start"><i class="ri-calendar-event-fill"></i> Upcoming Work
                        Schedule
                    </h2>
                </div>

                <div class="overflow-x-auto max-h-52">
                    <table class="min-w-full bg-white shadow-md rounded-md text-start text-xs">
                        <thead>
                            <tr class="border-b">
                                <th scope="col"
                                    class="px-6 py-3 text-left font-medium text-gray-800 uppercase tracking-wider">
                                    Project</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left font-medium text-gray-800 uppercase tracking-wider">
                                    Employer</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left font-medium text-gray-800 uppercase tracking-wider">
                                    Date</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left font-medium text-gray-800 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left font-medium text-gray-800 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                @if ($event->status == 'Pending' || $event->status == 'Ongoing')
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">
                                            {{ $event->title }}-{{ $event->dayText }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">
                                            {{ $event->employer->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">
                                            {{ \Carbon\Carbon::parse($event->start)->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">
                                            {{ $event->status }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">
                                            <!-- Add your action button here -->
                                            <a href="{{ route('work.view', ['HiringForm_id' => $event->id]) }}"
                                                class="bg-blue-500 text-white px-4 py-2 rounded">View</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex justify-between mb-3 items-start">
                    <h2 class="font-medium2 mt-4 text-start"><i class="ri-calendar-check-line"></i> Done Work Schedule
                    </h2>
                </div>

                <div class="overflow-x-auto max-h-48">
                    <table class="min-w-full bg-white shadow-md rounded-md text-start text-xs">
                        <thead>
                            <tr class="border-b">
                                <th scope="col"
                                    class="px-6 py-3 text-left font-medium text-gray-800 uppercase tracking-wider">
                                    Project</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left font-medium text-gray-800 uppercase tracking-wider">
                                    Employer</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left font-medium text-gray-800 uppercase tracking-wider">
                                    Date</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left font-medium text-gray-800 uppercase tracking-wider">
                                    Status</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left font-medium text-gray-800 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($events as $event)
                                @if ($event->status == 'Done')
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">
                                            {{ $event->title }}-{{ $event->dayText }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">
                                            {{ $event->employer->name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">
                                            {{ \Carbon\Carbon::parse($event->start)->format('M d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">
                                            {{ $event->status }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-800">
                                            <!-- Add your action button here -->
                                            <a href="{{ route('work.view', ['HiringForm_id' => $event->id]) }}"
                                                class="bg-blue-500 text-white px-4 py-2 rounded">View</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Center Column (Current Hires) -->
        <div>
            <div class="flex-1 bg-white p-4 rounded-md md:mx-4 mb-4">
                <div>
                    <h2 class="font-medium2 mb-4 text-start">Current Hires</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-md text-start">
                        <thead>
                            <tr>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Project Title</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Project Description</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Category</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Employer</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Start Date</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    End Date</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="border-b px-6 py-3 text-center text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody id="hiring-application-table">
                            @foreach ($hiringForms as $hiringForm)
                                @if (
                                    $hiringForm->status === 'Accepted' ||
                                        $hiringForm->status === 'Ongoing' ||
                                        $hiringForm->status === 'Finished' ||
                                        $hiringForm->status === 'Completed(Pending)')
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->projectTitle }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->projectDescription }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            @php
                                                $workerCategory = $hiringForm->worker ? $hiringForm->worker->category->name : 'N/A';
                                                echo $workerCategory;
                                            @endphp
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->employer->name ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ \Carbon\Carbon::parse($hiringForm->startDate)->format('F d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ \Carbon\Carbon::parse($hiringForm->endDate)->format('F d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->status }}</td>
                                        <!-- Action Column -->
                                        <td
                                            class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800 text-center">
                                            <a class="open-button text-blue-500" data-id="{{ $hiringForm->id }}"
                                                style="cursor: pointer;">View</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Center Column (Hiring Applicationa) -->
        <div>
            <div class="flex-1 bg-white p-4 rounded-md md:mx-4">
                <div>
                    <h2 class="font-medium2 mb-4 text-start">Hiring Applications</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-md text-start">
                        <thead>
                            <tr>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Project Title</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Project Description</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Category</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Employer</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Start Date</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    End Date</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="border-b px-6 py-3 text-center text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody id="hiring-application-table">
                            @foreach ($hiringForms as $hiringForm)
                                @if ($hiringForm->status === 'Pending')
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->projectTitle }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->projectDescription }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            @php
                                                $workerCategory = $hiringForm->worker ? $hiringForm->worker->category->name : 'N/A';
                                                echo $workerCategory;
                                            @endphp
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->employer->name ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ \Carbon\Carbon::parse($hiringForm->startDate)->format('F d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ \Carbon\Carbon::parse($hiringForm->endDate)->format('F d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->status }}</td>
                                        <!-- Action Column -->
                                        <td
                                            class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800 text-center">
                                            <a class="open-button text-blue-500" data-id="{{ $hiringForm->id }}"
                                                style="cursor: pointer;">View</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div>
            <!-- Center Column (Completed Job) -->
            <div class="flex-1 bg-white p-4 rounded-md md:mx-4 mb-4 mt-4">
                <div>
                    <h2 class="font-medium2 mb-4 text-start">Completed Projects</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-md text-start">
                        <thead>
                            <tr>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Project Title</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Project Description</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Category</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Employer</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Start Date</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    End Date</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="border-b px-6 py-3 text-center text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody id="hiring-application-table">
                            @foreach ($hiringForms as $hiringForm)
                                @if ($hiringForm->status === 'Completed')
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->projectTitle }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->projectDescription }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            @php
                                                $workerCategory = $hiringForm->worker ? $hiringForm->worker->category->name : 'N/A';
                                                echo $workerCategory;
                                            @endphp
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->employer->name ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ \Carbon\Carbon::parse($hiringForm->startDate)->format('F d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ \Carbon\Carbon::parse($hiringForm->endDate)->format('F d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->status }}</td>
                                        <!-- Action Column -->
                                        <td
                                            class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800 text-center">
                                            <a class="open-button text-blue-500" data-id="{{ $hiringForm->id }}"
                                                style="cursor: pointer;">View</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div>
            <!-- Center Column (Completed Job) -->
            <div class="flex-1 bg-white p-4 rounded-md md:mx-4 mb-4 mt-4">
                <div>
                    <h2 class="font-medium2 mb-4 text-start">Rejected Hiring Applications</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-md text-start">
                        <thead>
                            <tr>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Project Title</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Project Description</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Category</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Employer</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Start Date</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    End Date</th>
                                <th
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Status</th>
                                <th
                                    class="border-b px-6 py-3 text-center text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody id="hiring-application-table">
                            @foreach ($hiringForms as $hiringForm)
                                @if ($hiringForm->status === 'Rejected')
                                    <tr class="border-b">
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->projectTitle }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->projectDescription }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            @php
                                                $workerCategory = $hiringForm->worker ? $hiringForm->worker->category->name : 'N/A';
                                                echo $workerCategory;
                                            @endphp
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->employer->name ?? 'N/A' }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ \Carbon\Carbon::parse($hiringForm->startDate)->format('F d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ \Carbon\Carbon::parse($hiringForm->endDate)->format('F d, Y') }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                            {{ $hiringForm->status }}</td>
                                        <!-- Action Column -->
                                        <td
                                            class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800 text-center">
                                            <a class="open-button text-blue-500" data-id="{{ $hiringForm->id }}"
                                                style="cursor: pointer;">View</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @foreach ($hiringForms as $hiringForm)
            <dialog class="content-center shadow-lg rounded-lg m-auto" id="nameModal-{{ $hiringForm->id }}"
                style="width: 80vw; max-width: 800px; overflow-y: auto;">
                <div class="text-center grid divide-gray-200 w-full">
                    <div class="bg-white shadow-md p-8 w-full text-center rounded-lg">
                        <form method="POST" action="" class="overflow-hidden">
                            @csrf
                            <!-- Form heading -->
                            <h1 class="text-lg font-semibold mb-1">Job Hiring Form</h1>

                            <!-- Employer Details section -->
                            <div class="border border-blue-200 shadow-lg p-10 rounded-lg pt-5 pb-5">
                                <h2 class="text-sm font-semibold mb-2">Job Seeker Details</h2>

                                <div class="flex items-center justify-center mb-2">
                                    <!-- Worker Avatar -->
                                    <div>
                                        @if ((isset($hiringForm->worker) ? $hiringForm->worker->avatar : '') == 'avatar.png')
                                            <img src="https://ui-avatars.com/api/?name={{ urlencode(isset($hiringForm->worker) ? $hiringForm->worker->name : '') }}&color=7F9CF5&background=EBF4FF"
                                                alt=""
                                                class="w-32 h-auto mx-auto sm:mx-0 rounded-full shadow-xl avatarimg mb-5 hover:shadow-inner transition-all">
                                        @else
                                            <img src="{{ asset('storage/users-avatar/' . basename(isset($hiringForm->worker) ? $hiringForm->worker->avatar : '')) }}"
                                                alt=""
                                                class="w-32 h-auto mx-auto sm:mx-0 rounded-full shadow-xl avatarimg mb-5 hover:shadow-inner transition-all">
                                        @endif


                                        <!-- Message Link -->
                                        <a href="{{ route('user.chatify', ['user_id' => isset($hiringForm->worker) ? $hiringForm->worker->id : '']) }}"
                                            target="_new"
                                            class="border hover:border-1 hover:border-blue-700 hover:text-blue-500 hover:shadow-inner text-gray font-bold py-2 px-4 rounded w-36 text-sm shadow-md transition-all">
                                            Message
                                        </a>
                                    </div>


                                    <!-- Worker Information -->
                                    <div
                                        class="bg-white text-gray-700 hover:text-black px-6 py-2 rounded-lg sm:ml-12 sm:text-justify divide-w-full  mt-5 sm:mt-0 text-center">
                                        <div class="mb-2 transition-all">
                                            <label for="workerFullName" class="block text-xs font-medium">Full
                                                Name</label>
                                            <p class="py-1 rounded-md bg-blue-100 my-1 sm:pl-2 shadow-xs">
                                                {{ isset($hiringForm->worker) ? $hiringForm->worker->name : '' }}
                                            </p>
                                        </div>

                                        @foreach ($hiringForms as $hiringForm)
                                            @if (isset($hiringForm->worker))
                                                <div class="pb-2">
                                                    <label for="workerEmail"
                                                        class="block text-xs font-medium pt-1">Job Title</label>
                                                    <p class="py-1 rounded-md bg-blue-100 my-1 sm:pl-2 shadow-xs">
                                                        {{ optional($hiringForm->worker->category)->name ?? 'N/A' }}
                                                    </p>
                                                </div>
                                            @endif
                                        @endforeach



                                        <div class="pb-2">
                                            <label for="workerEmail"
                                                class="block text-xs font-medium pt-1 ">Email</label>
                                            <p class="py-1 rounded-md bg-blue-100 my-1 sm:pl-2 shadow-xs">
                                                {{ isset($hiringForm->worker) ? $hiringForm->worker->email : '' }}
                                            </p>
                                        </div>

                                        <div class="pb-2">
                                            <label for="workerPhone"
                                                class="block text-xs font-medium pt-1">Phone</label>
                                            <p class="py-1 rounded-md bg-blue-100 my-1 sm:pl-2 shadow-xs">
                                                {{ isset($hiringForm->worker) ? $hiringForm->worker->phone : '' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Project Details section -->
                            <div class="border border-blue-200 bg-white shadow-md  rounded-lg p-4 mt-2">
                                <h2 class="text-sm font-semibold mb-2">Project Details</h2>
                                <div class="bg-white p-4 rounded-lg w-full shadow-inner">
                                    <div class="w-full mb-2">
                                        <label for="projectTitle" class="block text-xs font-medium mb-2">Project
                                            Title</label>
                                        <input type="text" name="projectTitle" id="projectTitle"
                                            placeholder="Enter project title"
                                            value="{{ isset($hiringForm) ? $hiringForm->projectTitle : '' }}"
                                            class="border-gray-400 invalid:border-gray-200 hover:bg-blue-500 hover:text-white placeholder:text-gray-500 invalid:bg-blue-100 invalid:shadow-inner bg-white focus:shadow-inner focus:bg-white focus:border-white focus:ring-0 rounded-md shadow-sm w-full text-sm transition-colors"
                                            required disabled>
                                    </div>
                                    <div class="w-full mb-2">
                                        <label for="projectDescription"
                                            class="block text-xs font-medium  mb-2">Project
                                            Description</label>
                                        <textarea name="projectDescription" id="projectDescription" placeholder="Enter project description"
                                            class="border-gray-400 invalid:border-gray-200 placeholder:text-gray-500 hover:bg-blue-500 hover:text-white
                                        invalid:text-blue-30 invalid:bg-blue-100 invalid:shadow-inner
                                        bg-white focus:shadow-inner focus:bg-white focus:border-white
                                        focus:ring-0 rounded-md shadow-sm w-full p-2 text-sm transition-colors
                                        "rows="4"
                                            required disabled>{{ isset($hiringForm) ? $hiringForm->projectDescription : '' }}</textarea>
                                    </div>
                                    <div class="flex mb-2">
                                        <!-- Start Date -->
                                        <div class="w-1/2 mr-1">
                                            <label for="startDate" class="block text-xs font-medium mb-2">Start
                                                Date</label>
                                            <input type="text" name="startDate" id="startDate"
                                                value="{{ isset($hiringForm) ? $hiringForm->startDate : '' }}"
                                                class="border-gray-400 hover:bg-blue-500
                                             hover:placeholder:text-white placeholder:text-blue-400 placeholder:font-semibold placeholder:text-center focus:shadow-inner hover:border-white
                                             focus:bg-white focus:border-white rounded-md shadow-sm w-full text-sm transition-all hover:text-white"
                                                placeholder="Select start date" disabled>
                                        </div>

                                        <!-- End Date -->
                                        <div class="w-1/2 ml-1">
                                            <label for="endDate" class="block text-xs font-medium mb-2">End
                                                Date</label>
                                            <input type="text" name="endDate" id="endDate"
                                                value="{{ isset($hiringForm) ? $hiringForm->endDate : '' }}"
                                                class="border-gray-400 hover:bg-blue-500 hover:placeholder:text-white hover:border-white placeholder:text-blue-400 placeholder:font-semibold placeholder:text-center focus:shadow-inner
                                             focus:bg-white focus:border-white rounded-md shadow-sm w-full text-sm transition-all hover:text-white"
                                                placeholder="Select end date" disabled>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Scope of Work section -->
                            <div class="border border-blue-200 bg-white shadow-md p-10 rounded-lg pt-5 pb-5 mt-2">
                                <h2 class="text-sm font-semibold mb-2">Scope of Work</h2>
                                <div class="w-full mb-2 shadow-inner p-4 rounded-lg">
                                    <label for="scopeOfWork"
                                        class="block text-xs font-medium text-gray-500  mb-2">Briefly
                                        describe
                                        the
                                        tasks
                                        and
                                        responsibilities of the worker.</label>
                                    <textarea name="scopeOfWork" id="scopeOfWork" placeholder="Enter scope of work"
                                        class="border-gray-400 invalid:border-gray-200 placeholder:text-gray-500 hover:bg-blue-500 hover:text-white
                                        invalid:text-blue-30 invalid:bg-blue-100 invalid:shadow-inner
                                        bg-white focus:shadow-inner focus:bg-white focus:border-white
                                        focus:ring-0 rounded-md shadow-sm w-full p-2 text-sm transition-colors"
                                        rows="4" required>{{ isset($hiringForm) ? $hiringForm->scopeOfWork : '' }}</textarea>
                                </div>
                            </div>

                            <!-- Payment Terms section -->
                            <div class="border border-blue-200 bg-white shadow-md p-10 rounded-lg pt-5 pb-5 mt-2">
                                <h2 class="text-sm font-semibold mb-2">Payment Terms</h2>

                                <div class="grid grid-rows-1 sm:grid-cols-3 shadow-inner p-4 rounded-lg">
                                    <!-- Total Payment -->
                                    <div class="w-full mb-2">
                                        <label for="totalPayment" class="block text-xs font-medium  mb-2">Total
                                            Payment</label>
                                        <input type="number" name="totalPayment" id="totalPayment"
                                            value="{{ isset($hiringForm) ? $hiringForm->totalPayment : '' }}"
                                            class="border-gray-400 invalid:border-gray-200 placeholder:text-gray-500
                                        invalid:text-blue-30 invalid:bg-blue-100 invalid:shadow-inner hover:bg-blue-500 hover:text-white
                                        bg-white focus:shadow-inner focus:bg-white focus:border-white
                                        focus:ring-0 rounded-md shadow-sm w-full p-2 text-sm transition-colors"
                                            placeholder="Enter total payment" required pattern="[0-9]+" disabled>
                                    </div>


                                    <!-- Payment Frequency -->
                                    <div class="w-full mb-2">
                                        <label for="paymentFrequency" class="block text-xs font-medium  mb-2">Payment
                                            Frequency</label>
                                        <select name="paymentFrequency" id="paymentFrequency"
                                            class="border-gray-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-40 text-center h-10 text-sm hover:bg-blue-500 hover:text-white"
                                            required disabled>
                                            <option value="hourly"
                                                {{ isset($hiringForm) && $hiringForm->paymentFrequency === 'hourly' ? 'selected' : '' }}>
                                                Hourly</option>
                                            <option value="perDay"
                                                {{ isset($hiringForm) && $hiringForm->paymentFrequency === 'perDay' ? 'selected' : '' }}>
                                                Per Day</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>

                                    <!-- Payment Method -->
                                    <div class="w-full mb-2">
                                        <label for="paymentMethod" class="block text-xs font-medium  mb-2">Payment
                                            Method</label>
                                        <select name="paymentMethod" id="paymentMethod"
                                            class="border-gray-400 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm w-40 text-center h-10 text-sm hover:bg-blue-500 hover:text-white" 
                                            required disabled>
                                            <option value="bankTransfer"
                                                {{ isset($hiringForm) && $hiringForm->paymentMethod === 'bankTransfer' ? 'selected' : '' }}>
                                                Bank Transfer</option>
                                            <option value="cash"
                                                {{ isset($hiringForm) && $hiringForm->paymentmethod === 'cash' ? 'selected' : '' }}>
                                                Cash</option>
                                            <!-- Add more options as needed -->
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- Submit button -->
                            <div class="flex mb-2 mt-3 justify-center space-x-1">
                                {{-- @if ($hiringForm->status === 'Pending')
                                    <div class="">
                                        <a href="{{ route('acceptStatus', ['id' => $hiringForm->id]) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-xs w-20">
                                            Accept
                                        </a>
                                    </div>
                                    <div class="">
                                        <a href="{{ route('rejectStatus', ['id' => $hiringForm->id]) }}"
                                            class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded text-xs">
                                            Reject
                                        </a>
                                    </div> --}}
                                @if ($hiringForm->status === 'Finished')
                                    <div class="flex flex-col justify-center">
                                        <div class="flex flex-col justify-center">
                                            @foreach ($hiringForm->employments as $index => $employment)
                                                <div class="flex flex-col mb-6 items-center">
                                                    <h1 class="text-2xl font-bold mb-4">Day {{ $index + 1 }} -
                                                        Documentation</h1>
                                                    <div
                                                        class="grid grid-rows-1 sm:flex justify-center sm:justify-between gap-5">
                                                        <div class="w-full sm:w-1/3">
                                                            <img src="{{ asset('storage/documentation/' . basename($employment->image1)) }}"
                                                                alt="Image" class="border shadow-xl rounded-xl">
                                                        </div>
                                                        <div class="w-full sm:w-1/3 flex flex-col items-center">
                                                            <img src="{{ asset('storage/documentation/' . basename($employment->image2)) }}"
                                                                alt="Image" class="border shadow-xl rounded-xl">
                                                        </div>
                                                        <div class="w-full sm:w-1/3">
                                                            <img src="{{ asset('storage/documentation/' . basename($employment->image3)) }}"
                                                                alt="Image" class="border shadow-xl rounded-xl">
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                            <div>
                                                <a href="{{ route('user.MarkAsCompleted', ['id' => $hiringForm->id]) }}"
                                                    class="inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Mark as Completed
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                            </div>

                        </form>
                    </div>

                    <!-- Load flatpickr script after the form -->
                    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
                    <script>
                        flatpickr('#startDate, #endDate', {
                            dateFormat: 'Y-m-d', // Store the date in Y-m-d format
                            altInput: true, // Create an alternate input field
                            altFormat: 'F j, Y', // Format for the alternate input field (displayed in the textbox)
                            // Add other Flatpickr options as needed
                        });
                    </script>
                </div>
            </dialog>
        @endforeach

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Add click event listener to open-button
                const openButtons = document.querySelectorAll('.open-button');
                openButtons.forEach((openButton) => {
                    openButton.addEventListener('click', () => {
                        const hiringFormId = openButton.getAttribute('data-id');
                        const modalId = `nameModal-${hiringFormId}`;
                        const modal = document.getElementById(modalId);
                        modal.showModal();
                    });
                });
    
                // Add click event listener to close the dialog when clicking outside
                const modals = document.querySelectorAll('dialog');
                modals.forEach((modal) => {
                    modal.addEventListener('click', (e) => {
                        if (e.target === modal) {
                            modal.close();
                        }
                    });
                });
            });
        </script>
        <x-footer />
    </main>


    <!-- Add this line to your existing code -->
    <script src='{{ asset('node_modules/@fullcalendar/core/main.js') }}'></script>

    <script type="text/javascript">
        $(document).ready(function() {
            // Set the base URL for AJAX requests
            var SITEURL = "{{ url('/') }}";

            // Setup CSRF headers for AJAX requests
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Initialize FullCalendar
            var calendar = $('#full-calendar').fullCalendar({
                editable: true,
                events: SITEURL + "/fullcalender",
                displayEventTime: false,
                editable: true,
                eventRender: function(event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                dayRender: function(date, cell) {
                    // Get today's date
                    var today = new Date();

                    // Check if the current cell represents today's date
                    if (date.isSame(today, 'day')) {
                        cell.css('background-color', 'rgb(239 246 255)');
                        cell.css('color', 'white'); // Set text color to white for better visibility
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDay) {
                    var title = prompt('Event Title:');
                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                        $.ajax({
                            url: SITEURL + "/fullcalenderAjax",
                            data: {
                                title: title,
                                start: start,
                                end: end,
                                type: 'add',
                                user_id: {{ auth()->user()->id }}

                            },
                            type: "POST",
                            success: function(data) {
                                displayMessage("Event Created Successfully");
                                calendar.fullCalendar('renderEvent', {
                                    id: data.id,
                                    title: title,
                                    start: start,
                                    end: end,
                                    allDay: allDay
                                }, true);
                                calendar.fullCalendar('unselect');
                            }
                        });
                    }
                },
                eventDrop: function(event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                    $.ajax({
                        url: SITEURL + '/fullcalenderAjax',
                        data: {
                            title: event.title,
                            start: start,
                            end: end,
                            id: event.id,
                            type: 'update'
                        },
                        type: "POST",
                        success: function(response) {
                            displayMessage("Event Updated Successfully");
                        }
                    });
                },
                eventClick: function(event) {
                    var deleteMsg = confirm("Do you really want to delete?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                id: event.id,
                                type: 'delete'
                            },
                            success: function(response) {
                                calendar.fullCalendar('removeEvents', event.id);
                                displayMessage("Event Deleted Successfully");
                            }
                        });
                    }
                }
            });

            // Display a Toastr success message
            function displayMessage(message) {
                toastr.success(message, 'Event');
            }
        });

        // Function to update the upcoming schedule table
        function updateUpcomingSchedule(schedule) {
            var upcomingScheduleTable = document.querySelector('#upcoming-schedule-table');
            upcomingScheduleTable.innerHTML = '';

            schedule.forEach(function(event) {
                var row = upcomingScheduleTable.insertRow();
                var cell1 = row.insertCell(0);
                var cell2 = row.insertCell(1);
                var cell3 = row.insertCell(2);

                cell1.textContent = event.title;
                cell2.textContent = event.start;
                cell3.textContent = event.end;
            });
        }

        // Placeholder data for upcoming schedule
        var placeholderUpcomingSchedule = [{
                title: 'Upcoming Event 1',
                start: '2023-12-10',
                end: '2023-12-12'
            },
            {
                title: 'Upcoming Event 2',
                start: '2023-12-15',
                end: '2023-12-17'
            },
            // Add more placeholder events as needed
        ];

        // Update the upcoming schedule with placeholder data
        updateUpcomingSchedule(placeholderUpcomingSchedule);
    </script>
</x-app-layout>
