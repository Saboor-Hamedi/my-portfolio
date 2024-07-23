<x-layout :title='$title'>
    {{-- sm:ml-64 --}}
    <x-sidebar></x-sidebar>
    <main class="flex-grow p-4 sm:ml-64 mt-16 sm:mt-16 dark__mode ">
        <header class="mb-4 lg:mb-6 not-format">
            <address class="flex items-center mb-6 not-italic">
                <div class="inline-flex items-center mr-3 text-sm ">
                    @if (!$post->image)
                        <img src="{{ asset('storage/default/bg.jpg') }}" class="mr-4 w-16 h-16 rounded-full">
                    @else
                        <img src="{{ asset('storage/postImages/' . $post->image) }}" class="mr-4 w-16 h-16 rounded-full"
                            alt="Not found image">
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
        <!-- Single Post Component -->
        <div class="w-2/1 md:mb-6 lg:mb-8 mx-auto">
            <!-- Single Post Component -->
            <div class=" mb-4 md:mb-6 lg:mb-8">
                <div class="mb-4">
                    @if (!$post->image)
                        <img src="{{ asset('storage/default/bg.jpg') }}" alt="Post Image"
                            class="w-full h-48 object-cover">
                    @else
                        <img src="{{ asset('storage/postImages/' . $post->image) }}" alt="Post Image"
                            class="w-full h-48 object-cover">
                    @endif

                </div>
                <div class="">
                    <h2 class="text-2xl font-bold mb-2">{{ Str::ucfirst($post->title) }}</h2>
                    <p class="text-dark text-sm mb-4">{{ $post->created_at->diffForHumans() }}</p>
                    <p class="text-dark text-lg">{!! $post->wrapBodyText(500, true) !!}</p>
                </div>
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
    </main>

    <script src="{{ asset('js/sidebar.js') }}"></script>
</x-layout>
