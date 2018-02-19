<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.partial.header')
</head>
<body class="pushable">

@include('layouts.partial.sidebar_menu')

<div class="pusher" id="main-content">

    @include('layouts.partial.menu')

    {{--@if (Auth::check() && Auth::user()->isAdmin())--}}
        {{--@include('layouts.partial.admin_menu')--}}
    {{--@endif--}}

    @include('layouts.partial.mobile_menu')

    @yield('content')

    @include('layouts.partial.footer')
</div>

@include('layouts.component.confirm')

@include('layouts.partial.script')

{{-- @include('plugin.tawk_to.chat'); --}}
</body>
</html>
