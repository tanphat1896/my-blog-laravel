<div class="ui raised segment">
    <form action="{{ route('blog.search') }}" method="get" id="form-search">
        <div class="ui icon transparent fluid input">
            <input type="text" name="search" placeholder="Tìm kiếm bài viết">
            <i class="search link icon" onclick="submit('form-search');"></i>
        </div>
    </form>
</div>