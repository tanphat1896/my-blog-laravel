@extends('layouts.admin')
@section('title', "$post->title  | Tan Phat Blog")
@section('content')
    <link rel="stylesheet" href="{{ asset('highlight.js/styles/github.css') }}">
    <div class="ui container">

        <div class="ui segment">
            <div class="ui breadcrumb">
                <a class="section" href="/">Home</a>
                <i class="right chevron icon divider"></i>
                <a class="section" href="/">Bài viết</a>
                <i class="right chevron icon divider"></i>
                <div class="active section">{{ $post->title }}</div>
            </div>
        </div>

        <div class="ui two column grid stackable">
            <div class="eleven wide column">
                @include('layouts.component.message')

                <div class="ui segment">
                    <h2 class="ui header dividing">
                        {{ $post->title }}
                        <div class="post sub header small-margin small-text">
                            <i class="time icon"></i>{{ $post->created_at->format('d/m/Y - h:iA') }}
                            <span class="short-spaced"><i>Chuyên mục: <strong>{{ $post->category->name }}</strong></i></span>
                        </div>
                    </h2>
                    <div class="post-content">
                        <div class="ui basic segment center aligned no padded">
                            <img src="{{ asset("image/uploaded/$post->featured_image") }}" alt="" class="ui image">
                        </div>

                        {!! $post->content !!}
                    </div>
                    <div class="ui divider"></div>
                    @foreach($post->tags as $tag)
                        <a href="{{ route('tags.show', [$tag->slug]) }}" class="ui mini blue tag label">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </div>

                <h3 class="ui header">
                    <i class="comments outline icon"></i>Bình luận ({{ count($post->comments) }})
                </h3>

                @include('comment.index_backend')

            </div>
            <div class="five wide column">
                <div class="ui blue raised segment">

                    <ul class="list">
                        <li>Ngày viết: <strong>{{ $post->created_at->format('d/m/Y \l\ú\c H:i') }}</strong></li>
                        <li>Cập nhật cuối: <strong>{{ $post->updated_at->format('d/m/Y \l\ú\c H:i') }}</strong></li>
                        <li>Chuyên mục: <strong>{{ $category }}</strong></li>
                    </ul>

                    <form action="{{ route('posts.destroy', [$post->id]) }}" method="post" id="form-delete-post">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="ui fluid mini buttons">
                            <a href="{{ route('posts.edit', [$post->id]) }}" class="ui small green button shadow">
                                <i class="edit icon"></i>Sửa
                            </a>
                            <button class="ui small red button shadow"
                                    onclick="confirmation('Xác nhận xóa?', function () { $('#form-delete-post').submit() }); return false;">
                                <i class="delete icon"></i>Xóa
                            </button>
                        </div>
                    </form>
                    <div class="mini-padded"></div>
                    <a href="{{ route('blog.show', [$post->slug]) }}"
                       class="ui blue mini-padded fluid button small-margin">Xem bài viết &raquo;</a>
                    <a href="{{ route('posts.index') }}" class="ui mini-padded fluid button">&laquo; Tất cả bài viết</a>
                </div>
            </div>

        </div>

    </div>
    <script src="{{ asset('highlight.js/highlight.pack.js') }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>
@endsection