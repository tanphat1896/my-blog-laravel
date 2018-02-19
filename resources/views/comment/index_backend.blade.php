<table class="ui sixteen column compact table very basic celled">
    <thead>
    <tr>
        <th class="one wide">ID</th>
        <th class="four wide">Tên - Email</th>
        <th class="seven wide">Nội dung</th>
        <th class="one wide">Duyệt</th>
        <th class="three wide">Hành động</th>
    </tr>
    </thead>
    <tbody>
    @foreach($post->comments as $comment)
        <tr class="top aligned">
            <td>{{ $comment->id }}</td>
            <td>{{ $comment->name }} - <i>{{ $comment->email }}</i></td>
            <td><span id="cmt-{{ $comment->id }}">{{ $comment->content }}</span>
                <form action="{{ route('comments.update', [$comment->id]) }}" method="post" class="tiny force-hidden ui form" id="form-{{ $comment->id }}">
                    {{ csrf_field() }}
                    {{ method_field('PUT') }}
                    <div class="field small-margin">
                        <textarea name="comment" rows="3" cols="30" class="fluid">{{ $comment->content }}</textarea>
                    </div>
                    <button class="ui mini blue button as-label">Lưu lại</button>
                </form>
                <a href="#" class="ui mini blue label"
                    onclick="$(this).hide(); $('#cmt-{{ $comment->id }}').hide();
                            $('#form-{{ $comment->id }}').show(100).addClass('force-inline')">
                    Sửa
                </a>
            </td>
            <td class="center aligned">
                @if($comment->approved)
                    <i class="green check icon"></i>
                @endif
            </td>
            <td>
                <a href="#"
                   onclick="confirmFormSubmit('Xác nhận xóa comment này?', '{{ "cmt-$comment->id" }}')"
                   class="ui mini red label">Xóa</a>

                <form action="{{ route('comments.destroy', [$comment->id]) }}"
                      id="{{ "cmt-$comment->id" }}" class="force-hidden" method="post">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                </form>

                @if($comment->approved)
                    <form action="{{ route('comments.update', [$comment->id]) }}"
                          class="force-inline" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="approved" value="0">
                        <button class="ui mini orange button as-label">Bỏ duyệt</button>
                    </form>
                @else
                    <form action="{{ route('comments.update', [$comment->id]) }}"
                          class="force-inline" method="post">
                        {{ method_field('PUT') }}
                        {{ csrf_field() }}
                        <input type="hidden" name="approved" value="1">
                        <button class="ui mini dark-green button as-label">Duyệt</button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>