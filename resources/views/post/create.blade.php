@extends('layouts.admin')

@push('script')
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
@endpush

@section('content')
    <form class="ui form" action="{{ route('posts.store') }}" method="post"
        id="form-create-post" enctype="multipart/form-data">
        <div class="ui two padded center aligned column stackable grid">

            <div class="row no padded small-margin">
                <div class="fourteen wide column">
                    <div class="ui left aligned segment tiny-padded">
                        <div class="ui breadcrumb">
                            <a class="section" href="{{ route('posts.index') }}">Tất cả bài viết</a>
                            <i class="right chevron icon divider"></i>
                            <div class="active section">Viết bài mới</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ten wide column">

                <div class="ui left aligned raised segment">
                    <h4 class="ui header dividing">
                        <i class="pencil fitted icon"></i> Nội dung bài viết
                    </h4>
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        <div class="field">
                            <label for="title">Tiêu đề</label>
                            <input type="text" name="title" id="title" oninput="getSlug();" placeholder="Tiêu đề bài viết">
                        </div>

                        <div class="field">
                            <label for="featured_image" class="pointer">Ảnh hiển thị <br>
                                <span type="button" class="ui tiny label blue">Chọn ảnh</span>
                                <span id="file-name"></span>
                            </label>
                            <input type="file" onchange="$('#file-name').text($('#featured_image')[0].files[0].name);" 
                                name="featured_image" id="featured_image" hidden>
                        </div>

                        <div class="field">
                            <label for="content">Nội dung</label>
                            <textarea name="content" id="content" class="ckeditor" rows="10"></textarea>
                        </div>
                </div>
            </div>

            <div class="four wide column left aligned">

                @include('post.sidebar.sidebar')

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
                        { type: 'maxLength[255]', prompt: 'Tiêu đề không dài quá 255 ký tự'}
                    ]
                }
            },
            inline: true
        });
    </script>
@endpush
