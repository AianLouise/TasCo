<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
    </head>
    <body class="font-sans">

        <section class="min-h-full bg-blue-100">
            
            <div class="mx-auto max-w-7xl px-4 py-20 sm:px-6 lg:px-8 ">
                <div class="mb-4">
                    <div class="mb-6 max-w-3xl text-center sm:text-center md:mx-auto md:mb-12">
                        <p class="text-base font-semibold uppercase tracking-wide text-blue-500">
                            Calendar
                        </p>
                        <h2
                            class="font-heading mt-4 font-bold tracking-tight text-3xl sm:text-5xl">
                            Schedule Feature
                        </h2>
                        <div class="h-full">
                        <img src="{{ URL('images/calendar.png') }}" width="500" class="mx-auto">
                            <p class="mb-12 mt-8 mx-auto max-w-lg text-center text-xl leading-relaxed text-gray-800">
                            Experience a new era of streamlined operations with TasCo's Calendar Feature. Revolutionize the way you manage your local services – from tracking upcoming tasks and hires to celebrating completed projects.
                            </p> 
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="min-h-full md:pt-16 md:pb-0 bg-gray-100">
            <div class="container xl:max-w-6xl mx-auto px-4">
                <div class="p-4 lg:p-8">
                    <div class="container mx-auto space-y-12">
                        <div class="flex flex-col overflow-hidden rounded-md shadow-lg lg:flex-row">
                            <img src="{{ URL('images/upcoming.jpg') }}" alt="" class="h-80 aspect-video">
                            <div class="flex flex-col justify-center flex-1 p-6">
                                <h3 class="text-3xl font-bold">Upcoming Work Schedule</h3>
                                <p class="my-6">Stay organized and ahead of the game with the Upcoming Work Schedule feature. Easily view and manage scheduled tasks, appointments, and service assignments, ensuring you are well-prepared for upcoming responsibilities.</p>
                            </div>
                        </div>

                <div class="flex flex-col overflow-hidden rounded-md shadow-lg lg:flex-row-reverse">
                    <img src="{{ URL('images/completed-work-sched.jpg') }}" alt="" class="h-80 aspect-video">
                    <div class="flex flex-col justify-center flex-1 p-6">
                        <h3 class="text-3xl font-bold">Completed Work Schedule</h3>
                        <p class="my-6">Reflect on your achievements and completed tasks with the Completed Work Schedule. This feature provides a historical overview of your accomplishments, offering insights into your productivity and progress over time.</p>
                    </div>
                </div>
                <div class="flex flex-col overflow-hidden rounded-md shadow-lg lg:flex-row">
                    <img src="{{ URL('images/completed-work.jpg') }}" alt="" class="h-80 aspect-video">
                    <div class="flex flex-col justify-center flex-1 p-6">
                        <h3 class="text-3xl font-bold">Completed Work</h3>
                        <p class="my-6">Reflect on your achievements and completed tasks with the Completed Work. This feature provides a historical overview of your accomplishments, offering insights into your productivity and progress over time.</p>
                    </div>
                </div>
            </div>
        </div>
<div class="p-4 lg:p-8">
	<div class="container mx-auto space-y-12">
		
		<div class="flex flex-col overflow-hidden rounded-md shadow-lg lg:flex-row-reverse">
			<img src="{{ URL('images/hires.jpg') }}" alt="" class="h-80 aspect-video">
			<div class="flex flex-col justify-center flex-1 p-6">
				<h3 class="text-3xl font-bold">Current Hires</h3>
				<p class="my-6">Streamline your hiring process by managing applications effortlessly. The Hiring Applications feature allows you to review, track, and evaluate prospective candidates efficiently, ensuring you make informed decisions for building a robust team.
</p>
			</div>
		</div>
		<div class="flex flex-col overflow-hidden rounded-md shadow-lg lg:flex-row">
			<img src="{{ URL('images/hiring-applications.jpg') }}" alt="" class="h-80 aspect-video">
			<div class="flex flex-col justify-center flex-1 p-6">
				<h3 class="text-3xl font-bold">Hiring Applications</h3>
				<p class="my-6">Streamline your hiring process by managing applications effortlessly. The Hiring Applications feature allows you to review, track, and evaluate prospective candidates efficiently, ensuring you make informed decisions for building a robust team.
</p>
			</div>
		</div>
        <div class="flex flex-col overflow-hidden rounded-md shadow-lg lg:flex-row-reverse">
			<img src="{{ URL('images/rejected.png') }}" alt="" class="h-80 aspect-video">
			<div class="flex flex-col justify-center flex-1 p-6">
				<h3 class="text-3xl font-bold">Rejected Hiring Applications</h3>
				<p class="my-6">Maintain transparency and accountability by tracking rejected hiring applications. The Rejected Hiring Applications feature helps you keep a record of past decisions, facilitating future hiring processes and ensuring fair and consistent evaluations.
</p>
			</div>
		</div>
	</div>
</div>
            </div>
        </section>
</x-app-layout>