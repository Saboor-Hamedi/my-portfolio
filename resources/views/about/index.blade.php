<x-layout :title='$title'>
    <main class="mt-10">
        <div class="dark:bg-dark dark__mode p-8">
            <div
                class="container mx-auto grid h-full gap-10 min-h-[60vh] w-full grid-cols-1 items-center lg:grid-cols-2">
                <div class="row-start-2 lg:row-auto">
                    <h1
                        class="block antialiased tracking-normal font-sans font-semibold text-blue-gray-900 mb-4 lg:text-5xl !leading-tight text-3xl">
                        Welcome to my Web <br> Development Portofolio!</h1>
                    <p
                        class="block antialiased font-sans text-xl font-normal leading-relaxed text-inherit mb-4  md:pr-16 xl:pr-28">
                        I'm Abdul Saboor, a passionate web developer based in Indonesia. Here, you'll get a glimpse of
                        my
                        journey in the world of web development, where creativity meets functionality.</p>
                    <div class="grid">
                        <p class="block antialiased font-sans text-sm leading-normal mb-2  font-medium">
                            Your email
                            </p>
                        <div class="mb-2 flex w-full flex-col gap-4 md:w-10/12 md:flex-row">
                            <div class="relative w-full min-w-[200px] h-11">
                                <input
                                    class="peer w-full h-full bg-transparent font-sans font-normal 
                                    outline outline-0 focus:outline-0 disabled:bg-blue-gray-50 disabled:border-0 
                                    transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 
                                    placeholder-shown:border-t-blue-gray-200 
                                    border focus:border-2 border-t-transparent focus:border-t-transparent 
                                    text-sm px-3 py-3 rounded-md border-blue-gray-200 
                                    focus:border-gray-900"
                                    placeholder=" "
                                    >
                                <label
                                    class="flex w-full h-full select-none pointer-events-none absolute left-0 font-normal !overflow-visible truncate peer-placeholder-shown:text-blue-gray-500 leading-tight peer-focus:leading-tight peer-disabled:text-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 transition-all -top-1.5 peer-placeholder-shown:text-sm text-[11px] peer-focus:text-[11px] before:content[' '] before:block before:box-border before:w-2.5 before:h-1.5 before:mt-[6.5px] before:mr-1 peer-placeholder-shown:before:border-transparent before:rounded-tl-md before:border-t peer-focus:before:border-t-2 before:border-l peer-focus:before:border-l-2 before:pointer-events-none before:transition-all peer-disabled:before:border-transparent after:content[' '] after:block after:flex-grow after:box-border after:w-2.5 after:h-1.5 after:mt-[6.5px] after:ml-1 peer-placeholder-shown:after:border-transparent after:rounded-tr-md after:border-t peer-focus:after:border-t-2 after:border-r peer-focus:after:border-r-2 after:pointer-events-none after:transition-all peer-disabled:after:border-transparent peer-placeholder-shown:leading-[4.1] text-gray-500 peer-focus:text-gray-900 before:border-blue-gray-200 peer-focus:before:!border-gray-900 after:border-blue-gray-200 peer-focus:after:!border-gray-900">Enter
                                    your email
                                </label>
                            </div>
                            <button
                                class="align-middle select-none font-sans font-bold text-center uppercase transition-all disabled:opacity-50 disabled:shadow-none disabled:pointer-events-none text-xs py-3 rounded-lg bg-gray-900 text-white shadow-md shadow-gray-900/10 hover:shadow-lg hover:shadow-gray-900/20 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none w-full px-4 md:w-[12rem]"
                                type="button">
                                require offer
                            </button>
                        </div>
                    </div>
                    <p class="block antialiased font-sans text-sm leading-normal text-inherit font-normal ">
                        Read my <a href="#" class="font-medium underline transition-colors">Terms and
                            Conditions</a></p>
                </div>
                <img alt="team work" loading="lazy" width="1024" height="1024" decoding="async" data-nimg="1"
                    class="h-[36rem] w-full rounded-xl object-cover" src="{{ asset('storage/about/image1.JPG') }}"
                    style="color: transparent;">
            </div>
        </div>
    </main>

<x-footer></x-footer>
</x-layout>
