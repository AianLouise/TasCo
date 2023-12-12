<x-app-layout>
    <title>{{ isset($pageTitle) ? $pageTitle : 'Tasco' }}</title>

    <body>
        <section class="bg-blue-200">
        <div class="container xl:max-w-6xl mx-auto px-4">
            <div class="container mx-auto py-16 px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-8">
                    <div class="max-w-lg">
                        <span class="text-base font-semibold uppercase tracking-wide text-blue-600">
                            About Us
                        </span>
                        <h2 class="font-heading mb-4 font-bold tracking-tight text-gray-900 text-3xl sm:text-5xl">
                            Welcome to TasCo
                        </h2>
                        <p class="mb-5 text-base text-body-color">
                            TasCo: Your go-to platform for seamless connections between users, workers, and employers.
                            Discover convenience and reliability in local service management. </p>
                    </div>
                    <div class="mt-12 md:mt-0">
                        <img src="{{ asset('images/Logo3.png') }}" alt="About Us Image" class="w-full">
                    </div>
                </div>
            </div>
        </div>
        </section>

        <section>
            <div class="py-12 bg-white">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

                    <div class="lg:text-center">
                        <p
                            class="font-heading mt-2 text-3xl leading-8 font-semibold tracking-tight text-gray-900 sm:text-4xl">
                            Our Mission
                        </p>
                        <p class="mt-4 max-w-2xl text-lg text-gray-500 lg:mx-auto">
                            At TasCo, our mission is to redefine the way people connect in the professional world. We
                            aim to
                            bridge the gap between employers and workers, creating a space where meaningful
                            collaborations
                            and partnerships thrive. By leveraging cutting-edge technology, TasCo simplifies the hiring
                            process, making it smarter, faster, and more accessible for everyone.
                        </p>
                    </div>

                    <div class="mt-10">
                        <div class="lg:text-center">
                            <p
                                class="font-heading mt-2 mb-20 text-3xl leading-8 font-semibold tracking-tight text-gray-900 sm:text-4xl">
                                Key Features
                            </p>
                        </div>
                        <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-2 md:gap-x-8 md:gap-y-10">

                            <div class="relative">
                                <dt>
                                    <div
                                        class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-primary-500 text-white">
                                        <img src="https://www.svgrepo.com/show/533182/inbox-arrow-down.svg">
                                    </div>
                                    <p class="font-heading ml-16 text-lg leading-6 font-bold text-gray-700">Efficient
                                        Inquiry Management</p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    Efficient and organized inbox for managing customer inquiries.
                                </dd>
                            </div>
                            <div class="relative">
                                <dt>
                                    <div
                                        class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-primary-500 text-white">
                                        <img src="https://www.svgrepo.com/show/49380/touch-screen-phone.svg">
                                    </div>
                                    <p class="font-heading ml-16 text-lg leading-6 font-bold text-gray-700">
                                        User-Friendly
                                        Interface Experience
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500"> User-friendly interface for both
                                    customers
                                    and customer service representatives.
                                </dd>
                            </div>
                            <div class="relative">
                                <dt>
                                    <div
                                        class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-primary-500 text-white">
                                        <img
                                            src="https://www.svgrepo.com/show/438172/communication-bubble-chat-comments-conversation-message-icon.svg">

                                    </div>
                                    <p class="font-heading ml-16 text-lg leading-6 font-bold text-gray-700">Swift
                                        Customer
                                        Response System
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500"> Quick and easy reply system to address
                                    customer concerns promptly.
                                </dd>
                            </div>
                            <div class="relative">
                                <dt>
                                    <div
                                        class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-primary-500 text-white">
                                        <img src="https://www.svgrepo.com/show/460070/secure.svg">

                                    </div>
                                    <p class="font-heading ml-16 text-lg leading-6 font-bold text-gray-700">Secure and
                                        Reliable Communication Platform
                                    </p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500"> Guaranteed secure environment for
                                    seamless
                                    data exchange.
                                </dd>
                            </div>
                        </dl>
                    </div>
                    <div class="lg:text-center">
                        <p
                            class="font-heading mt-20 mb-10 text-3xl leading-8 font-semibold tracking-tight text-gray-900 sm:text-4xl">
                            Contact Us
                        </p>
                        <p class="text-gray-700 mb-6">
                            We value your feedback and are here to assist you. If you have any questions, suggestions,
                            or concerns, please feel free to contact our customer support team at
                            <a href="mailto:support@tasco.com" class="text-blue-500">support@tasco.com</a>.
                        </p>

                        <p class="text-gray-700">
                            Thank you for choosing TasCo for your customer service needs.
                        </p>
                    </div>
                </div>
            </div>
        </section>


        <section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20 ">
            <div class="container mx-auto">
                <div class="w-full px-4">
                    <div class="mx-auto mb-[60px] max-w-[510px] text-center">
                        <span class="text-base font-semibold uppercase tracking-wide text-blue-600">
                            The Team
                        </span>
                        <h2 class="font-heading mt-4 mb-4 font-bold tracking-tight text-gray-900 text-3xl sm:text-5xl">
                            Meet the TasCo Team
                        </h2>
                    </div>
                </div>

                <div class="-mx-4 flex flex-wrap justify-center">
                    <!-- Add styling to make the images smaller and extend on the right side -->
                    <div class="w-full px-4 md:w-1/2 xl:w-1/4">
                        <div class="mx-auto mb-10 w-full max-w-[300px]"> <!-- Adjust max-width as needed -->
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="{{ asset('images/Alfaro.jpg') }}" alt=""
                                    class="w-full h-auto ease-in-out shadow-xl">
                                <div class="absolute bottom-3 left-0 w-full text-center ">
                                    <div class="relative mx-5 overflow-hidden  rounded-lg bg-yellow-400 border border-black py-1 px-3">
                                        <h3 class="text-dark  text-base font-semibold">
                                            Aian Louise Alfaro
                                        </h3>
                                        <p class="text-body-color  text-xs">Developer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 md:w-1/2 xl:w-1/4">
                        <div class="mx-auto mb-10 w-full max-w-[300px]"> <!-- Adjust max-width as needed -->
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="{{ asset('images/Capili.jpg') }}" alt=""
                                    class="w-full h-auto ease-in-out shadow-xl">
                                <div class="absolute bottom-3 left-0 w-full text-center">
                                    <div class="relative mx-5 overflow-hidden  rounded-lg bg-yellow-400 border border-black py-1 px-3">
                                        <h3 class="text-dark text-base font-semibold">
                                            Dana Maxine Capili
                                        </h3>
                                        <p class="text-body-color text-xs">Developer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full px-4 md:w-1/2 xl:w-1/4">
                        <div class="mx-auto mb-10 w-full max-w-[300px]">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="{{ asset('images/Castro.jpg') }}" alt=""
                                    class="w-full h-auto ease-in-out shadow-xl">
                                <div class="absolute bottom-3 left-0 w-full text-center">
                                    <div class="relative mx-5 overflow-hidden  rounded-lg bg-yellow-400 border border-black py-1 px-3">
                                        <h3 class="text-dark text-base font-semibold">
                                            Shania Nicole Castro
                                        </h3>
                                        <p class="text-body-color text-xs">Documents</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 md:w-1/2 xl:w-1/4">
                        <div class="mx-auto mb-10 w-full max-w-[300px]"> <!-- Adjust max-width as needed -->
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="{{ asset('images/Bautista.jpg') }}" alt=""
                                    class="w-full h-auto ease-in-out shadow-xl">
                                <div class="absolute bottom-3 left-0 w-full text-center">
                                    <div class="relative mx-5 overflow-hidden  rounded-lg bg-yellow-400 border border-black py-1 px-3">
                                        <h3 class="text-dark text-base font-semibold">
                                            Jo Ann Bautista
                                        </h3>
                                        <p class="text-body-color text-xs">Researcher</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full px-4 md:w-1/2 xl:w-1/4">
                        <div class="mx-auto mb-10 w-full max-w-[300px]">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="{{ asset('images/Gonzales.jpg') }}" alt=""
                                    class="w-full h-auto ease-in-out shadow-xl">
                                <div class="absolute bottom-3 left-0 w-full text-center ">
                                    <div class="relative mx-5 overflow-hidden  rounded-lg bg-yellow-400 border border-black py-1 px-3">
                                        <h3 class="text-dark text-base font-semibold">
                                            Emmanuel Louise Gonnnzales
                                        </h3>
                                        <p class="text-body-color text-xs">Documents</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full px-4 md:w-1/2 xl:w-1/4">
                        <div class="mx-auto mb-10 w-full max-w-[300px]"> <!-- Adjust max-width as needed -->
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="{{ asset('images/Casupang.jpg') }}" alt=""
                                    class="w-full h-auto ease-in-out shadow-xl">
                                <div class="absolute bottom-3 left-0 w-full text-center">
                                    <div class="relative mx-5 overflow-hidden  rounded-lg bg-yellow-400 border border-black py-1 px-3">
                                        <h3 class="text-dark text-base font-semibold">
                                            Joshua Casupang
                                        </h3>
                                        <p class="text-body-color text-xs">Documents</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full px-4 md:w-1/2 xl:w-1/4">
                        <div class="mx-auto mb-10 w-full max-w-[300px]">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="{{ asset('images/Dizon.jpg') }}" alt="image"
                                    class="w-full h-auto ease-in-out shadow-xl">
                                <div class="absolute bottom-3 left-0 w-full text-center">
                                    <div class="relative mx-5 overflow-hidden  rounded-lg bg-yellow-400 border border-black py-1 px-3">
                                        <h3 class="text-dark text-base font-semibold">
                                            Joshua Neil Dizon
                                        </h3>
                                        <p class="text-body-color text-xs">Researcher</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full px-4 md:w-1/2 xl:w-1/4">
                        <div class="mx-auto mb-10 w-full max-w-[300px]">
                            <div class="relative overflow-hidden rounded-lg">
                                <img src="{{ asset('images/Maglalang.jpg') }}" alt=""
                                    class="w-full h-auto ease-in-out shadow-xl">
                                <div class="absolute bottom-3 left-0 w-full text-center">
                                    <div class="relative mx-5 overflow-hidden  rounded-lg bg-yellow-400 border border-black py-1 px-3">
                                        <h3 class="text-dark text-base font-semibold">
                                            MR Rey Maglalang
                                        </h3>
                                        <p class="text-body-color text-xs">Developer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <x-footer />
    </body>
</x-app-layout>
