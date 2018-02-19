@extends('layouts.master')
@section('title'){{ $post->title }} | Tan Phat Blog
@endsection

@section('meta')
    <meta property="og:url"           content="{{ route('blog.show', $post->slug) }}" />
    <meta property="og:type"          content="website" />
    <meta property="og:title"         content="{{ $post->title }}" />
    <meta property="og:description"   content="{{ strip_tags($post->content) }}" />
    <meta property="og:image"         content="{{ asset('image/uploaded/' . $post->featured_image) }}" />
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('highlight.js/styles/github.css') }}">
    <div class="ui container">

        @include('blog.partial.breadcrumb')

        <div class="ui two column grid stackable">
            <div class="eleven wide column">
                @include('layouts.component.message')

                @include('blog.partial.content')

                <h3 class="ui header">
                    <i class="comments outline icon"></i>Bình luận ({{ count($comments) }})
                </h3>

                @include('comment.index_frontend')

            </div>
            <div class="five wide column">

                @include('post.related')

            </div>
        </div>



    </div>
    <script src="{{ asset('highlight.js/highlight.pack.js') }}"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    
@endsection