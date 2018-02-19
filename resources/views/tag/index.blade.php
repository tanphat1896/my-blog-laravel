@extends('layouts.admin')
@section('title', 'Tags | Tan Phat Blog')
@section('content')
    <div class="ui center aligned grid stackable">
        <div class="ten wide column">
            <div class="ui left aligned basic segment">
                <h3 class="ui dividing header">
                    <i class="tags fitted icon no margin"></i>
                    Tags
                </h3>

                @include('layouts.component.message')

                <table class="ui table no margin very compact">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tag</th>
                        <th>Mô tả</th>
                        <th>Hành động</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $num => $tag)
                        <tr>
                            <td>{{ $num + 1 }}</td>
                            <td>
                                <a href="{{ route('tags.show', [$tag->slug]) }}"
                                    @php $colors = ['blue', 'green', 'teal', 'violet'];
                                        echo "class='ui small tag label {$colors[$num%4]}'"
                                    @endphp >
                                    {{ $tag->name }}
                                </a>
                            </td>
                            <td>{{ $tag->description }}</td>
                            <td>
                                <form action="{{ route('tags.destroy', [$tag->id]) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button class="ui mini red label" style="cursor: pointer;">Xóa</button>
                                    <a href="#" onclick="$('{{ "#modal-{$tag->id}" }}').modal('show')"
                                        class="ui mini green label">Sửa</a>
                                </form>
                            </td>
                        </tr>
                        <div class="ui mini modal" id="{{ "modal-{$tag->id}" }}">
                            <div class="header">Sửa tag</div>
                            <div class="content">
                                <form action="{{ route('tags.update', [$tag->id]) }}" class="ui form" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="field">
                                        <label for="name">Tên tag</label>
                                        <input type="text" name="name" id="name" required value="{{ $tag->name }}" autofocus>

                                    </div>
                                    <div class="field">
                                        <label for="description">Mô tả</label>
                                        <textarea name="description" id="description" rows="2">{{ $tag->description }}</textarea>
                                    </div>
                                    <div class="field">
                                        <button class="ui tiny green button">Cập nhật tag</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="four wide column">

                <div class="ui  left aligned segment">
                    <h4 class="ui dividing header">Thêm mới</h4>
                    <form action="{{ route('tags.store') }}" class="ui tiny form" method="post">
                        {{ csrf_field() }}
                        <div class="field {{ $errors->has('name') ? "error": "" }}">
                            <label for="name">Tên tag</label>
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
                            <button class="ui tiny green button">Thêm tag</button>
                        </div>
                    </form>
                </div>
        </div>
    </div>
@endsection
