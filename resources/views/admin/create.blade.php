<x-layout>

    <x-sidebar></x-sidebar>

    <main class="flex-grow p-4 sm:ml-64 mt-16 sm:mt-16 dark__mode ">
        <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700 ">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-center h-24 rounded  ">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </p>

                </div>
                <div class="flex items-center justify-center h-24 rounded  ">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </p>

                </div>
                <div class="flex items-center justify-center h-24 rounded  ">
                    <p class="text-2xl text-gray-400 dark:text-gray-500">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
            </div>
            <div class=" shadow-lg  rounded-lg p-6">
                <div class="w-full">
                    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf

                        <!-- Title Input -->
                        <div>
                            <label for="title" class="block text-sm font-medium    ">Title</label>
                            <input type="text" id="title" name="title"
                                class="p-2 focus:outline-none mt-1 block w-full rounded-md 
                                    text-gray-900
                                    shadow-sm focus:border-indigo-500 
                                    border border-b-gray-900
                                    focus:ring-indigo-500  
                                "
                                placeholder="Title">
                            <div class="text-red-500 mt-1">
                                @error('title')
                                    <small class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <!-- Image Input with Preview -->
                        <div>
                            <label for="file_input"
                                class="block text-sm font-medium ">Image</label>
                            <div
                                class="mt-1 flex justify-center rounded-md border-2 
                                border-dashed p-6 ">
                                <div class="text-center">
                                    <input type="file" id="file_input" name="image"
                                        class="block w-full text-sm  border rounded-lg cursor-pointer 
                                            focus:outline-none dark:placeholder-gray-400"
                                        onchange="previewImage(event)">
                                    <img id="image_preview" class="mt-4 hidden w-32 h-32 object-cover rounded-lg"
                                        src="" alt="Image Preview">
                                </div>
                            </div>
                            <div class="text-red-500 mt-1">
                                @error('image')
                                    <small class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>

                        <!-- Body Textarea -->
                        <div>
                            <label for="body"
                                class="block text-sm font-medium  ">Body</label>
                            <textarea id="body" name="body" rows="4"
                                class="p-2 focus:outline-none mt-1 block w-full 
                                text-gray-900
                                rounded-md shadow-sm focus:border-indigo-500 
                                border border-b-gray-900
                                focus:ring-indigo-500   "
                                placeholder="New Post"></textarea>
                            <div class="text-red-500 mt-1">
                                @error('body')
                                    <small class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                        </div>


                        <!-- Tag Input -->
                        <div>
                            <label for="tag"
                                class="block text-sm font-medium  ">Tag</label>
                            <input type="text" id="tag" name="tag"
                                class="p-2 focus:outline-none mt-1 block w-full 
                                text-gray-900
                                rounded-md shadow-sm focus:border-indigo-500 
                                border border-b-gray-900
                                focus:ring-indigo-500   "
                                placeholder="Tag">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" id="submit"
                                class="bg-indigo-600 hover:bg-indigo-700 font-bold py-2 px-4 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:bg-indigo-500 dark:hover:bg-indigo-600">
                                Post
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
     <script src="{{ asset('js/sidebar.js') }}"></script>
</x-layout>
