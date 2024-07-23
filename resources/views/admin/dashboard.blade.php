<x-layout>

    <x-sidebar></x-sidebar>
    <main class="flex-grow p-4 sm:ml-64 mt-16 sm:mt-16 dark__mode ">
        <div class="container mx-auto px-4">
            @if (Session::has('success'))
                <div class="p-4 mb-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400"
                    role="alert">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif
            {{-- Blog posts --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($posts as $post)
                    <div class="w-full mb-3 bg-white-500 rounded-lg shadow-2xl">
                        <div class="mb-2">
                            @if (!$post->image)
                                <img src="{{ asset('storage/default/bg.jpg') }}" alt="">
                            @else
                                <img src="{{ asset('storage/postImages/' . $post->image) }}" class="w-full"
                                    alt="Post Image">
                            @endif
                        </div>
                        <div>
                            <span class="p-2">
                                Author: {{ ucfirst($post->user->name ?? 'Anonymous') }}
                            </span>
                            <span class="p-2">
                                {{ $post->created_at->diffForHumans() ?? 'N/A' }}
                            </span>
                            <h3 class="p-2">
                                <a href="{{ route('admin.show', [$post->slug]) }}"
                                    class="inline-block text-xl font-semibold text-dark dark:text-white hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                    {{ $post->title ?? 'N/A' }}
                                </a>
                            </h3>
                            <p class="p-2 text-sm  ">
                                {{ Str::limit($post->body, 40) ?? 'N/A' }}
                            </p>
                            <div class="tags p-2">
                                @foreach ($post->tags as $tag)
                                    <span
                                        class="bg-gray-100 text-gray-800 text-sm font-medium me-2 px-2.5 
                                                py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                                            #{{ $tag->name }}
                                        </span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            {{-- Pagination --}}
            <div class="pagination-wrapper mt-10">
                {{-- {{ $posts->links('vendor.pagination.tailwind') }} --}}
                {{ $posts->links() }}
            </div>
            {{-- End blog posts --}}
        </div>
    </main>

</x-layout>
