@if ($paginator->hasPages())
    <nav aria-label="Table navigation">
        <ul class="inline-flex items-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                {{-- <li>
                    <button
                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple disabled"
                        aria-label="Previous">
                        <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </li> --}}
            @else
                <li>
                    <button wire:click="previousPage('page')" wire:loading.attr="disabled"
                        class="px-3 py-1 rounded-md rounded-l-lg focus:outline-none focus:shadow-outline-purple"
                        aria-label="Previous">
                        <svg aria-hidden="true" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                            <path
                                d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </li>
            @endif



            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    {{-- <span aria-disabled="true">
                         <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }}</span>
                     </span> --}}
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            {{-- <span aria-current="page">
                                 <button class="w-10 h-10 text-white transition-colors duration-150 bg-green-600 border border-r-0 border-green-600 rounded-full focus:shadow-outline">{{ $page }}</button>
                             </span> --}}
                            <button class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                {{ $page }}
                            </button>
                        @else
                            {{-- <a href="{{ $url }}" class="w-10 h-10 text-green-600 transition-colors duration-150 rounded-full focus:shadow-outline hover:bg-green-100" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                 {{ $page }}
                             </a> --}}
                            <li>
                                <button onclick="window.location.href='?page={{ $page }}';"
                                    class="px-3 py-1 rounded-md focus:outline-none focus:shadow-outline-purple">
                                    {{ $page }}
                                </button>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach


            {{-- {{ 'Halaman ' . $paginator->currentPage() . '  dari  ' . $paginator->lastPage() }} --}}




            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <button wire:click="nextPage" wire:loading.attr="disabled"
                        class="px-3
                        py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple disabled"
                        aria-label="Next">
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>

                </li>
            @else
                {{-- <li>
                    <button
                        class="px-3 py-1 rounded-md rounded-r-lg focus:outline-none focus:shadow-outline-purple disabled"
                        aria-label="Next">
                        <svg class="w-4 h-4 fill-current" aria-hidden="true" viewBox="0 0 20 20">
                            <path
                                d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                clip-rule="evenodd" fill-rule="evenodd"></path>
                        </svg>
                    </button>
                </li> --}}
            @endif
        </ul>
    </nav>
@endif
