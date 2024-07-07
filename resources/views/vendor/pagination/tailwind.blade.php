<!-- resources/views/vendor/pagination/tailwind.blade.php -->
@if ($paginator->hasPages())
    <nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="flex justify-center items-center mt-6">
        <ul class="flex">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-500 bg-gray-200 border border-gray-300 rounded-l-md cursor-default">
                    {!! __('pagination.previous') !!}
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-700 bg-gray-200 border border-gray-300 rounded-l-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 transition ease-in-out duration-150">
                        {!! __('pagination.previous') !!}
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-700 bg-gray-200 border border-gray-300 cursor-default">
                        <span>{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-teal-600 border border-gray-300 leading-5 rounded-md hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-teal-500 focus:border-teal-500 transition ease-in-out duration-150">
                                {{ $page }}
                            </li>
                        @else
                            <li>
                                <a href="{{ $url }}" class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-700 bg-gray-200 border border-gray-300 leading-5 rounded-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 transition ease-in-out duration-150">
                                    {{ $page }}
                                </a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-700 bg-gray-200 border border-gray-300 rounded-r-md hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-gray-400 transition ease-in-out duration-150">
                        {!! __('pagination.next') !!}
                    </a>
                </li>
            @else
                <li class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-500 bg-gray-200 border border-gray-300 rounded-r-md cursor-default">
                    {!! __('pagination.next') !!}
                </li>
            @endif
        </ul>
    </nav>
@endif
