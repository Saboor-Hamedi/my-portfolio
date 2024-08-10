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
        </div>
        {{-- Blog posts --}}
        <div class="px-4 md:px-8 lg:px-16">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-5">
                @foreach ($posts as $post)
                    <div class="shadow-md rounded-md flex flex-col">
                        <div class="mb-2 h-48 overflow-hidden">
                            @if (!$post->image)
                                <img src="{{ asset('storage/default/bg.jpg') }}" alt=""
                                    class="w-full h-full object-cover">
                            @else
                                <img src="{{ asset('storage/postImages/' . $post->image) }}"
                                    class="w-full h-full object-cover" alt="Post Image">
                            @endif
                        </div>
                        <div class="flex flex-row gap-3 justify-start sm:flex-col md:flex-row px-2">
                            <span class="block mb-2 text-xs font-semibold leading-loose text-center">
                                Author: {{ ucfirst($post->user->name ?? 'Anonymous') }}
                            </span>
                            <span class="block mb-2 text-xs font-semibold leading-loose text-center">
                                {{ $post->created_at->diffForHumans() ?? 'N/A' }}
                            </span>
                        </div>
                        <div class="flex-grow flex flex-col justify-between p-4">
                            <div>
                                <h3 class="mb-2">
                                    <a href="{{ route('posts.show', [$post->slug]) }}"
                                        class="inline-block text-xl font-semibold text-dark dark:text-white hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                        {!! $post->title ?? 'N/A' !!}
                                    </a>
                                </h3>
                                <p class="text-sm">
                                    {!! Str::limit($post->body, 150) ?? 'N/A' !!}
                                </p>
                            </div>
                            <div class="tags mt-2">
                                @foreach ($post->tags as $tag)
                                    <span
                                        class="text-sm font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                        #{{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Pagination --}}
            <div class="px-4 md:px-8 lg:px-16 mt-10">
                {{ $posts->links() }}
            </div>
        </div>

        {{-- End blog posts --}}
    </section>
    <x-footer></x-footer>
</x-layout>
