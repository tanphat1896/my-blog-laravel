<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    @include('layouts.partial.header')

</head>
<body class="pushable">

@include('layouts.partial.sidebar_menu')

<div class="pusher" id="main-content">

    @include('layouts.partial.admin_menu')

    @include('layouts.partial.mobile_menu')

    @yield('content')

    @include('layouts.partial.footer')
</div>

@include('layouts.component.confirm')

@include('layouts.partial.script')


</body>
</html>
