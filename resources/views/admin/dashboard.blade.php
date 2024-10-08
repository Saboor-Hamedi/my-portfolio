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
                    <div class="w-full mb-3 rounded-lg shadow-2xl flex flex-col">
                        <!-- Image Section -->
                        <div class="mb-2">
                            @if (!$post->image)
                                <img src="{{ asset('storage/default/bg.jpg') }}" alt="Default Image"
                                    class="w-full h-48 object-cover rounded-t-lg">
                            @else
                                <img src="{{ asset('storage/postImages/' . $post->image) }}" alt="Post Image"
                                    class="w-full h-48 object-cover rounded-t-lg">
                            @endif
                        </div>

                        <!-- Content Section -->
                        <div class="flex-1 p-4">
                            <div class="mb-2">
                                <span>
                                    Author: {{ ucfirst($post->user->name ?? 'Anonymous') }}
                                </span>
                                <span class="p-2 ">
                                    {{ $post->created_at->diffForHumans() ?? 'N/A' }}
                                </span>
                            </div>
                            <h3 class="text-xl font-semibold mb-2">
                                <a href="{{ route('admin.show', [$post->slug]) }}"
                                    class="block mb-4 text-xl font-semibold text-dark  sm:text-2xl lg:text-xl xl:text-2xl">
                                    {{ $post->title ?? 'N/A' }}
                                </a>
                            </h3>

                            {!! Str::limit($post->body, 40) ?? 'N/A' !!}
                            <div class="tags flex flex-wrap mb-2">
                                @foreach ($post->tags as $tag)
                                    <span class="text-sm font-medium mr-2 mt-2 px-2.5rounded">
                                        #{{ $tag->name }}
                                    </span>
                                @endforeach
                            </div>
                        </div>

                        <!-- Footer Section -->
                        <div class="flex justify-between p-4 border-t ">
                            <div class="flex-1">
                                <form action="{{ route('admin.destroy', $post->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    @can('delete', $post)
                                        <button type="submit"
                                            class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                            Delete
                                        </button>
                                    @endcan
                                </form>
                            </div>
                            @can('update', $post)
                                <div class="flex-1 ml-2">
                                    <a href="{{ route('admin.edit', [$post->slug]) }}"
                                        class="w-full block text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Update
                                    </a>
                                </div>
                            @endcan
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
    <script src="{{ asset('js/sidebar.js') }}"></script>
</x-layout>
