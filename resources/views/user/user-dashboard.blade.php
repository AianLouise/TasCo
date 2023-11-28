<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>


    <div class="flex flex-col p-4 md:flex-row">
        <!-- Left Column (Calendar) -->
        <div class="flex-1 pr-4 mb-4 md:mb-0">
            <div id='full-calendar' class="bg-white p-2 shadow-md rounded-md"></div>
        </div>

        <!-- Right Column (Upcoming Schedule) -->
        <div class="flex-1 bg-gray-100 p-4 rounded-md">
            <h2 class="text-lg font-semibold mb-4">Upcoming Schedule</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-md">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Event</th>
                            <th class="py-2 px-4 border-b">Start Date</th>
                            <th class="py-2 px-4 border-b">End Date</th>
                        </tr>
                    </thead>
                    <tbody id="upcoming-schedule-table">
                        <!-- Placeholder for upcoming events -->
                        <tr>
                            <td class="py-2 px-4 border-b">Upcoming Event 1</td>
                            <td class="py-2 px-4 border-b">2023-12-10</td>
                            <td class="py-2 px-4 border-b">2023-12-12</td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Upcoming Event 2</td>
                            <td class="py-2 px-4 border-b">2023-12-15</td>
                            <td class="py-2 px-4 border-b">2023-12-17</td>
                        </tr>
                        <!-- Add more placeholder events as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div>
        <!-- Center Column (Hiring Application) -->
        <div class="flex-1 bg-gray-100 p-4 rounded-md md:mx-4">
            <h2 class="text-lg font-semibold mb-4">Hiring Applications</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-md">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Subject</th>
                            <th class="py-2 px-4 border-b">Description</th>
                            <th class="py-2 px-4 border-b">Date</th>
                            <th class="py-2 px-4 border-b">Time</th>
                            <th class="py-2 px-4 border-b">Worker ID</th>
                            <th class="py-2 px-4 border-b">Status</th>
                            <th class="py-2 px-4 border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody id="hiring-application-table">
                        <!-- Placeholder for hiring applications -->
                        <tr>
                            <td class="py-2 px-4 border-b">Job Title</td>
                            <td class="py-2 px-4 border-b">Description of the job</td>
                            <td class="py-2 px-4 border-b">2023-12-10</td>
                            <td class="py-2 px-4 border-b">10:00 AM</td>
                            <td class="py-2 px-4 border-b">W12345</td>
                            <td class="py-2 px-4 border-b">Pending</td>
                            <td class="py-2 px-4 border-b">
                                <button class="text-blue-500">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Job Title 2</td>
                            <td class="py-2 px-4 border-b">Another job description</td>
                            <td class="py-2 px-4 border-b">2023-12-15</td>
                            <td class="py-2 px-4 border-b">02:30 PM</td>
                            <td class="py-2 px-4 border-b">W67890</td>
                            <td class="py-2 px-4 border-b">Approved</td>
                            <td class="py-2 px-4 border-b">
                                <button class="text-blue-500">View</button>
                            </td>
                        </tr>
                        <!-- Add more placeholder hiring applications as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div>
        <!-- Center Column (Hiring Application) -->
        <div class="flex-1 bg-gray-100 p-4 rounded-md md:mx-4">
            <h2 class="text-lg font-semibold mb-4">Completed</h2>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300 shadow-md rounded-md">
                    <thead>
                        <tr>
                            <th class="py-2 px-4 border-b">Subject</th>
                            <th class="py-2 px-4 border-b">Description</th>
                            <th class="py-2 px-4 border-b">Date</th>
                            <th class="py-2 px-4 border-b">Time</th>
                            <th class="py-2 px-4 border-b">Worker ID</th>
                            <th class="py-2 px-4 border-b">Status</th>
                            <th class="py-2 px-4 border-b">Action</th>
                        </tr>
                    </thead>
                    <tbody id="hiring-application-table">
                        <!-- Placeholder for hiring applications -->
                        <tr>
                            <td class="py-2 px-4 border-b">Job Title</td>
                            <td class="py-2 px-4 border-b">Description of the job</td>
                            <td class="py-2 px-4 border-b">2023-12-10</td>
                            <td class="py-2 px-4 border-b">10:00 AM</td>
                            <td class="py-2 px-4 border-b">W12345</td>
                            <td class="py-2 px-4 border-b">Pending</td>
                            <td class="py-2 px-4 border-b">
                                <button class="text-blue-500">View</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-2 px-4 border-b">Job Title 2</td>
                            <td class="py-2 px-4 border-b">Another job description</td>
                            <td class="py-2 px-4 border-b">2023-12-15</td>
                            <td class="py-2 px-4 border-b">02:30 PM</td>
                            <td class="py-2 px-4 border-b">W67890</td>
                            <td class="py-2 px-4 border-b">Approved</td>
                            <td class="py-2 px-4 border-b">
                                <button class="text-blue-500">View</button>
                            </td>
                        </tr>
                        <!-- Add more placeholder hiring applications as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Add this line to your existing code -->
    <script src='{{ asset('node_modules/@fullcalendar/core/main.js') }}'></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var SITEURL = "{{ url('/') }}";

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

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

            function displayMessage(message) {
                toastr.success(message, 'Event');
            }
        });

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

        updateUpcomingSchedule(placeholderUpcomingSchedule);
    </script>
</x-app-layout>
