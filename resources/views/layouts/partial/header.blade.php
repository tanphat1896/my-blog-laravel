<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="csrf-token" content="{{ csrf_token() }}">

@yield('meta')

<title>@yield('title', 'Tan Phat Blog')</title>

<link rel="icon" href="{{ asset('image/avt.png') }}">

<link href="{{ asset('dist/semantic.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/layout.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

@stack('style')