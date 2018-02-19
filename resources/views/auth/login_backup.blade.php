@extends('layouts.app')

@push('style')
    <style>
        .column {
            max-width: 450px;
        }
    </style>
@endpush

@section('content')
    <div class="ui center aligned padded basic segment">
        <div class="ui divider hidden"></div>
        <div class="ui divider hidden"></div>
        <div class="ui divider hidden"></div>
        <h2 class="ui image header">
            <i class="users icon"></i>
            <div class="content">Đăng nhập hệ thống</div>
        </h2>
        <div class="ui center aligned grid">
            <div class="column">
                <div class="ui blue raised segment">
                    <form class="ui form" method="post" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        <div class="fluid field">
                            <div class="ui left icon input">
                                <input type="text" name="" placeholder="Tài khoản">
                                <i class="user icon"></i>
                            </div>
                        </div>
                        <div class="fluid field">
                            <div class="ui left icon input">
                                <input type="password" name="" placeholder="Mật khẩu">
                                <i class="lock icon"></i>
                            </div>
                        </div>
                        <div class="field">
                            <button class="ui blue fluid button"><strong>Đăng nhập</strong></button>
                        </div>
                    </form>
                </div>
                <div class="ui segment">
                    Chưa có tài khoản? <a href="/register">Đăng ký ngay</a>
                </div>
            </div>
        </div>
    </div>
@endsection
