@extends('layouts.master')

@section('content')
    <div class="ui center aligned padded grid">
        <div class="eleven wide column">
            <h2 class="ui left aligned header dividing">
                <i class="tag icon" style="display: inline-block;"></i>Tag: {{ $tag->name }}
                <span class="small-text"> ({{ $tag->posts->count() }} bài viết)</span>
            </h2>
            @if ($tag->posts->count() < 1)
                <h3 class="ui header center aligned">Không có bài viết nào</h3>
                <a href="/">Về trang chủ</a>
            @endif
            @foreach($tag->posts as $post)
                <div class="ui left aligned segment">
                    <div class="ui items">
                        <div class="item">
                            <div class="ui tiny image">
                                <img src="{{ asset("image/uploaded/" . ($post->featured_image ?: 'default.png')) }}" alt="">
                            </div>
                            <div class="content">
                                <a href="{{ route('blog.show', [$post->slug]) }}"
                                   class="header">{{ $post->title }}</a>
                                <div class="meta">
                                        <span class="tiny-text"><i class="calendar icon"></i>
                                            {{ $post->created_at->format('d/m/Y') }}
                                        </span>
                                    <span class="tiny-text short-spaced"><i class="time icon"></i>
                                        {{ $post->created_at->format('H:i') }}
                                        </span>
                                </div>
                                <div class="description">
                                    {{ substr(strip_tags($post->content), 0, 300) }}
                                    @if(strlen($post->content) > 300)
                                    &ctdot;
                                    <a href="{{ route('blog.show', $post->slug) }}" class="ui mini orange label">Đọc
                                        tiếp</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection