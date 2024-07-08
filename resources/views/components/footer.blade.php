<footer class="relative z-10 bg-white dark:bg-dark pt-20 pb-10 lg:pt-[120px] lg:pb-20 footer">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-y-10 lg:grid-cols-4">
            <!-- Logo and About -->
            <div class="px-4 sm:col-span-2 lg:col-span-1">
                <a href="{{ url('/') }}" class="inline-block mb-6 max-w-[160px]">
                    <img class="rounded-full h-8 w-8" src="{{ url('storage/logo/logo.png') }}" alt="logo" />
                </a>
                <p class="text-base text-body-color dark:text-dark-6 mb-7">
                    Lorem ipsum dolor amet consectetur adipiscing elit do eiusmod tempor incididunt ut labore et dolore.
                </p>
                <div class="flex items-center space-x-3">
                    <a href="javascript:void(0)"
                        class="hover:text-primary text-dark-7 dark:text-white/40 dark:hover:text-primary">
                        <svg width="10" height="18" viewBox="0 0 10 18" class="fill-current">
                            <path
                                d="M9.00007 6.82105H7.50006H6.96434V6.27097V4.56571V4.01562H7.50006H8.62507C8.91971 4.01562 9.16078 3.79559 9.16078 3.46554V0.550085C9.16078 0.247538 8.9465 0 8.62507 0H6.66969C4.55361 0 3.08038 1.54024 3.08038 3.82309V6.21596V6.76605H2.54466H0.72322C0.348217 6.76605 0 7.06859 0 7.50866V9.48897C0 9.87402 0.294645 10.2316 0.72322 10.2316H2.49109H3.02681V10.7817V16.31C3.02681 16.6951 3.32145 17.0526 3.75003 17.0526H6.26791C6.42862 17.0526 6.56255 16.9701 6.66969 16.8601C6.77684 16.7501 6.8572 16.5576 6.8572 16.3925V10.8092V10.2591H7.4197H8.62507C8.97328 10.2591 9.24114 10.0391 9.29471 9.709V9.6815V9.65399L9.66972 7.7562C9.6965 7.56367 9.66972 7.34363 9.509 7.1236C9.45543 6.98608 9.21436 6.84856 9.00007 6.82105Z" />
                        </svg>
                    </a>
                    <!-- Add more social icons here -->
                </div>
            </div>

            <!-- Company Links -->
            <div class="px-4">
                <h4 class="text-lg font-semibold text-dark dark:text-white mb-4">Company</h4>
                <ul class="space-y-3">
                    <li><a href="javascript:void(0)"
                            class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6 dark:hover:text-primary">About
                            company</a></li>
                    <li><a href="javascript:void(0)"
                            class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6 dark:hover:text-primary">Company
                            services</a></li>
                    <li><a href="javascript:void(0)"
                            class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6 dark:hover:text-primary">Job
                            opportunities</a></li>
                    <li><a href="javascript:void(0)"
                            class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6 dark:hover:text-primary">Creative
                            people</a></li>
                    <li><a href="javascript:void(0)"
                            class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6 dark:hover:text-primary">Contact
                            us</a></li>
                </ul>
            </div>

            <!-- Customer Links -->
            <div class="px-4">
                <h4 class="text-lg font-semibold text-dark dark:text-white mb-4">Customer</h4>
                <ul class="space-y-3">
                    <li><a href="javascript:void(0)"
                            class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6 dark:hover:text-primary">Client
                            support</a></li>
                    <li><a href="javascript:void(0)"
                            class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6 dark:hover:text-primary">Latest
                            news</a></li>
                    <li><a href="javascript:void(0)"
                            class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6 dark:hover:text-primary">Company
                            story</a></li>
                    <li><a href="javascript:void(0)"
                            class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6 dark:hover:text-primary">Pricing
                            packages</a></li>
                    <li><a href="javascript:void(0)"
                            class="inline-block text-base leading-loose text-body-color hover:text-primary dark:text-dark-6 dark:hover:text-primary">Who
                            we are</a></li>
                </ul>
            </div>

            <!-- Newsletter Subscription -->
            <div class="px-4">
                <h4 class="text-lg font-semibold text-dark dark:text-white mb-4">Subscribe To Newsletter</h4>
                <p class="mb-4 text-base text-body-color dark:text-dark-6">
                    Enter your email address for receiving valuable newsletters.
                </p>
                <form class="relative w-full mb-4 overflow-hidden rounded">
                    <input type="email" placeholder="Your Email"
                        class="w-full h-12 px-4 text-sm bg-transparent border rounded outline-none border-stroke text-body-color dark:text-dark-6 dark:border-dark-3 focus:border-primary dark:focus:border-primary focus-visible:shadow-none" />
                    <button type="submit"
                        class="absolute top-0 right-0 flex items-center justify-center w-12 h-full text-white bg-primary hover:bg-opacity-90">
                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M17.5 3H2.5C1.4375 3 0.53125 3.875 0.53125 4.96875V15.0937C0.53125 16.1562 1.40625 17.0625 2.5 17.0625H17.5C18.5625 17.0625 19.4687 16.1875 19.4687 15.0937V4.9375C19.4687 3.875 18.5625 3 17.5 3ZM17.5 4.40625C17.5312 4.40625 17.5625 4.40625 17.5937 4.40625L10 9.28125L2.40625 4.40625C2.4375 4.40625 2.46875 4.40625 2.5 4.40625H17.5ZM17.5 15.5938H2.5C2.1875 15.5938 1.9375 15.3438 1.9375 15.0312V5.78125L9.25 10.4688C9.46875 10.625 9.71875 10.6875 9.96875 10.6875C10.2187 10.6875 10.4687 10.625 10.6875 10.4688L18 5.78125V15.0625C18.0625 15.375 17.8125 15.5938 17.5 15.5938Z"
                                fill="currentColor" />
                        </svg>
                    </button>
                </form>
                <p class="text-base text-body-color dark:text-dark-6">&copy; 2025 TailGrids</p>
            </div>
        </div>
    </div>

    
   
</footer>
