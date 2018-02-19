<div class="ui blue segment">
    <h2 class="ui header dividing">
        {{ $post->title }}
        @if(Auth::check() && Auth::user()->isAdmin())
            <a href="{{ route('posts.show', [$post->id]) }}" class="ui tiny blue label">
                Trang admin
            </a>
        @endif
        <div class="post sub header small-margin small-text">
            <i class="time icon"></i>{{ $post->created_at->format('d/m/Y - h:iA') }}
            <span class="short-spaced"><i>Chuyên mục: <strong>{{ $post->category->name }}</strong></i></span>
        </div>
    </h2>
    <div class="post-content">
        <div class="ui basic segment center aligned no padded">
            <img src="{{ asset("image/uploaded/$post->featured_image") }}" alt="" class="ui image">
        </div>
        <p>
            {!! $post->content !!}
        </p>
    </div>

    <div class="ui header dividing"> Tags</div>

    @foreach($post->tags as $tag)
        <a href="{{ route('tags.front_end', [$tag->slug]) }}" class="ui mini blue tag label">
            {{ $tag->name }}
        </a>
    @endforeach

    <div class="ui divider"></div>

    @include('plugin.fb.sharing')

</div>