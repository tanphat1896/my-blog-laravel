@extends('layouts.admin')
@push('script')
<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>

@endpush
@section('content')
<form class="ui form" action="{{ route('posts.update', [$post->id]) }}" method="post" id="form-create-post" enctype="multipart/form-data">
    <div class="ui two padded center aligned column grid" id="post-context">
        <div class="row no padded small-margin">
            <div class="fourteen wide column" >
                <div class="ui left aligned segment tiny-padded">
                    <div class="ui breadcrumb">
                        <a class="section" href="{{ route('posts.index') }}">Tất cả bài viết</a>
                        <i class="right chevron icon divider"></i>
                        <div class="active section">Cập nhật bài viết</div>
                    </div>
                </div>
            </div>
        </div>


        <div class="ten wide column">
            <div class="ui left aligned raised segment">
                <h4 class="ui header dividing">
                        <i class="pencil fitted icon"></i> Nội dung bài viết
                </h4>
                {{ csrf_field() }} {{ method_field('PUT') }}
                <div class="large field">
                    <label for="title">Tiêu đề</label>
                    <div class="ui big input">
                        <input type="text" name="title" class="" id="title" oninput="getSlug();" placeholder="Tiêu đề bài viết" value="{{ $post->title }}">
                    </div>
                </div>
                <div class="field">
                    <label for="content">Nội dung</label>
                    <textarea name="content" id="content" class="ckeditor" rows="50">{!! $post->content !!}</textarea>
                </div>
            </div>
        </div>


        <div class="four wide column left aligned">
            <div class="ui segment">
                <h4 class="ui header dividing">Thông tin</h4>
                <div>
                    <div class="field">
                        <label>Lưu như</label>
                        <div class="inline fields">
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input id="draft" type="radio" name="is_draft" value="1" {{ $post->is_draft ? "checked": "" }}>
                                    <label for="draft" class="pointer">Bản nháp</label>
                                </div>
                            </div>
                            <div class="field">
                                <div class="ui radio checkbox">
                                    <input id="publish" type="radio" name="is_draft" value="0" {{ $post->is_draft ? "":"checked" }}>
                                    <label for="publish" class="pointer">Xuất bản</label>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="field">
                        <div class="ui two small buttons">
                            <button class="ui blue button"><strong>Lưu lại</strong></button>
                        </div>
                    </div>


                    <div class="field">
                        <label for="slug">Slug</label>
                        <input type="text" name="slug" id="slug" readonly class="disabled" value="{{ $post->slug }}">
                    </div>


                    <div class="field">
                        <label for="category">Chuyên mục</label>
                        <select class="ui dropdown" name="category" id="category">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" 
                                class="item" {{ $category->id == $post->category_id ? 'selected': '' }}> 
                                {{ $category->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>


                    <div class="field">
                        <label for="tags">Tags</label>
                        <select class="ui blue search dropdown" multiple name="tags[]" id="tags">
                            @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" 
                                class="item" {{ in_array($tag->id, $idTagsOfPost) ? "selected": '' }}> 
                                {{ $tag->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="field">
                        <label for="featured_image" style="cursor: pointer;">Ảnh hiển thị
                            <br>
                            <span type="button" class="ui tiny label blue">Chọn ảnh</span>
                            <span id="file-name"></span>
                        </label>
                        <input type="file" onchange="$('#file-name').text($('#featured_image')[0].files[0].name);" name="featured_image" id="featured_image" hidden>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection 

@push('script')
<script>
$('#form-create-post').form({
    fields: {
        title: {
            identifier: 'title',
            rules: [
                { type: 'empty', prompt: 'Hãy điền tiêu đề' },
                { type: 'maxLength[255]', prompt: 'Tiêu đề không dài quá 255 ký tự' }
            ]
        }
    },
    inline: true
});
</script>
@endpush