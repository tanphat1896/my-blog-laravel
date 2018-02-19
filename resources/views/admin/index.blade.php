@extends('layouts.admin')

@section('content')
    <div class="ui one column padded grid">
        <div class="column">
            <div class="ui red segment">
                <h2 class="ui dividing header">Thống kê</h2>
                <div class="ui small four statistics">

                    <a class="statistic">
                        <div class="value">
                            <i class="comments icon"></i> {{ \App\Comment::all()->count() }}
                        </div>
                        <div class="label">Bình luận</div>
                    </a>

                    <div class="statistic">
                        <div class="value">
                            <i class="line chart icon"></i> 10
                        </div>
                        <div class="label">Lượt xem</div>
                    </div>

                    <div class="statistic">
                        <div class="value">
                            <i class="newspaper icon"></i> {{ \App\Post::all()->count() }}
                        </div>
                        <div class="label">Bài viết</div>
                    </div>

                    <div class="statistic">
                        <div class="value">
                            <i class="cubes icon"></i> {{ \App\Category::all()->count() }}
                        </div>
                        <div class="label">Chuyên mục</div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection