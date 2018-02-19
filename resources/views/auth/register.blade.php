@extends('layouts.master')

@section('content')
    <div class="ui one column center aligned grid padded">
        <div class="sixteen wide mobile ten wide tablet six wide computer column">

            <h2 class="ui icon header">
                <i class="edit icon" style="font-size: 2em"></i> Đăng ký
            </h2>
            <div class="ui left aligned raised segment">
                <form action="{{ route('register') }}" class="ui form" method="post" id="form-register">
                    {{ csrf_field() }}

                    <div class="field {{ $errors->has('name') ? 'error' : '' }}">
                        <div class="ui left icon input">
                            <input type="text" name="name" id="name" placeholder="Họ tên" value="{{ old('name') }}">
                            <i class="user icon"></i>
                        </div>
                        @if ($errors->has('name'))
                            <span class="ui red top pointing basic label">
                                {{ $errors->first('name') }}
                            </span>
                        @endif
                    </div>

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

                    <div class=" field">
                        <div class="ui left icon input">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   placeholder="Nhập lại mật khẩu">
                            <i class="repeat icon"></i>
                        </div>
                        @if ($errors->has('password'))
                            <span class="ui red top pointing basic label">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>

                    <div class="field">
                        <button class="ui blue fluid button"><strong>Đăng ký</strong></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        $('#form-register').form({
            fields: {
                email: {
                    identifier: 'email',
                    rules: [
                        {type: 'empty', prompt: 'Hãy nhập mail'},
                        {type: 'email', prompt: 'Hãy nhập địa chỉ mail hợp lệ'}
                    ]
                },
                name: {
                    identifier: 'name',
                    rules: [
                        {type: 'empty', prompt: 'Hãy nhập họ tên'}
                    ]
                },
                password: {
                    identifier: 'password',
                    rules: [
                        {type: 'empty', prompt: 'Hãy nhập mật khẩu'}
                    ]
                },
                password_confirmation: {
                    identifier: 'password_confirmation',
                    rules: [
                        {type: 'empty', prompt: 'Hãy nhập lại mật khẩu'}
                    ]
                }
            },
            inline: true
        });
    </script>
@endpush

