<div class="ui raised left aligned segment">
    <h4 class="ui header dividing small-margin">Tags</h4>
    @foreach($tags as $tag)
        <div class="ui basic segment no padded force-inline small-margin">
            <a href="{{ route('tags.front_end', [$tag->slug]) }}" class="ui blue small tag label">
                {{ $tag->name }}
            </a>
        </div>
    @endforeach
</div>