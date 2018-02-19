<div class="ui inverted small menu no margin square-border">

    <a href="{{ route('admin.index') }}" class="item {{ Request::is('admin') ? "active" : "" }} ">
        <i class="dashboard icon"></i> Dashboard
    </a>
    <a href="{{ route('posts.index') }}" class="item {{ Request::is('posts') ? "active" : "" }} ">
        <i class="pencil icon"></i> Bài viết
    </a>

    <a href="{{ route('categories.index') }}" class="item {{ Request::is('categories') ? "active" : "" }} ">
        <i class="linkify icon"></i> Chuyên mục
    </a>

    <a href="{{ route('tags.index') }}" class="item {{ Request::is('tags') ? "active" : "" }} ">
        <i class="tags icon"></i> Tags
    </a>

    <a href="{{ route('menus.index') }}" class="item {{ Request::is('menus') ? "active" : "" }} ">
        <i class="tags icon"></i> Thanh menu
    </a>

    <div class="right menu">
        <a href="{{ url('/') }}" class="item">
            <i class="home icon"></i> Trang chủ
        </a>
    </div>

    {{--<a href="{{ route('social.index') }}" class="item {{ Request::is('social') ? "active" : "" }} ">--}}
    {{--<i class="facebook icon"></i> Liên kết--}}
    {{--</a>--}}
</div>