<div class="ui grid tablet computer only">
<div class=" sixteen wide column">

    <div class="ui fixed menu square-border no-margin" id="visibility">
        <a href="/" class="header item"><i class="large  code outline icon"></i>My Blog</a>

        {{-- <a href="/" class="item {{ Request::is('/') ? "active": "" }}">Home</a>
        <a href="/about" class="item {{ Request::is('about') ? "active": "" }}">About</a>
        <a href="/contact" class="item {{ Request::is('contact') ? "active": "" }}">Liên hệ</a> --}}

        @foreach ($menus as $item)
            @if ($item->children->count() > 0)
                <div class="ui dropdown item {{ Request::is("$item->slug") ? "active": "" }}">
                    @include('layouts.partial.submenu')
                </div>
            @else
                <a href="{{ $item->link }}" class="item {{ Request::is("$item->slug") ? "active": "" }}">{{ $item->name }}</a>
            @endif
        @endforeach

        <div class="right menu">
            @if (Auth::check() && Auth::user()->isAdmin())
                <a href="{{ route('admin.index') }}" class="item">Trang Admin</a>
                <div class="ui dropdown item">
                    <i class="user icon"></i>
                    {{--<img src="{{ asset('image/ntp.jpg') }}" class="ui spaced xmini circular image" alt="">--}}

                    Chào {{ Auth::user()->name }}

                    <i class="dropdown icon"></i>
                    <div class="menu">
                        <a href="{{ route('logout') }}" class="item"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="sign out icon"></i>
                            Đăng xuất
                        </a>
                    </div>
                </div>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            @endif
        </div>
    </div>

</div>
</div>

<div style="padding-top: 50px;"></div>