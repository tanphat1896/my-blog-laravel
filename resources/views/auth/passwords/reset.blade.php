@extends('layouts.master')

@section('content')
    <div class="ui one column center aligned grid padded">
        <div class="sixteen wide mobile ten wide tablet six wide computer column">

            <h2 class="ui header">Tạo mật khẩu mới
            </h2>
            <div class="ui left aligned raised segment">
                <form action="{{ route('password.request') }}" class="ui form" method="post" id="form-register">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="field {{ $errors->has('email') ? 'error' : '' }}">
                        <div class="ui left icon input">
                            <input type="email" name="email" id="email" placeholder="Email" value="{{ $email or old('email') }}">
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

                        @if ($errors->has('password'))
                            <span class="ui red top pointing basic label">
                                {{ $errors->first('password') }}
                            </span>
                        @endif
                    </div>

                    <div class=" field">
                        <div class="ui left icon input">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                   placeholder="Nhập lại mật khẩu">
                            <i class="repeat icon"></i>
                        </div>
                        @if ($errors->has('password_confirmation'))
                            <span class="ui red top pointing basic label">
                                {{ $errors->first('password_confirmation') }}
                            </span>
                        @endif
                    </div>

                    <div class="field">
                        <button class="ui blue fluid button"><strong>Reset mật khẩu</strong></button>
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