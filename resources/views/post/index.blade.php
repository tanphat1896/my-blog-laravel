@extends('layouts.admin')

@section('content')
    <div class="ui container big-margin">
        <div class="ui clearing segment">
            <h2 class="ui header dividing">Tất cả bài viết
                <a href="{{ route('posts.create') }}" class="ui blue label">
                    <i class="pencil icon"></i> Viết bài mới
                </a>
            </h2>
            <table class="ui table very compact celled striped center aligned">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Ngày tạo</th>
                    <th>Bản nháp</th>
                    <th>Xem như</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td class="left aligned">{{ $post->title }}</td>
                        <td>{{ $post->created_at->format('d/m/Y\, H:i') }}</td>
                        <td>
                            @if ($post->is_draft)
                                <i class="green check icon"></i>
                            @endif
                        </td>
                        <td class="left aligned">
                            <a href="{{ route('posts.show', [$post->id]) }}" class="ui tiny blue label">Admin</a>

                            @if (!$post->is_draft)
                                <a href="{{ route('blog.show', [$post->slug]) }}" class="ui tiny teal label">Khách</a>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('posts.edit', [$post->id]) }}" class="ui tiny green label">Sửa</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th colspan="6" class="right aligned">
                        {{ $posts->render() }}
                    </th>
                </tr>
                </tfoot>
            </table>
        </div>
    </div>
@endsection
