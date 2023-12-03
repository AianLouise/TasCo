<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>

    <main class="bg-blue-50">
        <div class="grid grid-cols-2 p-4">
            <!-- Left Column (Calendar) -->
            <div class="flex-1 mb-4 md:mb-0 p-10 pt-4">
                <div id='full-calendar' class="bg-white p-4 shadow-md rounded-md"></div>
            </div>

            <!-- Right Column (Upcoming Schedule) -->
            <div class="flex-1 bg-white p-6 rounded-md divide-y mb-10 mt-4 mr-10">
                <div class="flex justify-between mb-3 items-start">
                    <h2 class="font-medium2 mb-4 text-start">Upcoming Schedule</h2>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full bg-white shadow-md rounded-md text-start">
                        <thead>
                            <tr class="border-b">
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Event</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Start Date</th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    End Date</th>
                            </tr>
                        </thead>
                        <tbody {{-- id="upcoming-schedule-table" --}}>
                            <!-- Placeholder for upcoming events -->
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">Upcoming
                                    Event 1</td>
                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">2023-12-10
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">2023-12-12
                                </td>
                            </tr>
                            <tr class="border-b">
                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">Upcoming
                                    Event 2</td>
                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">2023-12-15
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">2023-12-17
                                </td>
                            </tr>
                            <!-- Add more placeholder events as needed -->
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div>
            <!-- Center Column (Hiring Application) -->
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
                                    Worker</th>
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
                                        {{ $hiringForm->worker->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                        {{ $hiringForm->startDate }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                        {{ $hiringForm->endDate }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                        {{ $hiringForm->status }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800 text-center">
                                        <a href="{{ route('admin.hiringApplicationView', ['id' => $hiringForm->id]) }}"
                                            class="text-blue-500">View</a>
                                        <span>/</span>
                                        <a href="{{ route('admin.hiringApplicationView', ['id' => $hiringForm->id]) }}"
                                            class="text-red-500">Cancel</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div>
            <!-- (Completed Hiring Application) -->
            <div class="flex-1 bg-white p-4 rounded-md md:mx-4 mt-4">
                <div>
                    <h2 class="font-medium2 mb-4 text-start">Completed</h2>
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
                                    Worker</th>
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
                                    class="border-b px-6 py-3 text-left text-xs font-medium2 text-gray-800 uppercase tracking-wider">
                                    Action</th>
                            </tr>
                        </thead>
                        <tbody id="hiring-application-table">
                            @foreach ($hiringForms as $hiringForm)
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
                                        {{ $hiringForm->worker->name ?? 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                        {{ $hiringForm->startDate }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                        {{ $hiringForm->endDate }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                        {{ $hiringForm->status }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap font-medium2 text-sm text-gray-800">
                                        <a href="{{ route('admin.hiringApplicationView', ['id' => $hiringForm->id]) }}"
                                            class="text-blue-500">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


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
                                type: 'add'
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
