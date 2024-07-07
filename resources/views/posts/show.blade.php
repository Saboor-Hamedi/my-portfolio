<x-layout>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 bg-white dark:bg-gray-900 antialiased">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm text-gray-900 dark:text-white">
                            <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos">
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold text-gray-900 dark:text-white">
                                    Author: {{ ucfirst($post->user->name ?? 'Anonymous') }}
                                </a>
                                <p class="text-base text-gray-500 dark:text-gray-400"> {{ $post->title ?? 'N/A' }} </p>
                                <span
                                    class="block text-xs font-semibold leading-loose text-center text-black bg-primary rounded px-2 py-1 inline-block mb-4">
                                    {{ $post->created_at->diffForHumans() ?? 'N/A' }}
                                </span>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight text-gray-900 lg:mb-6 lg:text-4xl dark:text-white">
                        {{ $post->title ?? 'N/A' }}</h1>
                </header>
                <figure>
                    <div class="mb-4 overflow-hidden rounded-lg shadow-lg">
                        <img src="https://cdn.tailgrids.com/2.0/image/application/images/blogs/blog-01/image-01.jpg"
                            alt="image" class="w-full h-auto object-cover" />
                    </div>
                </figure>
                <p class="text-justify">{!! $post->wrapBodyText(500 ,true) !!}</p>
            </article>
        </div>
    </main>
    <!-- ====== Blog Section Start -->

    <section class="pb-10 lg:pb-1 bg-white dark:bg-dark">
        <div class="flex flex-wrap justify-center">
            <div class="w-full px-4">
                <div class="mx-auto mb-12 max-w-[800px] text-center lg:mb-20">
                    <span class="block mb-2 text-lg font-semibold text-primary">
                        Dive into a World of Knowledge and Inspiration
                    </span>
                    <h2
                        class="text-dark dark:text-white mb-3 text-lg leading-[1.2] font-bold sm:text-4xl md:text-[30px]">
                        Discover the Insights Behind Every Post

                    </h2>
                    <p class="text-base text-body-color">
                        Welcome to our blog! Each post is crafted with passion to bring you the latest insights and
                        trends. Our dedicated authors share their knowledge to keep you informed and inspired. Join our
                        community and elevate your understanding with our expertly written content.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-10 lg:pb-20 bg-white dark:bg-dark">

        <div class="container mx-auto px-4">
            <div class="flex flex-wrap -mx-4">
                @foreach ($otherPosts as $otherPost)
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <div class="w-full mb-10">
                            <div class="mb-8 overflow-hidden rounded">
                                <img src="https://cdn.tailgrids.com/2.0/image/application/images/blogs/blog-01/image-01.jpg"
                                    alt="image" class="w-full" />
                            </div>
                            <div>
                                <span
                                    class="inline-block mb-2 text-xs font-semibold leading-loose text-center text-black bg-primary rounded px-2">
                                    Author: {{ ucfirst($otherPost->user->name ?? 'Anonymous') }}
                                </span>
                                <span
                                    class="inline-block mb-2 text-xs font-semibold leading-loose text-center text-black bg-primary rounded px-2">
                                    {{ $otherPost->created_at->diffForHumans() ?? 'N/A' }}
                                </span>
                                <h3>
                                    <a href="{{ route('posts.show', $otherPost->slug) }}"
                                        class="block mb-4 text-xl font-semibold text-dark dark:text-black hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                        {{ $otherPost->title ?? 'N/A' }}
                                    </a>
                                </h3>
                                <p class="text-base text-body-color dark:text-dark-6">
                                    {{ Str::limit($otherPost->body, 50) ?? 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-wrapper">
                {{ $otherPosts->links('vendor.pagination.tailwind') }}
            </div>
        </div>
    </section>

</x-layout>
