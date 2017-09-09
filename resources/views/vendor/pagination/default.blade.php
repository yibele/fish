@if ($paginator->hasPages())
    <nav class="pagination is-centered" role="pagination" aria-lebel="pagination" style="justify-content:center;margin-top:20px">
        {{-- Previous Page Link --}}
     
        
        <ul class="pagination-list" style="border:none !important">
        @if ($paginator->onFirstPage())
        @else
            <!--<li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>-->
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="pagination-previous" style="border :none !important">上一页</a>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <!--<li class="active"><span>{{ $page }}</span></li>-->
                        <li><a class="pagination-link is-current" style="border :none !important">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url}}" class="pagination-link" style="border :none !important">{{ $page }}</a></li>
                        <!--<li><a href="{{ $url }}">{{ $page }}</a></li>-->
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <!--<li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>-->
            <a href="{{ $paginator->nextPageUrl() }}" class="pagination-next" style="border :none !important">下一页</a>
        @else
        @endif
        </ul>

    </nav>
@endif
