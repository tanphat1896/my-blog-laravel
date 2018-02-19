{{ $item->name }}
<i class="dropdown icon"></i>
<div class="menu">
    @foreach ($item->children as $item)
        @if ($item->children->count() > 0)
            <div class="item">
                @include('layouts.partial.submenu')
            </div>
        @else
            <a href="{{ $item->link }}" class="item">{{ $item->name }}</a>
        @endif
    @endforeach
</div>