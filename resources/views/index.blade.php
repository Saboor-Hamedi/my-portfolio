<x-layout :title='$title'>
    <x-hero></x-hero>
    <section class="pt-10 pb-10 lg:pt-20 lg:pb-20  dark:bg-dark dark__mode">
        <div class="container mx-auto px-4">
            <div class="mx-auto mb-10 lg:mb-20 max-w-3xl text-center ">
                <span class="block mb-2 text-lg font-semibold text-primary tex-white">
                    Our Blogs
                </span>
                <h2 class="mb-4 text-3xl font-bold  sm:text-4xl md:text-5xl tex-white ">
                    Our Recent News
                </h2>
                <p class=" ">
                    There are many variations of passages of Lorem Ipsum available
                    but the majority have suffered alteration in some form.
                </p>
            </div>

            {{-- Blog posts --}}
            <div class="flex flex-wrap -mx-4">
                @foreach ($posts as $post)
                    <div class="w-full px-4 mb-10 md:w-1/2 lg:w-1/3">
                        <div class="mb-8 overflow-hidden rounded">
                            <img src="{{ $post->image_url }}" class="w-full" alt="Post Image">
                        </div>
                        <div>
                            <span class="block mb-2 text-xs font-semibold leading-loose text-center">
                                Author: {{ ucfirst($post->user->name ?? 'Anonymous') }}
                            </span>
                            <span class="block mb-2 text-xs font-semibold leading-loose text-center">
                                {{ $post->created_at->diffForHumans() ?? 'N/A' }}
                            </span>
                            <h3>
                                <a href="{{ route('posts.show', $post->slug) }}"
                                    class="inline-block mb-4 text-xl font-semibold text-dark dark:text-white hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                    {{ $post->title ?? 'N/A' }}
                                </a>

                            </h3>
                            <p class="text-sm  ">
                                {{ Str::limit($post->body, 150) ?? 'N/A' }}
                            </p>
                            <div class="tags">
                                @foreach ($post->tags as $tag )
                                {{$tag->name}}
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Pagination --}}
            <div class="pagination-wrapper mt-10">
                {{ $posts->links('vendor.pagination.tailwind') }}
            </div>
            {{-- End blog posts --}}
        </div>
    </section>
    <x-footer></x-footer>
</x-layout>
