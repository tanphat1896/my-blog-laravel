@extends('layouts.master')

@section('title', 'Trang admin | Tan Phat Blog')

@section('content')
    @include('layouts.partial.banner')
    
    <div class="ui padded grid center aligned stackable">
        <div class="sixteen wide mobile sixteen wide tablet nine wide computer column">
            <h2 class="ui left aligned dividing header">Danh sách bài viết</h2>
            <div class="ui basic segment no padded left aligned">
                @foreach($posts as $post)
                    <div class="ui  segment">
                        <div class="ui items">
                            <div class="item">
                                <div class="ui tiny image">
                                    <img src="{{ asset('image/uploaded/' . ($post->featured_image ?: 'default.jpg')) }}" alt="">
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
            <div class="ui center aligned basic segment no padded">
                {{ $posts->render() }}
            </div>
        </div>

        <div class="sixteen wide mobile sixteen wide tablet four wide computer column">
            @include('sidebar.sidebar')
        </div>
    </div>
@endsection
