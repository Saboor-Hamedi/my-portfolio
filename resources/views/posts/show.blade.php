<x-layout :title='$title'>
    <main class="pt-8 pb-16 lg:pt-16 lg:pb-24 antialiased dark__mode">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm ">
                            <img src="{{$post->image_url}}"  class="mr-4 w-16 h-16 rounded-full" alt="Not found image">
                            {{-- <img class="mr-4 w-16 h-16 rounded-full"
                                src="https://flowbite.com/docs/images/people/profile-picture-2.jpg" alt="Jese Leos"> --}}
                            <div>
                                <a href="#" rel="author" class="text-xl font-bold  ">
                                    Author: {{ ucfirst($post->user->name ?? 'Anonymous') }}
                                </a>
                                <p class="text-base"> {{ $post->title ?? 'N/A' }} </p>
                                <span
                                    class="block text-xs font-semibold leading-loose text-center rounded px-2 py-1 inline-block mb-4">
                                    {{ $post->created_at->diffForHumans() ?? 'N/A' }}
                                </span>
                            </div>
                        </div>
                    </address>
                    <h1
                        class="mb-4 text-3xl font-extrabold leading-tight  lg:mb-6 lg:text-4xl ">
                        {{ $post->title ?? 'N/A' }}</h1>
                </header>
                <figure>
                    <div class="mb-4 overflow-hidden rounded-lg shadow-lg">
                        {{-- <img src="https://cdn.tailgrids.com/2.0/image/application/images/blogs/blog-01/image-01.jpg"
                            alt="image" class="w-full h-auto object-cover" /> --}}
                            <img src="{{$post->image_url}}"  class="w-full h-80 object-cover" alt="Not found image">
                    </div>
                </figure>
                <p class="text-justify">{!! $post->wrapBodyText(500 ,true) !!}</p>
            </article>
        </div>
    </main>
    <!-- ====== Blog Section Start -->

    <section class="pb-10 lg:pb-1  dark__mode">
        <div class="flex flex-wrap justify-center">
            <div class="w-full px-4">
                <div class="mx-auto mb-12 max-w-[800px] text-center lg:mb-20">
                    <span class="block mb-2 text-lg font-semibold text-primary">
                        Dive into a World of Knowledge and Inspiration
                    </span>
                    <h2
                        class="text-dark  mb-3 text-lg leading-[1.2] font-bold sm:text-4xl md:text-[30px]">
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

    <section class="pb-10 lg:pb-20 dark__mode">

        <div class="container mx-auto px-4">
            <div class="flex flex-wrap -mx-4">
                @foreach ($otherPosts as $otherPost)
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <div class="w-full mb-10">
                            <div class="mb-8 overflow-hidden rounded">
                                {{-- <img src="https://cdn.tailgrids.com/2.0/image/application/images/blogs/blog-01/image-01.jpg"
                                    alt="image" class="w-full" /> --}}
                                    <img src="{{$otherPost->image_url}}"  class="w-full" alt="Not found image">
                            </div>
                            <div>
                                <span
                                    class="block mb-2 text-xs font-semibold leading-loose text-center">
                                    Author: {{ ucfirst($otherPost->user->name ?? 'Anonymous') }}
                                </span>
                                <span
                                    class="block mb-2 text-xs font-semibold leading-loose text-center">
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
