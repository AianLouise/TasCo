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
            <div class="mx-auto max-w-7xl px-4 py-32 sm:px-6 lg:px-8 ">
                <div class="mb-4">
                    <div class="mb-6 max-w-3xl text-center sm:text-center md:mx-auto md:mb-12">
                        <p class="text-base font-semibold uppercase tracking-wide text-blue-500">
                            Services
                        </p>
                        <h2
                            class="font-heading mb-2 font-bold tracking-tight text-gray-900 text-3xl sm:text-5xl">
                            We Offer
                        </h2>
                        <div class="h-full">
                        <img src="{{ URL('images/Services.png') }}" width="700" class="mx-auto">
                            <p class="mb-12 mt-8 mx-auto max-w-lg text-center text-xl leading-relaxed text-gray-800">
                            Welcome to Tasco! Our dedicated customer service team is here to assist you with any inquiries or support you may need. We're committed to ensuring your experience with Tasco is seamless and satisfying.
                            </p> 
                        </div>
                    </div>
                </div>
            </div>

            <div class="py-4 bg-white">
    <div class="max-w-screen-md mx-auto px-4 sm:px-6 lg:px-8 flex flex-col justify-between">

        <div class="text-center">
            <p class="mt-4 text-sm leading-7 text-gray-500 font-regular">
                Services
            </p>
            <h3 class="text-3xl sm:text-4xl leading-normal font-extrabold tracking-tight text-gray-900">
                <span class="text-blue-500">TasCo</span> Services
            </h3>

        </div>

        <div class="mt-20">
            <ul class="">

                <li class="text-left mb-10">
                    <div class="flex flex-row items-start mb-5">
                        <div
                            class="hidden sm:flex items-center justify-center p-3 mr-3 rounded-full bg-blue-100 text-white border-4 border-white text-xl font-semibold">
                            <img width="70" height="70" src="https://img.icons8.com/3d-fluency/94/work.png" alt="work"/>
                        </div>
                        <div class="bg-blue-100 p-8 px-10 w-full flex items-center">
                            <h4 class="text-2xl leading-6 font-bold text-gray-900">Approved Services</h4>
                        </div>
                    </div>

                    <div class="flex flex-row items-start">
                        <div class="bg-yellow-100 p-6 px-10 w-full flex items-center">
                            <p class="text-gray-700 text-md">In our community, services are approved not only by the administration but also by the community!
                            </p>
                        </div>
                        <div
                            class="hidden sm:flex items-center justify-center p-3 ml-3 rounded-full bg-yellow-100 text-white border-4 border-white text-xl font-semibold">
                     
                            <img width="70" height="70" src="https://img.icons8.com/3d-fluency/94/trust.png" alt="trust"/>
                        </div>
                    </div>

                </li>
                
                <li class="text-left mb-10">
                    <div class="flex flex-row items-start mb-5">
                        <div
                            class="hidden sm:flex items-center justify-center p-3 mr-3 rounded-full bg-blue-100 text-white border-4 border-white text-xl font-semibold">
                            <img width="70" height="70" src="https://img.icons8.com/3d-fluency/94/contract.png" alt="contract"/>
                        </div>
                        <div class="bg-blue-100 p-8 px-10 w-full flex items-center">
                            <h4 class="text-2xl leading-6 font-bold text-gray-900">Verified Documents</h4>
                        </div>
                    </div>

                    <div class="flex flex-row items-start">
                        <div class="bg-yellow-100 p-6 px-10 w-full flex items-center">
                            <p class="text-gray-700 text-md">In our community, documents are verified before any transactions happen to keep a safe and secure local area!
                            </p>
                        </div>
                        <div
                            class="hidden sm:flex items-center justify-center p-3 ml-3 rounded-full bg-yellow-100 text-white border-4 border-white text-xl font-semibold">
                     
                            <img width="70" height="70" src="https://img.icons8.com/3d-fluency/94/trust.png" alt="trust"/>
                        </div>
                    </div>

                </li>
                <li class="text-left mb-10">
                    <div class="flex flex-row items-start mb-5">
                        <div
                            class="hidden sm:flex items-center justify-center p-3 mr-3 rounded-full bg-blue-100 text-white border-4 border-white text-xl font-semibold">
                            <img width="70" height="70" src="https://img.icons8.com/3d-fluency/94/popular-topic.png" alt="popular-topic"/>
                        </div>
                        <div class="bg-blue-100 p-8 px-10 w-full flex items-center">
                            <h4 class="text-2xl leading-6 font-bold text-gray-900">Feedbacks</h4>
                        </div>
                    </div>

                    <div class="flex flex-row items-start">
                        <div class="bg-yellow-100 p-6 px-10 w-full flex items-center">
                            <p class="text-gray-700 text-lg">In our community, your feedbacks matters to us and we'll always hear you out if you have concerns or request!
                            </p>
                        </div>
                        <div
                            class="hidden sm:flex items-center justify-center p-3 ml-3 rounded-full bg-yellow-100 text-white border-4 border-white text-xl font-semibold">
                     
                            <img width="70" height="70" src="https://img.icons8.com/3d-fluency/94/trust.png" alt="trust"/>
                        </div>
                    </div>

                </li>
                <li class="text-left mb-10">
                    <div class="flex flex-row items-start mb-5">
                        <div
                            class="hidden sm:flex items-center justify-center p-3 mr-3 rounded-full bg-blue-100 text-white border-4 border-white text-xl font-semibold">
                            <img width="70" height="70" src="https://img.icons8.com/3d-fluency/94/under-computer.png" alt="under-computer"/>
                        </div>
                        <div class="bg-blue-100 p-8 px-10 w-full flex items-center">
                            <h4 class="text-2xl leading-6 font-bold text-gray-900">Monitoring</h4>
                        </div>
                    </div>

                    <div class="flex flex-row items-start">
                        <div class="bg-yellow-100 p-6 px-10 w-full flex items-center">
                            <p class="text-gray-700 text-lg">Not only do we monitor your documents, feedbacks, services,
                                we also monitor on how well the community interact with each other
                            </p>
                        </div>
                        <div
                            class="hidden sm:flex items-center justify-center p-3 ml-3 rounded-full bg-yellow-100 text-white border-4 border-white text-xl font-semibold">
                     
                            <img width="70" height="70" src="https://img.icons8.com/3d-fluency/94/trust.png" alt="trust"/>
                        </div>
                    </div>

                </li>
                <li class="text-left mb-10">
                    <div class="flex flex-row items-start mb-5">
                        <div
                            class="hidden sm:flex items-center justify-center p-3 mr-3 rounded-full bg-blue-100 text-white border-4 border-white text-xl font-semibold">
                            <img width="70" height="70" src="https://img.icons8.com/3d-fluency/94/user-shield.png" alt="user-shield"/>
                        </div>
                        <div class="bg-blue-100 p-8 px-10 w-full flex items-center">
                            <h4 class="text-2xl leading-6 font-bold text-gray-900">Secure</h4>
                        </div>
                    </div>

                    <div class="flex flex-row items-start">
                        <div class="bg-yellow-100 p-3 px-10 w-full flex items-center">
                            <p class="text-gray-700 text-lg">We secure the safety of every individual that will be working
                                or employing each other. We prioritize security overall along with monitoring.
                            </p>
                        </div>
                        <div
                            class="hidden sm:flex items-center justify-center p-3 ml-3 rounded-full bg-yellow-100 text-white border-4 border-white text-xl font-semibold">
                     
                            <img width="70" height="70" src="https://img.icons8.com/3d-fluency/94/trust.png" alt="trust"/>
                        </div>
                    </div>

                </li>
                <li class="text-left mb-10">
                    <div class="flex flex-row items-start mb-5">
                        <div
                            class="hidden sm:flex items-center justify-center p-3 mr-3 rounded-full bg-blue-100 text-white border-4 border-white text-xl font-semibold">
                            <img width="70" height="70" src="https://img.icons8.com/3d-fluency/94/positive-dynamic.png" alt="positive-dynamic"/>
                                  
                        </div>
                        <div class="bg-blue-100 p-8 px-10 w-full flex items-center">
                            <h4 class="text-2xl leading-6 font-bold text-gray-900">Growth</h4>
                        </div>
                    </div>

                    <div class="flex flex-row items-start">
                        <div class="bg-yellow-100 p-2 px-10 w-full flex items-center">
                            <p class="text-gray-700 text-lg">In our community, every individual matters, we secure, hear,
                                and talk to one another in order to have an efficient growth of the community!
                            </p>
                        </div>
                        <div
                            class="hidden sm:flex items-center justify-center p-3 ml-3 rounded-full bg-yellow-100 text-white border-4 border-white text-xl font-semibold">
                     
                            <img width="70" height="70" src="https://img.icons8.com/3d-fluency/94/trust.png" alt="trust"/>
                        </div>
                    </div>

                </li>
            </ul>
        </div>

    </div>
</div>
        </section>
</x-app-layout>