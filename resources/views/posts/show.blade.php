<x-layout>
    <!-- ====== Blog Section Start -->
    <section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20 bg-white dark:bg-dark min-h-screen">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="w-full mb-4">
                    <div class="mb-2 overflow-hidden rounded">
                        <img src="https://cdn.tailgrids.com/2.0/image/application/images/blogs/blog-01/image-01.jpg"
                            alt="image" class="w-full h-auto rounded-lg object-cover" />
                    </div>
                    <div>
                        <span class="flex text-xs font-semibold leading-loose text-center text-black bg-primary rounded px-2">
                            Author: {{ ucfirst($post->user->name ?? 'Anonymous') }}
                        </span>
                        <span class="inline-block  text-xs font-semibold leading-loose text-center text-black bg-primary rounded px-2">
                            {{ $post->created_at->diffForHumans() ?? 'N/A' }}
                        </span>
                        <h3>
                            <a href="{{ route('posts.show', $post->slug) }}"
                                class="block mb-4 text-xl font-semibold text-dark dark:text-white hover:text-primary sm:text-2xl lg:text-xl xl:text-2xl">
                                {{ $post->title ?? 'N/A' }}
                            </a>
                        </h3>
                        <p class="text-base text-body-color dark:text-dark-6">
                            {{ Str::limit($post->body, 200) ?? 'N/A' }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
