<x-layout :title='$title'>
    {{-- sm:ml-64 --}}
    <x-sidebar></x-sidebar>
    <main class="flex-grow p-4 sm:ml-64 mt-16 sm:mt-16 dark__mode ">
        <header class="mb-4 lg:mb-6 not-format">
            <address class="flex items-center mb-6 not-italic">
                <div class="inline-flex items-center mr-3 text-sm ">
                    @if (!$post->image)
                        <img src="{{ asset('storage/default/bg.jpg') }}" class="mr-4 w-16 h-16 rounded-full object-fill	">
                    @else
                        <img src="{{ asset('storage/postImages/' . $post->image) }}"
                            class="mr-4 w-16 h-16 rounded-full object-fill	" alt="Not found image">
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
                            class="w-full h-48 object-fill	">
                    @else
                        <img src="{{ asset('storage/postImages/' . $post->image) }}" alt="Post Image"
                            class="wobject-cover h-48 w-96">
                    @endif

                </div>

                <div class="inline-block p-2">
                    <h1
                        class="mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl lg:text-6xl dark:text-white">
                        {!! Str::ucfirst($post->title) !!}
                    </h1>
                    {!! $post->body !!}
                </div>

                <div class="tags flex flex-wrap mb-2">
                    @foreach ($post->tags as $tag)
                        <span class="text-sm font-medium mr-2 ml-2 mt-2 px-2.5rounded">
                            #{{ $tag->name }}
                        </span>
                    @endforeach
                </div>
            </div>

        </div>
    </main>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</x-layout>
