@extends('layouts.master')

@section('title'){{ $tag->name }} tag | Tan Phat Blog
@endsection

@section('content')
    <div class="ui center aligned grid stackable">

        <div class="ten wide column">

            <div class="ui left aligned segment">

                <h3 class="ui dividing header">
                    <i class="tag icon" style="display: inline-block;"></i>Tag: {{ $tag->name }}
                    <span class="small-text"> ({{ $tag->posts()->count() }} bài viết)</span>
                </h3>


                <table class="ui very basic celled table no margin compact">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Bài viết</th>
                        <th>Tag của bài viết</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tag->posts as $num => $post)
                        <tr>
                            <td>{{ $num + 1 }}</td>
                            <td><a href="{{ route('blog.show', [$post->slug]) }}">{{ $post->title }}</a></td>
                            <td>
                                @foreach($post->tags as $tag)
                                    <a href="{{ route('tags.show', [$tag->slug]) }}" class="ui mini blue tag label">
                                        {{ $tag->name }}
                                    </a>
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection