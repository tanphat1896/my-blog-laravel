@extends('layouts.master')

@section('content')
    <div class="ui one column center aligned grid padded">
        <div class="sixteen wide mobile ten wide tablet six wide computer column">

            <h2 class="ui icon header">
                <i class="users icon" style="font-size: 2em"></i> Đăng nhập
            </h2>
            <div class="ui raised segment">
                <form action="{{ route('login') }}" class="ui form" method="post" id="form-login">
                    {{ csrf_field() }}

                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <div class="ui left icon input">
                            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
                            <i class="mail icon"></i>
                        </div>
                        @if ($errors->has('email'))
                            <span class="ui red top pointing basic label">
                                {{ $errors->first('email') }}
                            </span>
                        @endif
                    </div>

                    <div class=" field {{ $errors->has('password') ? 'error' : '' }}">
                        <div class="ui left icon input">
                            <input type="password" name="password" id="password" placeholder="Mật khẩu">
                            <i class="lock icon"></i>
                        </div>
                    </div>

                    <div class="field">
                        <a href="{{ route('password.request') }}">Quên mật khẩu?</a>
                    </div>

                    <div class="field">
                        <button class="ui blue fluid button"><strong>Đăng nhập</strong></button>
                    </div>
                </form>
            </div>
            <div class="ui segment">
                Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký ngay</a>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#form-login').form({
            fields: {
                email: {
                    identifier: 'email',
                    rules: [
                        {type: 'empty', prompt: 'Hãy nhập mail'},
                        {type: 'email', prompt: 'Hãy nhập địa chỉ mail hợp lệ'}
                    ]
                },
                password: {
                    identifier: 'password',
                    rules: [
                        {type: 'empty', prompt: 'Hãy nhập mật khẩu'}
                    ]
                }
            },
            inline: true
        });
    </script>
@endpush
