<div class="ui blue segment">
    <div class="ui header dividing">Bài viết cùng chuyên mục</div>
    @foreach($relatedPosts as $relatedPost)
        <a href="{{ route('blog.show', [$relatedPost->slug]) }}">
            <img src="{{ asset('image/uploaded/' . ($relatedPost->featured_image ?: 'default.jpg')) }}" class="ui mini spaced image">
            {{ $relatedPost->title }}
        </a>
        <div class="ui divider hidden no margin"></div>
    @endforeach
</div>