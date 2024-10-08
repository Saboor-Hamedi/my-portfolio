<x-layout :title='$title'>
    {{-- flex-grow p-4 sm:ml-64 mt-16 sm:mt-16 dark__mode  --}}
    <main class="p-4 pb-16  mt-16 sm:mt-16 lg:pt-16 lg:pb-24 antialiased dark__mode">
        <div class="flex justify-between px-4 mx-auto max-w-screen-xl ">
            <article
                class="mx-auto w-full max-w-2xl format format-sm sm:format-base lg:format-lg format-blue dark:format-invert">
                <header class="mb-4 lg:mb-6 not-format">
                    <address class="flex items-center mb-6 not-italic">
                        <div class="inline-flex items-center mr-3 text-sm ">
                            @if (!$post->image)
                                <img src="{{ asset('storage/default/bg.jpg') }}" class="mr-4 w-16 h-16 rounded-full">
                            @else
                                <img src="{{ asset('storage/postImages/' . $post->image) }}"
                                    class="mr-4 w-16 h-16 rounded-full" alt="Not found image">
                            @endif

                            <div>
                                <a href="#" rel="author" class="text-xl font-bold ">
                                    {{ ucfirst($post->user->name ?? 'Anonymous') }}
                                </a>
                                <p>
                                    {{ $post->created_at->diffForHumans() ?? 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </address>
                </header>
                <figure>
                    <!-- Single Post Component -->
                    <div class=" mb-4 md:mb-6 lg:mb-8">
                        @if (!$post->image)
                            <img src="{{ asset('storage/default/bg.jpg') }}" alt="">
                        @else
                            <img src="{{ asset('storage/postImages/' . $post->image) }}" class="w-full"
                                alt="Post Image">
                        @endif

                    </div>
                </figure>
                <div class="inline-block p-2">
                    <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight  md:text-5xl lg:text-6xl ">
                        {!! Str::ucfirst($post->title) !!}
                    </h1>
                    {!! $post->body !!}
                </div>

                <div class="tags p-2">
                    @foreach ($post->tags as $tag)
                        <span
                            class="text-sm font-medium me-2 px-2.5 
                                                py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                            #{{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </article>

        </div>

        <!-- ====== Blog Section Start -->

        <section class="pb-10 lg:pb-1  dark__mode">
            <div class="flex flex-wrap justify-center">
                <div class="w-full px-4">
                    <div class="mx-auto mb-12 max-w-[800px] text-center lg:mb-20">
                        <h2 class="text-dark mb-3 text-lg leading-[1.2] font-bold sm:text-4xl md:text-[30px]">
                            Discover the Insights Behind Every Post
                        </h2>
                        <p class="text-base text-body-color">
                            Welcome to our blog! Each post is crafted with passion to bring you the latest insights and
                            trends. Our dedicated authors share their knowledge to keep you informed and inspired. Join
                            our
                            community and elevate your understanding with our expertly written content.
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <section class="flex flex-col px-10 bg-gray-100 dark__mode">

            <div class="flex flex-wrap justify-center gap-5">
                @foreach ($otherPosts as $otherPost)
                    <div class="w-full shadow-md rounded-md flex flex-col">
                        <div class="w-full mb-10">
                            <div class="mb-2 h-48 overflow-hidden">
                                @if (!$otherPost->image)
                                    <img src="{{ asset('storage/default/bg.jpg') }}" alt=""
                                        class="w-full h-full object-cover">
                                @else
                                    <img src="{{ asset('storage/postImages/' . $otherPost->image) }}"
                                        class="w-full h-full object-cover" alt="Post Image">
                                @endif
                            </div>
                            <div class="flex flex-row ml-2 gap-3 justify-start sm:flex-col md:flex-row">
                                <span class="block mb-2 text-xs font-semibold leading-loose text-center">
                                    Author: {{ ucfirst($otherPost->user->name ?? 'Anonymous') }}
                                </span>
                                <span class="block mb-2 text-xs font-semibold leading-loose text-center">
                                    {{ $otherPost->created_at->diffForHumans() ?? 'N/A' }}
                                </span>
                            </div>
                            <div class="flex-grow flex flex-col justify-between p-4">
                                <div>
                                    <h3>
                                        <a href="{{ route('posts.show', [$otherPost->slug]) }}"
                                            class="block mb-4 text-xl font-semibold text-dark dark:text-black hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                            {{ $otherPost->title ?? 'N/A' }}
                                        </a>
                                    </h3>
                                    <p class="text-base text-body-color dark:text-dark-6">
                                        {!! Str::limit($otherPost->body, 50) ?? 'N/A' !!}
                                    </p>
                                </div>
                            </div>
                            <div class="tags p-2">
                                @foreach ($post->tags as $tag)
                                    <span
                                        class="text-sm font-medium me-2 px-2.5 
                                                py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                        #{{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="pagination-wrapper">
                {{-- {{ $otherPosts->links('vendor.pagination.tailwind') }} --}}
                {{ $otherPosts->links() }}
            </div>
        </section>
    </main>
</x-layout>
