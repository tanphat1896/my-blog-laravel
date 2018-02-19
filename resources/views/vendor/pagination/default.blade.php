@if ($paginator->hasPages())
    <div class="ui tiny pagination menu">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <a class="icon item disabled"> <i class="left chevron icon"></i> </a>
        @else
            <a class="icon item " href="{{ $paginator->previousPageUrl() }}" rel="prev"> <i class="left chevron icon"></i> </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <a class="icon item   disabled">{{ $element }}</a>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                {{--@if ($paginator->currentPage() - 2 < 1)--}}
                    {{--@for($page = 1; $page <= 5; $page++)--}}
                        {{--@if ($page == $paginator->currentPage())--}}
                            {{--<span class="item   active">{{ $page }}</span>--}}
                        {{--@else--}}
                            {{--<a class="item " href="{{ $element[$page] }}">{{ $page }}</a>--}}
                        {{--@endif--}}
                    {{--@endfor--}}

                {{--@elseif($paginator->currentPage() + 2 > $paginator->count())--}}
                    {{--@for($page = $paginator->count() - 4; $page <= $paginator->count(); $page++)--}}
                        {{--@if ($page == $paginator->currentPage())--}}
                            {{--<span class="item active ">{{ $page }}</span>--}}
                        {{--@else--}}
                            {{--<a class="item " href="{{ $element[$page] }}">{{ $page }}</a>--}}
                        {{--@endif--}}
                    {{--@endfor--}}
                {{--@else--}}
                    {{--@for($page = $paginator->currentPage() - 2; $page <= $paginator->currentPage() + 2; $page++)--}}
                        {{--@if ($page == $paginator->currentPage())--}}
                            {{--<span class="item active ">{{ $page }}</span>--}}
                        {{--@else--}}
                            {{--<a class="item " href="{{ $element[$page] }}">{{ $page }}</a>--}}
                        {{--@endif--}}
                    {{--@endfor--}}
                {{--@endif--}}
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <a class="item active" href="{{ $url }}">{{ $page }}</a>
                    @else
                        <a class="item" href="{{ $url }}">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a class="icon item " href="{{ $paginator->nextPageUrl() }}" rel="next"> <i class="right chevron icon"></i> </a>
        @else
            <a class="icon item disabled "> <i class="right chevron icon"></i> </a>
        @endif
    </div>
@endif
