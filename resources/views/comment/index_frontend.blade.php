<div class="ui basic segment">
    <div class="ui minimal threaded comments">
        @foreach($comments as $comment)
            <div class="ui comment" id="comment-{{ $comment->id }}">
                <img src="{{ asset('image/visitor.png') }}" alt="" class="avatar">
                <div class="content">

                    <a href="#comment-{{ $comment->id }}" class="author">{{ $comment->name }}</a>

                    <div class="metadata">
                        <span class="date">Lúc {{ $comment->created_at->format('d/m/y - h:i A') }}</span>
                    </div>

                    <div class="text">{{ $comment->content }}</div>

                    <div class="actions">
                        @if (Auth::check())
                            <a class="dark-text pointer" onclick="showReplyForm({{ $comment->id }});">
                                <strong>Trả lời</strong>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="ui comments">
                    @foreach ($comment->children as $child)
                        <div class="ui comment">
                            <img src="{{ asset('image/visitor.png') }}" alt="" class="avatar">

                            <div class="content">
                                <a href="#comment-{{ $comment->id }}" class="author">{{ $child->name }}</a>

                                <div class="metadata">
                                    <span class="date">Lúc {{ $child->created_at->format('d/m/y - h:i A') }}</span>
                                </div>

                                <div class="text">{{ $child->content }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>

<form action="{{ route('comments.store') }}" class="ui small form blue segment" method="post">
    <h4>Để lại bình luận</h4>
    {{ csrf_field() }}
    <input type="hidden" name="post_id" value="{{ $post->id }}">
    <div class="two fields">
        <div class="field">
            <input type="text" id="name" required name="name" placeholder="Tên của bạn">
        </div>
        <div class="field">
            <input type="email" id="email" required name="email" placeholder="Email">
        </div>
    </div>
    <div class="field {{ $errors->has('comment') ? "error": "" }}">
        <textarea name="comment" id="comment" rows="2" placeholder="Bình luận của bạn"
                {{ $errors->has('comment') ? "autofocus": "" }}></textarea>
        @if ($errors->has('comment'))
            <div class="ui red toast shadow message" id="comment-error">
                <i class="close icon"></i>
                Ngu người
            </div>
        @endif
    </div>
    <div class="field">
        <button class="ui tiny blue button">Gửi bình luận</button>
    </div>
</form>

<div id="form-reply" class="force-hidden">
    <form class="ui reply tiny segment form" method="post" action="{{  route('comments.storeReply') }}">
        {{ csrf_field() }}
        <input type="hidden" name="parent_id" value="0">
        <div class="fluid field small-margin">
            <label>Trả lời bình luận</label>
            <input type="text" name="comment" placeholder="Nhập trả lời của bạn" required>
        </div>
        <button class="ui mini blue button no margin">Gửi</button>
    </form>
</div>

{{--@include('plugin.fb.comment')--}}