<div class="ui segment">

    <h4 class="ui header dividing">Thông tin</h4>

    <div>
        <div class="field">
            <label>Lưu như</label>
            <div class="inline fields">

                <div class="field">
                    <div class="ui radio checkbox">
                        <input id="draft" type="radio" name="is_draft" value="1" checked>
                        <label for="draft" class="pointer">Bản nháp</label>
                    </div>
                </div>

                <div class="field">
                    <div class="ui radio checkbox">
                        <input id="publish" type="radio" name="is_draft" value="0">
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
            <input type="text" name="slug" id="slug" readonly class="disabled">
        </div>

        <div class="field">
            <label for="category">Chuyên mục</label>
            <select class="ui dropdown" name="category" id="category">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" class="item">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="field">
            <label for="tags">Tags</label>
            <select class="ui blue search dropdown" multiple name="tags[]" id="tags">
                @foreach($tags as $tag)
                    <option value="{{ $tag->id }}" class="item">
                        {{ $tag->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>