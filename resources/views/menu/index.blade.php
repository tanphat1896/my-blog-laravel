@extends('layouts.admin')
@section('title', 'Menu | Tan Phat Blog')
@section('content')
    <div class="ui grid stackable">
        <div class="column"></div>
        <div class="ten wide column">
            <div class="ui basic segment">
                <h3 class="ui dividing header">Thanh menu</h3>

                @include('layouts.component.message')

                <p><strong>Nhấn vào để xem các menu con</strong></p>
                {{--<div class="ui fluid styled accordion">--}}
                    {{--@foreach ($menus as $menu)--}}
                        {{--<div class="title">--}}
                            {{--<i class="dropdown icon"></i>--}}
                            {{--{{ $menu->name }}--}}
                            {{--<div class="ui basic segment no margin no padded right floated">--}}
                                {{--ID: {{ $menu->id }}--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        {{----}}
                        {{--<div class="content">--}}
                            {{--<i class="linkify icon"></i>--}}
                            {{--{{ $menu->link }}--}}

                            {{--<form method="post" action="{{ route('menus.destroy', [$menu->id]) }}" class="force-inline">--}}
                                {{--{{ csrf_field() }}--}}
                                {{--{{ method_field('DELETE') }}--}}
                                {{--<button class="ui mini red button mini-padded">Xóa</button>--}}
                            {{--</form>--}}
                            {{--@if($menu->children->count() > 0)--}}
                                {{--<div class="accordion">--}}
                                    {{--@foreach ($menu->children as $child)--}}
                                        {{--<div class="title">--}}
                                            {{--<i class="dropdown icon"></i>--}}
                                            {{--{{ $child->name }}--}}
                                        {{--</div>--}}

                                        {{--<div class="content">--}}
                                            {{--<i class="linkify icon"></i>--}}
                                            {{--{{ $child->link }}--}}

                                            {{--<form method="post" action="{{ route('menus.destroy', [$child->id]) }}" class="force-inline">--}}
                                                {{--{{ csrf_field() }}--}}
                                                {{--{{ method_field('DELETE') }}--}}
                                                {{--<button class="ui mini red button mini-padded">Xóa</button>--}}
                                            {{--</form>--}}
                                        {{--</div>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{----}}
                    {{--@endforeach--}}
                {{--</div>--}}
                <div class="ui list">
                    @foreach ($menus as $menu)
                        <div class="item">
                            <i class="folder icon"></i>
                            <div class="content">
                                <div class="header"> {{ $menu->name }} ( ID: {{ $menu->id }})
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
            </div>
        </div>
        <div class="four wide column">
            <div class="ui segment">
                <h4 class="ui dividing header">Thêm mới</h4>
                <form action="{{ route('menus.store') }}" class="ui tiny form" method="post">
                    {{ csrf_field() }}
                    <div class="field {{ $errors->has('name') ? "error": "" }}">
                        <label for="name">Tên menu</label>
                        <input type="text" name="name" id="name" required autofocus>
                        @if ($errors->has('name'))
                            <div class="ui top red pointing label">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="field">
                        <label for="link">Liên kết</label>
                        <input name="link" id="link" required/>
                    </div>
                    <div class="field">
                        <label for="sequence">Thứ tự trong menu chính</label>
                        <input type="number" name="sequence" id="sequence" value="0" required/>
                    </div>
                    <div class="field">
                        <label for="parent_id">Menu cha</label>
                        <input type="number" min="0" name="parent_id" id="parent_id"/>
                    </div>
                    <div class="field">
                        <button class="ui tiny green button">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
