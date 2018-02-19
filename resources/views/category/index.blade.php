@extends('layouts.admin')
@section('title', 'Categories | Tan Phat Blog')
@section('content')
    <div class="ui grid stackable">
        <div class="column"></div>
        <div class="ten wide column">
            <div class="ui basic segment">
                <h3 class="ui dividing header">Chuyên mục</h3>

                @include('layouts.component.message')

                <table class="ui table no margin">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Chuyên mục</th>
                        <th>Mô tả</th>
                        <th class="collapsing">Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $num => $category)
                        <tr>
                            <td>{{ $num + 1 }}</td>
                            <td><a href="{{ route('categories.show', [$category->slug]) }}">{{ $category->name }}</a></td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <form action="{{ route('categories.destroy', [$category->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="ui tiny basic red label" style="cursor: pointer;">Xóa</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="four wide column">
            <div class="ui segment">
                <h4 class="ui dividing header">Thêm mới</h4>
                <form action="{{ route('categories.store') }}" class="ui tiny form" method="post">
                    {{ csrf_field() }}
                    <div class="field {{ $errors->has('name') ? "error": "" }}">
                        <label for="name">Tên chuyên mục</label>
                        <input type="text" name="name" id="name" required autofocus>
                        @if ($errors->has('name'))
                            <div class="ui top red pointing label">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                    <div class="field">
                        <label for="description">Mô tả</label>
                        <textarea name="description" id="description" rows="2"></textarea>
                    </div>
                    <div class="field">
                        <button class="ui tiny green button">Thêm chuyên mục</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
