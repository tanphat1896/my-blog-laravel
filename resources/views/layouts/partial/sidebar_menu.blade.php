<div class="ui visibile right thin vertical sidebar menu" id="mobile-menu">
    <a href="/" class="item {{ Request::is('/') ? "active": "" }}">Home
        <i class="home icon"></i>
    </a>
    <a href="/about" class="item {{ Request::is('about') ? "active": "" }}">About
        <i class="info icon"></i>
    </a>
    <a href="/contact" class="item {{ Request::is('contact') ? "active": "" }}">Liên hệ
        <i class="mail icon"></i>
    </a>
    {{--@guest--}}
        {{--<a href="{{ route('login') }}" class="item">--}}
            {{--<i class="sign in icon"></i>--}}
            {{--Đăng nhập--}}
        {{--</a>--}}
    {{--@else--}}
        {{--<div class="ui styled accordion square-border">--}}
            {{--<div class=" dark-text title clear-style"><i class="user icon"></i>Tài khoản--}}
                {{--<i class="dropdown icon"></i>--}}
            {{--</div>--}}
            {{--<div class="content no-padded no-margin">--}}
                {{--<div class="menu">--}}
                    {{--<a href="{{ route('posts.index') }}" class="item tiny-text">--}}
                        {{--{{ Auth::user()->name }}--}}
                    {{--</a>--}}
                    {{--<a href="{{ route('posts.index') }}" class="item tiny-text">--}}
                        {{--<i class="pencil icon"></i> Bài viết--}}
                    {{--</a>--}}
                    {{--<a href="{{ route('categories.index') }}" class="item tiny-text">--}}
                        {{--<i class="linkify icon"></i> Chuyên mục--}}
                    {{--</a>--}}
                    {{--<a href="{{ route('tags.index') }}" class="item tiny-text">--}}
                        {{--<i class="tags icon"></i> Tags--}}
                    {{--</a>--}}
                    {{--<a href="{{ route('logout') }}" class="item tiny-text"--}}
                       {{--onclick="event.preventDefault();document.getElementById('logout-form').submit();">--}}
                        {{--<i class="sign out icon"></i>--}}
                        {{--Đăng xuất--}}
                    {{--</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--@endguest--}}

    <a href="#" class="item toggle-sidebar bottom aligned">Đóng menu
        <i class="close icon"></i>
    </a>
</div>

@push('script')
    <script>
        $('.toggle-sidebar').click(function () {
            $('#mobile-menu')
                .sidebar({
                    mobileTransition: 'overlay',
                    transition: 'overlay'
                })
                .sidebar('toggle');
            return false;
        });
    </script>
@endpush

