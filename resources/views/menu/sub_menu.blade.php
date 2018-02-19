<div class="list">
    @foreach($menu->children as $menu)
        <div class="item">
            <i class="folder icon"></i>
            <div class="content">
            <div class="header">{{ $menu->name }} ( ID: {{ $menu->id }})
                <form method="post" action="{{ route('menus.destroy', [$menu->id]) }}" class="force-inline">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="ui mini red icon button mini-padded"><i class="remove icon"></i></button>
                </form>
            </div>
            <div class="description"><a href="#">{{ $menu->link }}</a></div>
            @include('menu.sub_menu')
            </div>
        </div>
    @endforeach
</div>