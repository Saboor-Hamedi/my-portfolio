<x-layout>
        <x-hero></x-hero>

    <!-- ====== Blog Section Start -->
    <section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20 bg-white dark:bg-dark">
        <div class="container mx-auto">
            <div class="flex flex-wrap justify-center -mx-4">
                <div class="w-full px-4">
                    <div class="mx-auto mb-[60px] max-w-[510px] text-center lg:mb-20">
                        <span class="block mb-2 text-lg font-semibold text-primary">
                            Our Blogs
                        </span>
                        <h2 class="mb-4 text-3xl font-bold text-dark sm:text-4xl md:text-[40px] dark:text-white">
                            Our Recent News
                        </h2>
                        <p class="text-base text-body-color dark:text-dark-6">
                            There are many variations of passages of Lorem Ipsum available
                            but the majority have suffered alteration in some form.
                        </p>
                    </div>
                </div>
            </div>
            {{-- blog posts --}}

            <div class="flex flex-wrap -mx-4">
                @foreach ($posts as $post)
                    <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                        <div class="w-full mb-10">
                            <div class="mb-8 overflow-hidden rounded">
                                <img src="https://cdn.tailgrids.com/2.0/image/application/images/blogs/blog-01/image-01.jpg"
                                    alt="image" class="w-full" />
                            </div>
                            <div>
                                <span
                                    class="flex  text-xs font-semibold leading-loose text-center text-black rounded bg-primary">
                                    Author: {{ ucfirst($post->user->name ?? 'Anonymous') }}
                                </span>
                                <span
                                    class="inline-block text-xs font-semibold leading-loose text-center text-black rounded bg-primary">
                                    {{ $post->created_at->diffForHumans() ?? 'N/A' }}
                                </span>
                                <h3>
                                    <a href="{{ route('posts.show', $post->slug) }}"
                                        class="inline-block mb-4 text-xl font-semibold text-dark dark:text-white hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                        {{ $post->title ?? 'N/A' }}
                                    </a>
                                </h3>
                                <p class="text-base text-body-color dark:text-dark-6">
                                    {{ Str::limit($post->body, 50) ?? 'N/A' }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- pagination --}}
            <div class="pagination-wrapper">
                {{ $posts->links('vendor.pagination.tailwind') }}
            </div>

            {{-- end blog post --}}
        </div>
    </section>
    <!-- ====== Blog Section End -->
</x-layout>
